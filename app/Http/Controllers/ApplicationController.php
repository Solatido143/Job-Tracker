<?php

namespace App\Http\Controllers;

use App\Models\Application;
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

    public function viewForm()
    {
        $resumes = Resume::all();
        return view('applications.create', compact('resumes'));
    }

    public function createApplication(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'status' => 'required|in:applied,interviewing,offered,rejected,hired',
            'applied_at' => 'required|date',
            'notes' => 'nullable|string',
            'resume_id' => 'nullable|exists:resumes,id',
        ]);

        // Check for duplicate job title + company
        if (
            Application::where('job_title', $validated['job_title'])
                ->where('company', $validated['company'])
                ->exists()
        ) {
            return back()->withErrors([
                'job_title' => 'You already added this job application for this company!'
            ])->withInput();
        }

        // Save the application
        Application::create($validated);

        return redirect()->route('applications.index')->with('success', 'Job application added successfully.');
    }


    public function filterByStatus($status)
    {
        return view('applications.status', compact('status'));
    }

}
