@extends('layouts.app')

@section('title', 'Upload Resume')

@section('content')
    <div class="max-w-lg mx-auto p-8 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Upload Your Resume</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ count($errors->all()) > 1 ? '• ' : '' }}{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="resumeUploadForm" action="{{ route('resume.uploadFile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="resume" class="block mb-2 font-medium text-gray-700">Choose Resume (PDF, DOC, DOCX)</label>
                <input type="file" name="resume" id="resume" class="block w-full p-2 border bg-gray-100 border-gray-300 rounded"
                    required>
            </div>

            <button id="submitBtn" type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">
                Upload Resume
            </button>
        </form>

        <script>
            const form = document.getElementById('resumeUploadForm');
            const submitBtn = document.getElementById('submitBtn');
            form.addEventListener('submit', () => {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Uploading...';
            });
        </script>

    </div>
@endsection
