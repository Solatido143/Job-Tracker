<?php

namespace App\Http\Controllers;

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
        return view('applications.create'); 
    }

    public function filterByStatus($status)
    {
        return view('applications.status', compact('status'));
    }

}
