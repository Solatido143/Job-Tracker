@extends('layouts.app')

@section('title', 'Add New Application')

@section('content')
    <div class="max-w-2xl mx-auto p-8 rounded bg-[#]">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">➕ Add New Job Application</h1>

        <form action="{{ route('applications.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Job Title -->
            <div>
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <input type="text" name="job_title" id="job_title" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. Frontend Developer">
            </div>

            <!-- Company -->
            <div>
                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                <input type="text" name="company" id="company" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="e.g. Tech Corp">
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Application Status</label>
                <select name="status" id="status" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                <input type="date" name="applied_at" id="applied_at" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block text-sm font-medium text-gray-700">Notes (Optional)</label>
                <textarea name="notes" id="notes" rows="4" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Cover letter details, resume used, who you talked to, etc."></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition">
                    Save Application
                </button>
            </div>
        </form>
    </div>
@endsection
