@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold text-gray-800 mb-4">
                Welcome to <span class="text-blue-600">My Job Tracker</span>
            </h1>
            <p class="text-lg text-gray-600 mb-8">
                Manage your job applications, update statuses, and track your career progress — all in one place.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
                <!-- View Applications -->
                <a href="{{ route('applications.index') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">📄 View Applications</h2>
                    <p class="mt-2 text-gray-600">See all the jobs you've applied for and check their statuses.</p>
                </a>

                <!-- Add New Application -->
                <a href="{{ route('applications.create') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">➕ Add New Application</h2>
                    <p class="mt-2 text-gray-600">Log a new job application with notes and details.</p>
                </a>

                <!-- Filter by Status -->
                <a href="{{ route('applications.index') }}?status=applied" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">📌 Filter by Status</h2>
                    <p class="mt-2 text-gray-600">Quickly see which jobs are Applied, Interviewing, Rejected, or Hired.</p>
                </a>

                <!-- Dashboard Summary -->
                <a href="{{ route('dashboard') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">📊 Dashboard Summary</h2>
                    <p class="mt-2 text-gray-600">Get insights into your application journey with charts and stats.</p>
                </a>

                <!-- Upload Resume -->
                <a href="{{ route('resume.upload') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">📁 Upload Resume</h2>
                    <p class="mt-2 text-gray-600">Keep a copy of the resumes you send — track which one you used per job.</p>
                </a>

                <!-- Settings -->
                <a href="{{ route('profile.settings') }}" class="block p-6 bg-white rounded-lg shadow hover:shadow-md transition">
                    <h2 class="text-xl font-semibold text-gray-800">⚙️ Profile Settings</h2>
                    <p class="mt-2 text-gray-600">Manage your account and personal preferences.</p>
                </a>
            </div>
        </div>
    </div>
@endsection
