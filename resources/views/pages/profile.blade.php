@extends('layouts.app')

@section('content')
    <div x-data="{ isProfileInfoModal: false }">
        <x-common.page-breadcrumb pageTitle="User Profile" />

        <div class="rounded-2xl border border-gray-200 bg-white p-5 lg:p-6 dark:border-gray-800 dark:bg-white/[0.03]">
            <h3 class="mb-5 text-lg font-semibold text-gray-800 lg:mb-7 dark:text-white/90">
                My Profile
            </h3>

            <div class="space-y-6">
                <div class="grid grid-cols-1 items-start gap-6 lg:grid-cols-2">
                    <x-profile.profile-card />
                    <x-profile.security-card />
                </div>

                <x-profile.danger-zone-card />
            </div>
        </div>

        <x-profile.profile-edit-modal />
    </div>
@endsection
