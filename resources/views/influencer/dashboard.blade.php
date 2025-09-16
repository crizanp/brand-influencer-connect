@extends('layouts.dashboard', ['userType' => 'influencer'])

@section('title', 'Influencer Dashboard')

@section('dashboard-route', route('influencer.dashboard'))

@section('user-name', $influencer->full_name)

@section('logout-route', route('influencer.logout'))

@section('nav-links')
    <a href="{{ route('influencer.dashboard') }}" class="border-secondary-500 text-secondary-600 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Dashboard
    </a>
    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Campaigns
    </a>
    <a href="#" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
        Profile
    </a>
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Influencer Dashboard') }}
    </h2>
@endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-secondary-100 text-secondary-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Followers</p>
                <p class="text-2xl font-semibold text-gray-900">{{ number_format($influencer->followers_count) }}</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Engagement Rate</p>
                <p class="text-2xl font-semibold text-gray-900">{{ $influencer->engagement_rate ?? 0 }}%</p>
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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Earnings</p>
                <p class="text-2xl font-semibold text-gray-900">$0</p>
            </div>
        </div>
    </div>
</div>

<!-- Profile Information -->
<div class="card mb-8">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-medium text-gray-600">Full Name</p>
            <p class="mt-1 text-sm text-gray-900">{{ $influencer->full_name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Username</p>
            <p class="mt-1 text-sm text-gray-900">{{ $influencer->username }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Email</p>
            <p class="mt-1 text-sm text-gray-900">{{ $influencer->email }}</p>
        </div>
        @if($influencer->phone)
        <div>
            <p class="text-sm font-medium text-gray-600">Phone</p>
            <p class="mt-1 text-sm text-gray-900">{{ $influencer->phone }}</p>
        </div>
        @endif
        @if($influencer->gender)
        <div>
            <p class="text-sm font-medium text-gray-600">Gender</p>
            <p class="mt-1 text-sm text-gray-900">{{ ucfirst($influencer->gender) }}</p>
        </div>
        @endif
        <div>
            <p class="text-sm font-medium text-gray-600">Status</p>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                @if($influencer->status === 'active') bg-green-100 text-green-800
                @elseif($influencer->status === 'pending') bg-yellow-100 text-yellow-800
                @else bg-red-100 text-red-800 @endif">
                {{ ucfirst($influencer->status) }}
            </span>
        </div>
    </div>
    
    @if($influencer->bio)
    <div class="mt-6">
        <p class="text-sm font-medium text-gray-600">Bio</p>
        <p class="mt-1 text-sm text-gray-900">{{ $influencer->bio }}</p>
    </div>
    @endif
</div>

<!-- Quick Actions -->
<div class="card">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <button class="btn-secondary text-center">
            Browse Campaigns
        </button>
        <button class="btn-primary text-center">
            Update Profile
        </button>
        <button class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 text-center">
            View Analytics
        </button>
    </div>
</div>
@endsection