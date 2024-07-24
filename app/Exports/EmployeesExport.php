<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployeesExport implements FromArray
{
    public function array(): array
    {
        $list = [];
        $employees = Employee::get();

        foreach ($employees as $employee) {
            $list[] = [
                $employee->id,
                $employee->name,
                $employee->birth_date,
                $employee->phone_number,
                $employee->credentials,
                $employee->shift_id,
                $employee->job_id,
                $employee->account_id,
                $employee->created_at,
                $employee->updated_at,
            ];
        }

        return $list;
    }
}
