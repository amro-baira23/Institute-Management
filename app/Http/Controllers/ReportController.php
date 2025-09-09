<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Accounts Report
    public function report($request)
    {
        $share_capital = 0;
        $box = 0;
        $expenses = 0;
        $revenues = 0;
        $students = 0;
        $teachers = 0;
        $employees = 0;

        $paid = 0;
        $earnings = 0;

        $subAccounts = SubAccount::where('created_at', 'LIKE', $request . "%")->get();
        foreach ($subAccounts as $subAccount) {
            if ($subAccount->main_account === 'الأساتذة') {
                $teacher = $subAccount->accountable_type::with('courses')->find($subAccount->accountable_id);
                if ($teacher->courses != '[]')
                    foreach ($teacher->courses as $course) {
                        $course = Course::where('created_at', 'LIKE', $request . "%")->where('id', $course->id)->first();
                        if ($course) {
                            $teachers += $course->salary_amount;
                        }
                    }
            } else if ($subAccount->main_account === 'الطلاب') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $students += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'الموظفين') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $employees += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'رأس المال') {
                $transaction = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->first();
                if ($transaction)
                    $share_capital += $transaction->amount;
            } else if ($subAccount->main_account === 'الإيرادات') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                if ($transactions != '[]')
                    foreach ($transactions as $transaction) {
                        $revenues += $transaction->amount;
                    }
            } else if ($subAccount->main_account === 'المصاريف') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction)
                    $expenses += $transaction->amount;
            } else if ($subAccount->main_account === 'الصندوق') {
                $transaction = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->first();
                if ($transaction)
                    $box += $transaction->amount;
            }
        }
        $capital = $earnings - $paid;
        $data = [
            'credit_balances' => [
                'share_capital' => $share_capital,
                'revenues' => $revenues,
                'teachers' => $teachers,
                'employees' => $employees,
                'result' => $share_capital + $revenues + $teachers + $employees
            ],
            'debit balances' => [
                'box' => $box,
                'expenses' => $expenses,
                'students' => $students,
                'result' => $box + $expenses + $students,
            ],
        ];

        return $data;

        // return success($data, null);
    }

    //Expenses and Revenues Report Function
    public function expensesRevenuesReport($request)
    {
        $expenses = 0;
        $revenues = 0;
        $expense = SubAccount::where('main_account', 'المصاريف')->first();
        $revenue = SubAccount::where('main_account', 'الإيرادات')->first();

        $expense_transactions = $expense->transactions()->where('created_at', 'LIKE', $request . "%")->get();
        $revenue_transactions = $revenue->transactions()->where('created_at', 'LIKE', $request . "%")->get();

        if (!$expense_transactions) {
            $expense = 0;
        } else {
            foreach ($expense_transactions as $transaction) {
                $expenses += $transaction->amount;
            }
        }
        if (!$revenue_transactions) {
            $revenue = 0;
        } else {
            foreach ($revenue_transactions as $transaction) {
                $revenues += $transaction->amount;
            }
        }



        $data = [
            'expenses' => $expenses,
            'revenues' => $revenues,
            'result' => $expenses - $revenues
        ];
        return $data;
        return success($data, null);
    }

    //Budget Report Function
    public function budgetReport($request)
    {
        $share_capital = 0;
        $teachers = 0;
        $employees = 0;
        $lose_requiremnet = 0;
        $box = 0;
        $students = 0;

        $subAccounts = SubAccount::where('created_at', 'LIKE', $request . "%")->get();
        foreach ($subAccounts as $subAccount) {
            if ($subAccount->main_account === 'الأساتذة') {
                $teacher = $subAccount->accountable_type::with('courses')->find($subAccount->accountable_id);
                foreach ($teacher->courses as $course) {
                    $course = Course::where('created_at', 'LIKE', $request . "%")->where('id', $course->id)->first();
                    if ($course) {
                        $teachers += $course->salary_amount;
                    }
                }
            } else if ($subAccount->main_account === 'الطلاب') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $students += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'الموظفين') {
                $transactions = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $employees += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'رأس المال') {
                $transaction = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->first();
                if ($transaction)
                    $share_capital += $transaction->amount;
            } else if ($subAccount->main_account === 'الصندوق') {
                $transaction = Transaction::where('created_at', 'LIKE', $request . "%")->where('subaccount_id', $subAccount->id)->first();
                if ($transaction)
                    $box += $transaction->amount;
            }
        }

        $data = [
            'demands' => [
                'constant' => [
                    'partly' => [
                        'share_capital' => $share_capital,
                    ],
                    'total' => $share_capital,
                ],
                'common' => [
                    'partly' => [
                        'teachers' => $teachers,
                        'employees' => $employees,
                    ],
                    'total' => $teachers + $employees,
                ],
                'total' => $share_capital + $teachers + $employees + ($share_capital + $teachers + $employees) - ($box + $students),
            ],

            'assets' => [
                'common' => [
                    'partly' => [
                        'box' => $box,
                        'students' => $students,
                    ],
                    'total' => $box + $students,
                ],
            ],

            'lose' => ($share_capital + $teachers + $employees) - ($box + $students),
        ];
        return $data;
        // return success($data, null);
    }

    public function mainReport(Request $request)
    {
        $data = [
            'report1' => $this->report($request->year),
            'report2' => $this->expensesRevenuesReport($request->year),
            'report3' => $this->budgetReport($request->year),
        ];

        return success($data, null);
    }
}
