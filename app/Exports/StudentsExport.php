<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromArray;

class StudentsExport implements FromArray
{

    public function array(): array
    {
        $list = [];
        $students = Student::get();

        foreach ($students as $student) {
            $list[] = [
                $student->id,
                $student->name,
                $student->birth_date,
                $student->phone_number,
                $student->father_name,
                $student->mother_name,
                $student->gender,
                $student->name_en,
                $student->father_name_en,
                $student->mother_name_en,
                $student->line_phone_number,
                $student->national_number,
                $student->nationality,
                $student->education_level,
                $student->created_at,
                $student->updated_at,
            ];
        }

        return $list;
    }
}
