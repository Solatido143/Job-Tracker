<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    //
    // ApplicationController.php

    public function index()
    {
        return view('applications.index');
    }

    public function create()
    {
        $resumes = Resume::all();
        return view('applications.create', compact('resumes')); 
    }

    public function filterByStatus($status)
    {
        return view('applications.status', compact('status'));
    }

}
