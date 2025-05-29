@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">📊 Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Applications -->
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-sm text-gray-500">Total Applications</h2>
                <p class="text-2xl font-bold text-gray-800 mt-2">12</p>
            </div>

            <!-- Applied -->
            <div class="bg-blue-50 shadow rounded-lg p-6">
                <h2 class="text-sm text-blue-700">Applied</h2>
                <p class="text-2xl font-bold text-blue-900 mt-2">5</p>
            </div>

            <!-- Interviewing -->
            <div class="bg-yellow-50 shadow rounded-lg p-6">
                <h2 class="text-sm text-yellow-700">Interviewing</h2>
                <p class="text-2xl font-bold text-yellow-900 mt-2">3</p>
            </div>

            <!-- Rejected -->
            <div class="bg-red-50 shadow rounded-lg p-6">
                <h2 class="text-sm text-red-700">Rejected</h2>
                <p class="text-2xl font-bold text-red-900 mt-2">4</p>
            </div>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Applications</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-3">
                    <p class="font-medium text-gray-700">Frontend Developer at Tech Corp</p>
                    <p class="text-sm text-gray-500">Status: <span class="text-blue-600">Applied</span> • May 25, 2025</p>
                </li>
                <li class="py-3">
                    <p class="font-medium text-gray-700">Backend Engineer at DevHouse</p>
                    <p class="text-sm text-gray-500">Status: <span class="text-yellow-600">Interviewing</span> • May 20,
                        2025</p>
                </li>
                <li class="py-3">
                    <p class="font-medium text-gray-700">UI/UX Designer at PixelStudio</p>
                    <p class="text-sm text-gray-500">Status: <span class="text-red-600">Rejected</span> • May 15, 2025</p>
                </li>
            </ul>
        </div>
    </div>
@endsection
