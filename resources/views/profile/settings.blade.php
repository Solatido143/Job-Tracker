@extends('layouts.app')

@section('title', 'Profile Settings')

@section('content')
    <div class="max-w-2xl mx-auto p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">⚙️ Profile Settings</h1>

        {{-- {{ route('profile.update') }} --}}
        <form action="#" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" value="" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" value="" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password <span class="text-gray-400 text-sm">(Leave blank to keep current)</span></label>
                <input type="password" name="password" id="password" class="p-2 mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Save Button -->
            <div>
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-md text-lg font-medium hover:bg-green-700 transition">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
