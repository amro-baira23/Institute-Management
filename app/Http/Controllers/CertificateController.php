<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use ZipArchive;
use ZipStream\ZipStream;

class CertificateController extends Controller
{
    //Add Certificate Page
    public function certificatePage()
    {
        return view('add_certificate');
    }

    //Edit Certificate Page
    public function editCertificatePage(Certificate $certificate)
    {
        return view('edit_certificate', compact('certificate'));
    }

    //Add Certificate Function
    public function addCertificate(CertificateRequest $certificateRequest)
    {
        $extension = $certificateRequest->certificate->getClientOriginalExtension();
        $file_name = time() . '.' . $extension;
        $certificateRequest->certificate->move(storage_path('app/public/Certificates'), $file_name);
        Certificate::create([
            'certificate' => 'storage/Certificates/' . $file_name,
            'name_ar_x' => $certificateRequest->name_ar_x,
            'name_ar_y' => $certificateRequest->name_ar_y,
            'name_en_x' => $certificateRequest->name_en_x,
            'name_en_y' => $certificateRequest->name_en_y,
        ]);

        return redirect()->back()->with('success', 'this certificate added successfully');
    }

    //Edit Certificate Function
    public function editCertificate(Certificate $certificate, CertificateRequest $certificateRequest)
    {
        $certificate->update([
            'name_ar_x' => $certificateRequest->name_ar_x,
            'name_ar_y' => $certificateRequest->name_ar_y,
            'name_en_x' => $certificateRequest->name_en_x,
            'name_en_y' => $certificateRequest->name_en_y,
        ]);

        return redirect()->back()->with('success', 'this certificate updated successfully');
    }

    //Get Student Certificate Function
    public function getStudentCertificate(Certificate $certificate, Student $student)
    {
        $student = $student->with('person')->find($student->id);
        return view('certificate', compact('student', 'certificate'));
    }

    //Get Certificates Function
    public function getCertificates()
    {
        $certificates = Certificate::get();

        return success($certificates, null);
    }

    //Get Certificate Information Function
    public function getCertificateInformation(Certificate $certificate)
    {
        return success($certificate, null);
    }

    //Delete Certificate Function
    public function deleteCertificate(Certificate $certificate)
    {
        if (File::exists($certificate->certificate)) {
            File::delete($certificate->certificate);
        }
        $certificate->delete();
        return success(null, 'this certificate deleted successfully');
    }

    //Create Students Certificates Function
    public function createStudentCertificate(Certificate $certificate, Request $request)
    {
        // $students = explode(',', $request->students);
        $students = Student::whereIn('id', explode(',', $request->students))->get();

        foreach ($students as $student) {
            $file_name = time() . '.pdf';
            $pdf = PDF::loadView('certificate', ['student' => $student, 'certificate' => $certificate]);
            $pdf->save(storage_path('app/public/StudentsCertificates') . '/' . $file_name);
        }   

        // $headers = [
        //     'Content-Type' => 'application/octet-stream',
        //     'Content-Disposition' => 'attachment; filename="images.zip"',
        // ];
        // $files = Storage::disk('public')->allFiles('StudentsCertificates');
        // if (!is_array($files)) {
        //     // return $files;
        //     $files = [];
        // }
        
        // $options = new ZipArchive();
        // $zip = new ZipStream('example.zip');
        // // return $files;
        // foreach ($files as $file) {
        //     $zip->addFileFromPath($file, public_path($file));
        // }

        // $zip->finish();
        // return 1;
        // return response()->streamDownload(function () use ($zip) {
        //     $zip->finish();
        // }, 'certificates.zip', $headers);

        return success(null, 'this certificates created successfully');
    }
}