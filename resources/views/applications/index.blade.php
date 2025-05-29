@extends('layouts.app')

@section('title', 'Applications')

@section('content')
    <div class="p-8">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Job Applications</h1>
            <a href="{{ route('applications.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                + Add New
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Job Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Company</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applied At</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Resume/CV</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    {{-- Loop through job applications here --}}
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Frontend Developer</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Tech Corp</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <span
                                class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded-full text-xs">Applied</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">May 15, 2025</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 underline cursor-pointer">
                            <a href="#">frontend_dev_resume.pdf</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            <a href="#" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                    {{-- More rows --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
