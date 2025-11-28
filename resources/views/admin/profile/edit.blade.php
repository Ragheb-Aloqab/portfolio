@extends('admin.layouts.app')

@section('title', 'Edit Profile')
@section('page-title', 'Profile Settings')

@section('content')

<div class="space-y-10">

    {{-- ================== PROFILE INFO ================== --}}
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6">

        <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            🔧 Account Information
        </h2>

        <form action="{{ route('admin.profile.update') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="form-label">Name</label>
                    <input type="text" name="name"
                           value="{{ $user->name }}"
                           class="form-input">
                </div>

                <div>
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           value="{{ $user->email }}"
                           class="form-input">
                </div>

                <div>
                    <label class="form-label">GitHub</label>
                    <input type="text" name="github"
                           value="{{ $user->github }}"
                           class="form-input">
                </div>

                <div>
                    <label class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin"
                           value="{{ $user->linkedin }}"
                           class="form-input">
                </div>

            </div>

            <div class="mt-6">
                <label class="form-label">Bio</label>
                <textarea name="bio" rows="4" class="form-input resize-none">{{ $user->bio }}</textarea>
            </div>

            <div class="mt-6">
                <label class="form-label">Profile Image</label>
                <input type="file" name="profile_img" class="form-input">
                
                @if($user->profile_img)
                    <img src="{{ asset('storage/'.$user->profile_img) }}"
                         class="w-24 h-24 rounded-full mt-3 object-cover border shadow">
                @endif
            </div>

            <button class="btn-primary mt-6">
                <i class="fa-solid fa-check"></i> Save Changes
            </button>

        </form>

    </div>




    {{-- ================== CHANGE PASSWORD ================== --}}
    <div class="bg-white dark:bg-gray-900 rounded-xl shadow p-6">

        <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">
            🔒 Change Password
        </h2>

        <form action="{{ route('admin.profile.updatePassword') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="form-label">Current Password</label>
                    <input type="password" name="current_password" class="form-input">
                </div>

                <div>
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-input">
                </div>

            </div>

            <div class="mt-6">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" class="form-input">
            </div>

            <button class="btn-dark mt-6">
                <i class="fa-solid fa-lock"></i> Update Password
            </button>

        </form>

    </div>

</div>

@endsection


{{-- ================== STYLES ================== --}}
<style>
    .form-label {
        @apply block font-semibold mb-1 text-gray-700 dark:text-gray-300;
    }

    .form-input {
        @apply w-full p-3 rounded-lg border border-gray-300 dark:border-gray-700
               bg-gray-50 dark:bg-gray-800 text-gray-900 dark:text-gray-100
               focus:ring focus:ring-blue-300 dark:focus:ring-blue-700 transition;
    }

    .btn-primary {
        @apply px-6 py-3 bg-blue-600 text-white rounded-lg shadow 
               hover:bg-blue-700 transition font-semibold;
    }

    .btn-dark {
        @apply px-6 py-3 bg-gray-800 text-white rounded-lg shadow
               hover:bg-gray-700 transition font-semibold;
    }
</style>
