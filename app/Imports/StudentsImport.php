<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Person;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function model(array $row)
    {
        return [
            new Student([
                'id' => $row[0],
                'name' => $row[1],
                'birth_date' => $row[2],
                'phone_number' => $row[3],
                'father_name' => $row[4],
                'mother_name' => $row[5],
                'gender' => $row[6],
                'name_en' => $row[7],
                'father_name_en' => $row[8],
                'mother_name_en' => $row[9],
                'line_phone_number' => $row[10],
                'national_number' => $row[11],
                'nationality' => $row[12],
                'education_level' => $row[13],
                'created_at' => $row[14],
                'updated_at' => $row[15],
            ])
        ];
    }
}
