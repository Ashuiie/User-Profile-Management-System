<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show()
{
    $profile = Auth::user()->profile;
    return view('profile.show', compact('profile'));
}

public function edit()
{
    $profile = Auth::user()->profile;
    return view('profile.edit', compact('profile'));
}

public function update(Request $request)
{
    $data = $request->validate([
        'bio' => 'nullable|string',
        'phone' => 'nullable|string',
        'address' => 'nullable|string',
    ]);

    $profile = Auth::user()->profile;
    $profile->update($data);

    return redirect()->route('profile.show')->with('success', 'Profile updated.');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
