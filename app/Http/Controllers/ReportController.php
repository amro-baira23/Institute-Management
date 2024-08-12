<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //Accounts Report
    public function report(Request $request)
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

        $subAccounts = SubAccount::where('created_at', 'LIKE', $request->year . "%")->get();
        foreach ($subAccounts as $subAccount) {
            if ($subAccount->main_account === 'الأساتذة') {
                $teacher = $subAccount->accountable_type::with('courses')->find($subAccount->accountable_id);
                foreach ($teacher->courses as $course) {
                    $course = Course::where('created_at', 'LIKE', $request->year . "%")->where('id', $course->id)->first();
                    if ($course) {
                        $teachers += $course->salary_amount;
                    }
                }
            } else if ($subAccount->main_account === 'الطلاب') {
                $transactions = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $students += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'الموظفين') {
                $transactions = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->get();
                foreach ($transactions as $transaction) {
                    $employees += $transaction->amount;
                }
            } else if ($subAccount->main_account === 'رأس المال') {
                $transaction = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->first();
                $share_capital += $transaction->amount;
            } else if ($subAccount->main_account === 'الإيرادات') {
                $transaction = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->first();
                $revenues += $transaction->amount;
            } else if ($subAccount->main_account === 'المصاريف') {
                $transaction = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->first();
                $expenses += $transaction->amount;
            } else if ($subAccount->main_account === 'الصندوق') {
                $transaction = Transaction::where('created_at', 'LIKE', $request->year . "%")->where('subaccount_id', $subAccount->id)->first();
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

        return success($data, null);
    }

    //Expenses and Revenues Report Function
    public function expensesRevenuesReport(Request $request)
    {
        $expenses = 0;
        $revenues = 0;
        $expense = SubAccount::where('main_account', 'المصاريف')->first();
        $revenue = SubAccount::where('main_account', 'الإيرادات')->first();

        $expense_transactions = $expense->transactions()->where('created_at', 'LIKE', $request->year . "%")->get();
        $revenue_transactions = $revenue->transactions()->where('created_at', 'LIKE', $request->year . "%")->get();

        foreach ($expense_transactions as $transaction) {
            $expenses += $transaction->amount;
        }

        foreach ($revenue_transactions as $transaction) {
            $revenues += $transaction->amount;
        }

        $data = [
            'expenses' => $expenses,
            'revenues' => $revenues,
            'result' => $expenses - $revenues
        ];

        return success($data, null);
    }
}