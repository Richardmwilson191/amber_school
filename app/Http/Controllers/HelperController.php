<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function index()
    {
        $tableDesc = '{
            "headers": {
                "First Name": "frst_name",
                "Last Name": "last_name"
            },
            "fields": ["frst_name, last_name"]
        }';

        $tableDesc = json_decode($tableDesc);
        dd($tableDesc);
        $students = Student::all();
        $subjects = Subject::all();
        return view('helper', compact('students', 'subjects'));
    }
}
