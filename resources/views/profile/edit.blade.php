@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 md:px-8 py-8">
    <!-- Back Button / Logo -->
    <div class="mb-8">
        <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:text-darkCharcoal transition-colors mb-8">
            <span class="material-symbols-outlined">arrow_back</span>
            <span>Back to Home</span>
        </a>
    </div>

    <!-- Header -->
    <div class="mb-12">
        <div class="flex items-center gap-4 mb-2">
            <span class="material-symbols-outlined text-4xl text-primary">account_circle</span>
            <h1 class="text-4xl font-black text-darkCharcoal">My Profile</h1>
        </div>
        <p class="text-slate-600 text-sm ml-16">Manage your account information and preferences</p>
    </div>

    <!-- Profile Information Section -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8 mb-6">
        <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-200">
            <span class="material-symbols-outlined text-2xl text-primary">person</span>
            <h2 class="text-2xl font-bold text-darkCharcoal">Profile Information</h2>
        </div>
        <div class="max-w-2xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    <!-- Security Section -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8 mb-6">
        <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-200">
            <span class="material-symbols-outlined text-2xl text-primary">lock</span>
            <h2 class="text-2xl font-bold text-darkCharcoal">Security</h2>
        </div>
        <div class="max-w-2xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="bg-red-50 rounded-xl border border-red-200 shadow-sm p-6 md:p-8">
        <div class="flex items-center gap-3 mb-6 pb-6 border-b border-red-200">
            <span class="material-symbols-outlined text-2xl text-red-600">delete_forever</span>
            <h2 class="text-2xl font-bold text-red-700">Danger Zone</h2>
        </div>
        <div class="max-w-2xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>
@endsection
