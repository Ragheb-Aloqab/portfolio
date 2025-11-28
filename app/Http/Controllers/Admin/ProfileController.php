<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile settings.
     */
    public function edit()
    {
        $user = auth()->user();

        return view('admin.profile.edit', compact('user'));
    }

    /**
     * Update the admin profile settings.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email',
            'bio'         => 'nullable|string',
            'github'      => 'nullable|url',
            'linkedin'    => 'nullable|url',
            'twitter'     => 'nullable|url',
            'behance'     => 'nullable|url',
            'profile_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'cover_img'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        // تحديث النصوص
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->bio      = $request->bio;
        $user->github   = $request->github;
        $user->linkedin = $request->linkedin;
        $user->twitter  = $request->twitter;
        $user->behance  = $request->behance;

        // تحديث صورة البروفايل
        if ($request->hasFile('profile_img')) {

            if ($user->profile_img && Storage::disk('public')->exists($user->profile_img)) {
                Storage::disk('public')->delete($user->profile_img);
            }

            $user->profile_img = $request->file('profile_img')->store('profile', 'public');
        }

        // تحديث صورة الغلاف
        if ($request->hasFile('cover_img')) {

            if ($user->cover_img && Storage::disk('public')->exists($user->cover_img)) {
                Storage::disk('public')->delete($user->cover_img);
            }

            $user->cover_img = $request->file('cover_img')->store('cover', 'public');
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
    public function updateEmail(Request $request, UpdatesUserProfileInformation $updater)
    {
        $user = Auth::user();

        $updater->update($user, [
            'email' => $request->email,
            'name'  => $request->name,
        ]);

        return back()->with('success', 'Email updated successfully.');
    }
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password'      => 'required',
            'new_password'          => 'required|min:8|confirmed',
        ]);

        // تحقق من كلمة المرور الحالية
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // تحديث كلمة المرور
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password updated successfully.');
    }
}
