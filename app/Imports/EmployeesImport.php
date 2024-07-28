<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    public function model(array $row)
    {
        return [
            new Employee([
                'id' => $row[0],
                'name' => $row[1],
                'birth_date' => $row[2],
                'phone_number' => $row[3],
                'credentials' => $row[4],
                'shift_id' => $row[5],
                'job_id' => $row[6],
                'account_id' => $row[7],
                'created_at' => $row[8],
                'updated_at' => $row[9],
            ])
        ];
    }
}
