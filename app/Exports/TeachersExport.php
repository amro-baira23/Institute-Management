<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeachersExport implements FromArray
{
    public function array(): array
    {
        $list = [];
        $teachers = Teacher::get();

        foreach ($teachers as $teacher) {
            $list[] = [
                $teacher->id,
                $teacher->name,
                $teacher->birth_date,
                $teacher->phone_number,
                $teacher->credentials,
                $teacher->created_at,
                $teacher->updated_at,
            ];
        }

        return $list;
    }
}
