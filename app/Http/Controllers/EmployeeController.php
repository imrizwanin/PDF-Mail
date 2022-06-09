<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF;

class EmployeeController extends Controller
{
    // Display user data in view
    public function showEmployees()
    {
        $employee = Employee::all();
        return view('welcome', ['employee'=>$employee]);
    }
    // Generate PDF
    public function createPDF()
    {
        // retreive all records from db
        $employee = Employee::all();
        $pdf = PDF::loadView('welcome', ['employee'=>$employee]);
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }
}
