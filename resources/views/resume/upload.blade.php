@extends('layouts.app')

@section('title', 'Upload Resume')

@section('content')

    @if ($errors->has('resume_exists'))
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ count($errors->all()) > 1 ? '• ' : '' }}{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="popup-modal" tabindex="-1"
        class="show overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">A resume with this name already exist.</h3>
                    <button data-modal-hide="popup-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes
                    </button>
                    <button data-modal-hide="popup-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">No</button>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-lg mx-auto p-8 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Upload Your Resume</h1>

        <form id="resumeUploadForm" action="{{ route('resume.uploadFile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="resume" class="block mb-2 font-medium text-gray-700">Choose Resume (PDF, DOC, DOCX)</label>
                <input type="file" name="resume" id="resume"
                    class="block w-full p-2 border bg-gray-100 border-gray-300 rounded" required>
            </div>

            <button id="submitBtn" type="submit"
                class="mt-6 w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">
                Upload Resume
            </button>
        </form>

        <script>
            const submitBtn = document.getElementById('submitBtn');
            const reusmeInput = document.getElementById('resume');

            

            const form = document.getElementById('resumeUploadForm');
            form.addEventListener('submit', () => {
                submitBtn.disabled = true;
                submitBtn.innerText = 'Uploading...';
            });
        </script>

    </div>
@endsection
