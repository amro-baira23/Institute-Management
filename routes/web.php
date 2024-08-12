<?php

use App\Http\Controllers\CertificateController;
use App\Models\Certificate;
use App\Models\Student;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/certificate', [CertificateController::class, 'certificatePage']);
Route::get('/certificate/{certificate}', [CertificateController::class, 'editCertificatePage']);
Route::post('/certificate', [CertificateController::class, 'addCertificate']);
Route::post('/certificate/{certificate}', [CertificateController::class, 'editCertificate']);
Route::get('/certificate/{certificate}/{student}', [CertificateController::class, 'getStudentCertificate']);

Route::get('/pdf', function () {
    $certificate = Certificate::find(2);
    $student = Student::find(1);
    
    $pdf = PDF::loadView('certificate', ['student' => $student, 'certificate' => $certificate]);
    $pdf->save(storage_path('app/public').'/'.'file1.png');
    return $pdf->stream();
    
});