@extends('layouts.app')

@section('title', 'Upload Resume')

@section('content')
    <div class="max-w-xl mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">📄 Upload Resume</h1>

        {{-- {{ route('resume.store') }} --}}
        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="resume" class="block text-sm font-medium text-gray-700">Select Resume (PDF/DOCX)</label>
                <input type="file" name="resume" id="resume" accept=".pdf,.doc,.docx" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md text-lg font-medium hover:bg-blue-700 transition">
                    Upload Resume
                </button>
            </div>
        </form>
    </div>
@endsection
