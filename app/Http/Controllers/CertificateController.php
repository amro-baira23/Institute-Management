<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Course;
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
    public function createStudentCertificate(Certificate $certificate, Course $course, Request $request)
    {
        $students = $course->students;

        foreach ($students as $student) {
            $file_name = time() . '.pdf';
            $pdf = PDF::loadView('certificate', ['student' => $student, 'certificate' => $certificate]);
            $pdf->save(storage_path('app/public/StudentsCertificates') . '/' . $file_name);
        }

        $zip = new ZipArchive;

        $fileName = 'certificates';
        if ($zip->open($fileName, ZipArchive::CREATE)) {
            $files = File::files(public_path('storage/StudentsCertificates'));

            foreach ($files as $file) {
                $nameInZipFile = basename($file);

                $zip->addFile($file, $nameInZipFile);
            }
            $zip->close();
        }

        return response()->download($fileName);
    }
}
