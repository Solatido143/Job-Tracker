@extends('layouts.app')

@section('title', 'Upload Resume')

@section('content')

    <div id="popup-modal"
        class="hidden fixed inset-0 z-50 items-center justify-center bg-white/75 backdrop-opacity-10 backdrop-blur-sm">

        <!-- Modal -->
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 shadow-black-500/50 ring">
            <div class="text-center">
                <!-- Icon -->
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0Z" />
                </svg>

                <!-- Message -->
                <h3 class="mb-4 text-lg font-medium text-gray-700">
                    A resume with this name already exists.
                </h3>

                <!-- Buttons -->
                <div class="flex justify-center space-x-4">
                    <button id="confirmOverwrite"
                        class="px-5 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                        Yes, Overwrite
                    </button>
                    <button id="cancelModal"
                        class="px-5 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded hover:bg-gray-100">
                        Cancel
                    </button>
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
            const form = document.getElementById('resumeUploadForm');
            const resumeInput = document.getElementById('resume');
            const submitBtn = document.getElementById('submitBtn');
            const modal = document.getElementById('popup-modal');
            const confirmBtn = document.getElementById('confirmOverwrite'); // "Yes" button
            const cancelBtn = document.getElementById('cancelModal'); // "No" button

            let shouldSubmit = false;

            form.addEventListener('submit', async function(e) {
                if (shouldSubmit) return; // allow submission on 2nd attempt

                e.preventDefault();

                const file = resumeInput.files[0];
                if (!file) return;

                const fileName = encodeURIComponent(file.name);

                const response = await fetch('/api/check-resume?name=' + fileName);
                const data = await response.json();

                if (data.exists) {
                    // Show modal
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                } else {
                    // File doesn't exist, submit right away
                    submitBtn.disabled = true;
                    submitBtn.innerText = 'Uploading...';
                    form.submit();
                }
            });

            confirmBtn.addEventListener('click', () => {
                // Add overwrite field
                let overwriteInput = document.getElementById('overwriteInput');
                if (!overwriteInput) {
                    overwriteInput = document.createElement('input');
                    overwriteInput.type = 'hidden';
                    overwriteInput.name = 'overwrite';
                    overwriteInput.value = '1';
                    overwriteInput.id = 'overwriteInput';
                    form.appendChild(overwriteInput);
                }

                modal.classList.remove('flex');
                modal.classList.add('hidden');

                // Submit the form
                shouldSubmit = true;
                submitBtn.disabled = true;
                submitBtn.innerText = 'Uploading...';
                form.submit();
            });

            cancelBtn.addEventListener('click', () => {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            });
        </script>

    </div>
@endsection
