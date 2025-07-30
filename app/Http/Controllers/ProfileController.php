<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{   
    public function edit()
    {
        return view('profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'dp' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20480', // Increased max size to 20MB
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->hasFile('dp')) {
            if ($user->dp && file_exists(public_path('uploads/' . $user->dp))) {
            unlink(public_path('uploads/' . $user->dp));
            }

            $fileName = time() . '.' . $request->dp->extension();
            $request->dp->move(public_path('uploads'), $fileName);
            $user->dp = $fileName;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}