<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class BackupController extends Controller
{
    //Create Backup Function
    public function createBackup()
    {
        Artisan::call('backup:run');
        return success(null, 'backup created successfully');
        try {
        } catch (Exception $e) {
            return error('some thing went wrong', 'backup failed', 500);
        }
    }

    //Restore Function
    public function restoreBackup(Request $request)
    {
        $backupPath = $request->input('backup_path');

        if (!Storage::exists($backupPath)) {
            return error('some thing went wrong', 'backup file not found', 404);
        }

        try {
            Artisan::call('db:restore', ['path' => $backupPath]);
            return success(null, 'restored successfully');
        } catch (Exception $e) {
            return error('some thing went wrong', 'restore failed', 500);
        }
    }
}