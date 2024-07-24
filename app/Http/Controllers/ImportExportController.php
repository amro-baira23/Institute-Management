<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesExport;
use App\Exports\StudentsExport;
use App\Exports\TeachersExport;
use App\Http\Requests\BackupRequest;
use App\Imports\EmployeesImport;
use App\Imports\StudentsImport;
use App\Imports\TeachersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    //Export Students To Excel Function
    public function exportStudents()
    {
        Excel::store(new StudentsExport(), 'public/Imports/students-import.xlsx');
        return success(null, 'students exported successfully');
    }

    //Export Teachers To Excel Function
    public function exportTeachers()
    {
        Excel::store(new TeachersExport(), 'public/Imports/teachers-import.xlsx');
        return success(null, 'teachers exported successfully');
    }

    //Export Employees To Excel Function
    public function exportEmployees()
    {
        Excel::store(new EmployeesExport(), 'public/Imports/employees-import.xlsx');
        return success(null, 'employees exported successfully');
    }

    //Import Students From Excel Function
    public function importStudents(BackupRequest $backupRequest)
    {
        Excel::import(new StudentsImport(), $backupRequest->file('file')->store('files'));

        return success(null, 'your students imported successfully');
    }

    //Import Teachers From Excel Function
    public function importTeachers(BackupRequest $backupRequest)
    {
        Excel::import(new TeachersImport(), $backupRequest->file('file')->store('files'));

        return success(null, 'your teachers imported successfully');
    }

    //Import Employees From Excel Function
    public function importEmployees(BackupRequest $backupRequest)
    {
        Excel::import(new EmployeesImport(), $backupRequest->file('file')->store('files'));

        return success(null, 'your employees imported successfully');
    }
}
