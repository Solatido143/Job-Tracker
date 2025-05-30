@extends('layouts.app')

@section('title', 'Add New Application')

@section('content')
    <div class="max-w-2xl mx-auto p-8 rounded bg-[#]">

        @if (session('success'))
        <div class="fixed top-4 left-4 z-50 p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 shadow-lg">
            <span class="font-medium">Success!</span> {{ session('success') }}
        </div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-6">➕ Add New Job Application</h1>

        <form action="{{ route('applications.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Job Title -->
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g. Frontend Developer">
            </div>

            <!-- Company -->
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" name="company" id="company"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="e.g. Tech Corp">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Application Status</label>
                <select name="status" id="status"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="applied">Applied</option>
                    <option value="interviewing">Interview</option>
                    <option value="interviewing">Offered</option>
                    <option value="rejected">Rejected</option>
                    <option value="hired">Hired</option>
                </select>
            </div>

            <!-- Date Applied -->
            <div>
                <label for="applied_at" class="block text-sm font-medium text-gray-700">Date Applied</label>
                <input type="date" name="applied_at" id="applied_at"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes (Optional)</label>
                <textarea name="notes" id="notes" rows="4"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Cover letter details, resume used, who you talked to, etc."></textarea>
            </div>

            <!-- Select Resume -->
            <div>
                <label for="resume_id" class="block text-sm font-medium text-gray-700">Resume Used</label>
                <select name="resume_id" id="resume_id"
                    class="p-2 mt-1 block w-full rounded-md bg-white border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">-- Select a Resume --</option>
                    @forelse ($resumes as $resume)
                        <option value="{{ $resume->id }}">{{ $resume->original_name }}</option>
                    @empty
                        <option disabled>No resumes uploaded yet</option>
                    @endforelse
                </select>
                <p class="text-sm text-gray-500 mt-1">Don't see your resume?
                    <a href="{{ route('resume.upload') }}" class="text-blue-600 hover:underline">Upload one here</a>.
                </p>
            </div>


            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition">
                    Save Application
                </button>
            </div>
        </form>
    </div>
@endsection
