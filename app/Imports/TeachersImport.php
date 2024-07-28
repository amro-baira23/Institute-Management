<?php

namespace App\Imports;

use App\Models\Teacher;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class TeachersImport implements ToModel
{
    public function model(array $row)
    {
        return [
            new Teacher([
                'id' => $row[0],
                'name' => $row[1],
                'birth_date' => $row[2],
                'phone_number' => $row[3],
                'credentials' => $row[4],
                'created_at' => $row[5],
                'updated_at' => $row[6],
            ])
        ];
    }
}