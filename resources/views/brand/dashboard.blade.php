@extends('layouts.dashboard', ['userType' => 'brand'])

@section('title', 'Brand Dashboard')

@section('dashboard-route', route('brand.dashboard'))

@section('user-name', $brand->company_name)

@section('logout-route', route('brand.logout'))

@section('nav-links')
    <li><a href="{{ route('brand.dashboard') }}">Dashboard</a></li>
    <li><a href="#">Campaigns</a></li>
    <li><a href="#">Influencers</a></li>
@endsection

@section('header')
    <h1 class="page-title">Brand Dashboard</h1>
    <p class="page-subtitle">Welcome back, {{ $brand->company_name }}</p>
@endsection

@section('content')
<!-- Stats Overview -->
<div class="stats-container">
    <!-- Stats Cards -->
    <div class="card">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-primary-100 text-primary-600">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <div class="stat-card">
        <div class="stat-icon">📊</div>
        <div class="stat-value">0</div>
        <div class="stat-label">Active Campaigns</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">👥</div>
        <div class="stat-value">0</div>
        <div class="stat-label">Connected Influencers</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">💰</div>
        <div class="stat-value">$0</div>
        <div class="stat-label">Total Spend</div>
    </div>
</div>

<!-- Quick Actions -->
<div class="quick-actions">
    <a href="#" class="btn btn-primary">Create Campaign</a>
    <a href="#" class="btn btn-secondary">Find Influencers</a>
    <a href="#" class="btn btn-outline">View Analytics</a>
</div>

<!-- Dashboard Grid -->
<div class="dashboard-grid">
    <!-- Company Information -->
    <div class="content-card">
    <h3 class="text-lg font-semibold text-gray-900 mb-4">Company Information</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <p class="text-sm font-medium text-gray-600">Company Name</p>
            <p class="mt-1 text-sm text-gray-900">{{ $brand->company_name }}</p>
        </div>
        <div>
            <p class="text-sm font-medium text-gray-600">Contact Person</p>
            <p class="mt-1 text-sm text-gray-900">{{ $brand->contact_person }}</p>
        </div>
        <div class="card-header">
            <h3 class="card-title">Company Information</h3>
            <p class="card-subtitle">Your brand profile details</p>
        </div>
        <div class="card-content">
            <div style="margin-bottom: 15px;">
                <p style="font-weight: 600; color: #64748b; font-size: 14px;">Company Name</p>
                <p style="margin-top: 4px; color: #2d3748;">{{ $brand->company_name }}</p>
            </div>
            <div style="margin-bottom: 15px;">
                <p style="font-weight: 600; color: #64748b; font-size: 14px;">Email</p>
                <p style="margin-top: 4px; color: #2d3748;">{{ $brand->email }}</p>
            </div>
            <div style="margin-bottom: 15px;">
                <p style="font-weight: 600; color: #64748b; font-size: 14px;">Industry</p>
                <p style="margin-top: 4px; color: #2d3748;">{{ ucfirst($brand->industry) }}</p>
            </div>
            @if($brand->phone)
            <div style="margin-bottom: 15px;">
                <p style="font-weight: 600; color: #64748b; font-size: 14px;">Phone</p>
                <p style="margin-top: 4px; color: #2d3748;">{{ $brand->phone }}</p>
            </div>
            @endif
            <div>
                <p style="font-weight: 600; color: #64748b; font-size: 14px;">Status</p>
                <span class="campaign-status 
                    @if($brand->status === 'active') status-active
                    @elseif($brand->status === 'pending') status-pending
                    @else status-completed @endif">
                    {{ ucfirst($brand->status) }}
                </span>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="content-card">
        <div class="card-header">
            <h3 class="card-title">Recent Activity</h3>
            <p class="card-subtitle">Latest updates and actions</p>
        </div>
        <div class="card-content">
            <div class="activity-item">
                <div class="activity-icon">📝</div>
                <div class="activity-content">
                    <div class="activity-title">Account created</div>
                    <div class="activity-time">Welcome to Brand & Influencer Connect!</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection