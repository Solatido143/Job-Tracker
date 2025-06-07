<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    //
    public function view()
    {
        return view('resume.upload');
    }

    public function uploadForm(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('resume');
        $originalName = $file->getClientOriginalName();

        // Check if resume exists in DB
        $existingResume = Resume::where('original_name', $originalName)->first();

        if ($existingResume && !$request->has('overwrite')) {
            return back()->withErrors(['resume_exist' => 'This file already exists.']);
        }

        $path = $file->store('resumes', 'public');

        if ($existingResume) {
            // Overwrite logic: delete old local file
            if (\Storage::disk('public')->exists($existingResume->file_path)) {
                \Storage::disk('public')->delete($existingResume->file_path);
            }

            // Update database record
            $existingResume->file_path = $path;
            $existingResume->updated_at = now(); // update timestamp
            $existingResume->save();
        } else {
            // Insert new resume into DB
            $resume = new Resume();
            $resume->original_name = $originalName;
            $resume->file_path = $path;
            $resume->save();
        }

        return redirect()->route('applications.create')->with('success', 'Resume uploaded successfully.');
    }

}
