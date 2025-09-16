@extends('layouts.dashboard', ['userType' => 'admin'])

@section('title', 'Admin Dashboard')

@section('dashboard-route', route('admin.dashboard'))

@section('user-name', $admin->name)

@section('logout-route', route('admin.logout'))

@section('nav-links')
    <a href="{{ route('admin.dashboard') }}" class="border-gray-500 text-gray-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Dashboard
    </a>
    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Brands
    </a>
    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Influencers
    </a>
    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Settings
    </a>
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Admin Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-4m-5 0H9m11 0a2 2 0 01-2 2H7a2 2 0 01-2-2m2-2v-4h10v4M7 19v-4"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Brands</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-secondary-100 text-secondary-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Influencers</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Active Campaigns</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Pending Approvals</p>
                <p class="text-2xl font-semibold text-gray-900">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Admin Information -->
<div class="card mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Admin Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-medium text-gray-600">Name</p>
            <p class="mt-1 text-sm text-gray-900">{{ $admin->name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Email</p>
            <p class="mt-1 text-sm text-gray-900">{{ $admin->email }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Role</p>
            <p class="mt-1 text-sm text-gray-900">{{ ucfirst(str_replace('_', ' ', $admin->role)) }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Status</p>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                @if($admin->is_active) bg-green-100 text-green-800
                @else bg-red-100 text-red-800 @endif">
                {{ $admin->is_active ? 'Active' : 'Inactive' }}
            </span>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="card mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Recent Activity</h3>
    <div class="text-center py-8">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No recent activity</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by managing brands and influencers.</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="card">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <button class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-center">
            Manage Brands
        </button>
        <button class="bg-gray-800 hover:bg-gray-900 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-center">
            Manage Influencers
        </button>
        <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-center">
            System Settings
        </button>
    </div>
</div>
@endsection