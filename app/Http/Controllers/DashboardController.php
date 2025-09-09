<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\SubAccount;
use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    var $domain_max = 0, $domain_min = 0;
    var $range_max = 100, $range_min = 10;
    var $target_range = 0, $domain_range = 0;

    public function setMinMax($min, $max)
    {
        $this->domain_min = $min;
        $this->domain_max = $max;
    }

    public function domain()
    {
        $this->target_range = $this->range_max - $this->range_min;
        $this->domain_range = $this->domain_max - $this->domain_min;
    }

    public function calc($value)
    {
        if ($this->domain_range != 0)
            return ($value - $this->domain_min) * $this->target_range / $this->domain_range + $this->range_min;
        return 0;
    }

    //Get last 6 monthes earnings
    public function getEarnings()
    {
        $dates = [];
        $earnings = [0, 0, 0, 0, 0, 0];
        $accounts = SubAccount::where('main_account', 'الطلاب')->get();

        foreach ($accounts as $account) {
            for ($i = 0; $i < 6; $i++) {
                $dates[$i] = Carbon::now()->subMonths($i)->format('Y-m-d');
                $transactions = Transaction::where('subaccount_id', $account->id)->where('type', 'E')->where('created_at', 'LIKE', explode('-', $dates[$i])[0] . '-' . explode('-', $dates[$i])[1] . '-%%')->get();
                if ($transactions != '[]') {
                    foreach ($transactions as $transaction) {
                        $earnings[$i] += $transaction->amount;
                    }
                }
            }
        }
        $max = max($earnings);
        $min = min($earnings);

        $this->setMinMax($min, $max);
        $this->domain();

        $data = [
            [
                'date' => explode('-', $dates[0])[1],
                'earnings' => $earnings[0],
                'percent' => $this->calc($earnings[0]),
            ],
            [
                'date' => explode('-', $dates[1])[1],
                'earnings' => $earnings[1],
                'percent' => $this->calc($earnings[1]),
            ],
            [
                'date' => explode('-', $dates[2])[1],
                'earnings' => $earnings[2],
                'percent' => $earnings[2],
            ],
            [
                'date' => explode('-', $dates[3])[1],
                'earnings' => $earnings[3],
                'percent' => $earnings[3],
            ],
            [
                'date' => explode('-', $dates[4])[1],
                'earnings' => $earnings[4],
                'percent' => $earnings[4],
            ],
            [
                'date' => explode('-', $dates[5])[1],
                'earnings' => $earnings[5],
                'percent' => $earnings[5],
            ],
        ];

        return $data;
    }

    //Get More 5 Subject Required
    public function getSubjects()
    {
        $subjects = Subject::all();
        $ids = [];
        $counts = [];

        $required_ids = [];
        $required_counts = [];
        $i = 0;
        foreach ($subjects as $subject) {
            $courses = Course::where('subject_id', $subject->id)->where('created_at', 'LIKE', explode('-', Carbon::now())[0] . "%")->get();
            // return $courses;
            $count = 0;
            if ($courses != '[]') {
                foreach ($courses as $course) {
                    $ids[$i] = $subject->id;
                    $count += count($course->students);
                }
                $counts[$i] = $count;
                $i++;
            }
        }

        if (count($ids) == 1) {
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => 100,
                ]
            ];
        } else if (count($ids) == 2) {
            $result1 = $counts[0] * 100 / ($counts[0] + $counts[1]);
            $result2 = 100 - $result1;
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => $result1,
                ],
                [
                    'subject' => Subject::find($ids[1]),
                    'percent' => $result2,
                ]
            ];
        } else if (count($ids) == 3) {
            $result1 = $counts[0] * 100 / ($counts[0] + $counts[1] + $counts[2]);
            $result2 = $counts[1] * 100 / ($counts[0] + $counts[1] + $counts[2]);
            $result3 = 100 - $result1 - $result2;
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => $result1,
                ],
                [
                    'subject' => Subject::find($ids[1]),
                    'percent' => $result2,
                ],
                [
                    'subject' => Subject::find($ids[2]),
                    'percent' => $result3,
                ],
            ];
        } else if (count($ids) == 4) {
            $result1 = $counts[0] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3]);
            $result2 = $counts[1] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3]);
            $result3 = $counts[2] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3]);
            $result4 = 100 - $result1 - $result2 - $result3;
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => $result1,
                ],
                [
                    'subject' => Subject::find($ids[1]),
                    'percent' => $result2,
                ],
                [
                    'subject' => Subject::find($ids[2]),
                    'percent' => $result3,
                ],
                [
                    'subject' => Subject::find($ids[3]),
                    'percent' => $result4,
                ],
            ];
        } else if (count($ids) == 5) {
            $result1 = $counts[0] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3] + $counts[4]);
            $result2 = $counts[1] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3] + $counts[4]);
            $result3 = $counts[2] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3] + $counts[4]);
            $result4 = $counts[3] * 100 / ($counts[0] + $counts[1] + $counts[2] + $counts[3] + $counts[4]);
            $result5 = 100 - $result1 - $result2 - $result3 - $result4;
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => $result1,
                ],
                [
                    'subject' => Subject::find($ids[1]),
                    'percent' => $result2,
                ],
                [
                    'subject' => Subject::find($ids[2]),
                    'percent' => $result3,
                ],
                [
                    'subject' => Subject::find($ids[3]),
                    'percent' => $result4,
                ],
                [
                    'subject' => Subject::find($ids[4]),
                    'percent' => $result5,
                ],
            ];
        } else if (count($ids) == 0) {
            $data = [
                'subject' => null,
                'percent' => 100
            ];
        } else if (count($ids) > 5) {
            for ($i = 0; $i < 5; $i++) {
                $maxValue = max($counts);
                $index = array_search($maxValue, $counts);
                $required_counts[$i] = $maxValue;
                $required_ids[$i] = $ids[$index];
                $counts[$index] = 0;
            }

            $result1 = $required_counts[0] * 100 / ($required_counts[0] + $required_counts[1] + $required_counts[2] + $required_counts[3] + $required_counts[4]);
            $result2 = $required_counts[1] * 100 / ($required_counts[0] + $required_counts[1] + $required_counts[2] + $required_counts[3] + $required_counts[4]);
            $result3 = $required_counts[2] * 100 / ($required_counts[0] + $required_counts[1] + $required_counts[2] + $required_counts[3] + $required_counts[4]);
            $result4 = $required_counts[3] * 100 / ($required_counts[0] + $required_counts[1] + $required_counts[2] + $required_counts[3] + $required_counts[4]);
            $result5 = 100 - $result1 - $result2 - $result3 - $result4;
            $data = [
                [
                    'subject' => Subject::find($ids[0]),
                    'percent' => $result1,
                ],
                [
                    'subject' => Subject::find($ids[1]),
                    'percent' => $result2,
                ],
                [
                    'subject' => Subject::find($ids[2]),
                    'percent' => $result3,
                ],
                [
                    'subject' => Subject::find($ids[3]),
                    'percent' => $result4,
                ],
                [
                    'subject' => Subject::find($ids[4]),
                    'percent' => $result5,
                ],
            ];
        }

        return $data;
    }

    //Get Courses In Last 6 Monthes
    public function getCourses()
    {
        $dates = [];
        $counts = [0, 0, 0, 0, 0, 0];
        for ($i = 0; $i < 6; $i++) {
            $dates[$i] = Carbon::now()->subMonths($i)->format('Y-m-d');
            $courses = Course::where('created_at', 'LIKE', explode('-', $dates[$i])[0] . '-' . explode('-', $dates[$i])[1] . '-%%')->where('status', 'O')->orWhere('status', 'C')->get();
            $counts[$i] = count($courses);
        }

        $max = max($counts);
        $min = min($counts);

        $this->setMinMax($min, $max);
        $this->domain();

        $data = [
            [
                'date' => explode('-', $dates[0])[1],
                'count' => $counts[0],
                'percent' => $this->calc($counts[0]),
            ],
            [
                'date' => explode('-', $dates[1])[1],
                'count' => $counts[1],
                'percent' => $this->calc($counts[1]),
            ],
            [
                'date' => explode('-', $dates[2])[1],
                'count' => $counts[2],
                'percent' => $this->calc($counts[2]),
            ],
            [
                'date' => explode('-', $dates[3])[1],
                'count' => $counts[3],
                'percent' => $this->calc($counts[3]),
            ],
            [
                'date' => explode('-', $dates[4])[1],
                'count' => $counts[4],
                'percent' => $this->calc($counts[4]),
            ],
            [
                'date' => explode('-', $dates[5])[1],
                'count' => $counts[5],
                'percent' => $this->calc($counts[5]),
            ],
        ];

        return $data;
    }

    //Get Students In Every Month In Year
    public function getStudents()
    {
        $dates = [];
        $counts = [];
        for ($i = 0; $i < 12; $i++) {
            $dates[$i] = Carbon::now()->subMonths($i)->format('Y-m-d');
            $students = Student::where('created_at', 'LIKE', explode('-', $dates[$i])[0] . '-' . explode('-', $dates[$i])[1] . '-%%')->get();
            $counts[$i] = count($students);
        }

        $max = max($counts);
        $min = min($counts);

        $this->setMinMax($min, $max);
        $this->domain();

        $data = [
            [
                'date' => explode('-', $dates[0])[1],
                'count' => $counts[0],
                'percent' => $this->calc($counts[0]),
            ],
            [
                'date' => explode('-', $dates[1])[1],
                'count' => $counts[1],
                'percent' => $this->calc($counts[1]),

            ],
            [
                'date' => explode('-', $dates[2])[1],
                'count' => $counts[2],
                'percent' => $this->calc($counts[2]),
            ],
            [
                'date' => explode('-', $dates[3])[1],
                'count' => $counts[3],
                'percent' => $this->calc($counts[3]),
            ],
            [
                'date' => explode('-', $dates[4])[1],
                'count' => $counts[4],
                'percent' => $this->calc($counts[4]),
            ],
            [
                'date' => explode('-', $dates[5])[1],
                'count' => $counts[5],
                'percent' => $this->calc($counts[5]),
            ],
            [
                'date' => explode('-', $dates[6])[1],
                'count' => $counts[6],
                'percent' => $this->calc($counts[6]),
            ],
            [
                'date' => explode('-', $dates[7])[1],
                'count' => $counts[7],
                'percent' => $this->calc($counts[7]),
            ],
            [
                'date' => explode('-', $dates[8])[1],
                'count' => $counts[8],
                'percent' => $this->calc($counts[8]),
            ],
            [
                'date' => explode('-', $dates[9])[1],
                'count' => $counts[9],
                'percent' => $this->calc($counts[9]),
            ],
            [
                'date' => explode('-', $dates[10])[1],
                'count' => $counts[10],
                'percent' => $this->calc($counts[10]),
            ],
            [
                'date' => explode('-', $dates[11])[1],
                'count' => $counts[11],
                'percent' => $this->calc($counts[11]),
            ],
        ];

        return $data;
    }

    public function dashboard()
    {
        $data = [
            'earnings' => $this->getEarnings(),
            'subjects' => $this->getSubjects(),
            'courses' => $this->getCourses(),
            'students' => $this->getStudents(),
        ];
        return $data;
    }
}
