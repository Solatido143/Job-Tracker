<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //
    public function uploadForm()
    {
        return view('resume.upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('resume');

        // Save the file somewhere, e.g. 'resumes' folder in storage/app/public
        $path = $file->store('resumes', 'public');

        // Save info in database
        $resume = new Resume();
        $resume->original_name = $file->getClientOriginalName(); // this is the original file name
        $resume->file_path = $path; // assuming you have a column for the stored path
        $resume->save();

        return redirect()->route('applications.create')->with('success', 'Resume uploaded successfully.');
    }

}
