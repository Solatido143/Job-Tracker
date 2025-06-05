@extends('layouts.app')

@section('title', 'Applications')

@section('content')
    <div class="p-8">
        <div class="sm:flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Job Applications</h1>

            <div class="flex gap-4 mt-2 sm:mt-0">
                <!-- Filter Dropdown -->
                <select id="statusFilter"
                    class="border border-gray-300 text-sm text-gray-700 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                    onchange="location = '{{ route('applications.index') }}?status=' + this.value;">
                    <option value="" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                    <option value="applied" {{ request('status') == 'applied' ? 'selected' : '' }}>Applied</option>
                    <option value="interviewing" {{ request('status') == 'interviewing' ? 'selected' : '' }}>Interviewing
                    </option>
                    <option value="offered" {{ request('status') == 'offered' ? 'selected' : '' }}>Offered</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="hired" {{ request('status') == 'hired' ? 'selected' : '' }}>Hired</option>
                </select>

                <!-- Add Button -->
                <a href="{{ route('applications.create') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-blue-700 transition">
                    + Add New
                </a>
            </div>
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
                    @forelse ($job_applications as $job_application)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $job_application->job_title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $job_application->company }}
                            </td>
                            @php
                                $statusColors = [
                                    'applied' => 'bg-blue-100 text-blue-700',
                                    'interviewing' => 'bg-yellow-100 text-yellow-700',
                                    'offered' => 'bg-green-100 text-green-700',
                                    'rejected' => 'bg-red-100 text-red-700',
                                    'hired' => 'bg-emerald-100 text-emerald-700',
                                ];
                            @endphp

                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span
                                    class="inline-block px-2 py-1 rounded-full text-xs {{ $statusColors[$job_application->status] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($job_application->status) }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $job_application->applied_at->format('F j, Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 cursor-pointer">
                                @if ($job_application->resume)
                                    <a href="#" class="underline">{{ $job_application->resume?->original_name }}</a>
                                @else
                                    <span class="text-gray-500 italic">No resume selected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <a href="#" class="text-blue-600 hover:underline">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm">You currently don't have a job applications. Apply now!</td>
                        </tr>
                    @endforelse
                    {{-- More rows --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
