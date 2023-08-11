<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }


    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')
                    ->withoutTrashed()
                    ->ignore($user->id)],
            'avatar' => ['nullable', 'image', 'max:2048']
        ]);

        if ($request->hasFile('avatar')) {
            if (File::exists(public_path($user->avatar))) {
                File::delete(public_path($user->avatar));
            }
            $avatar = $request->avatar;
            $avatarName = time() . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('uploads/avatars'), $avatarName);
            $path = '/uploads/avatars/' . $avatarName;
            $user->avatar = $path;

        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();


        toastr()->success('Profile Updated Successfully');
        return redirect()->back();

    }

// update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Password Updated Successfully');

        return redirect()->back();
    }
}
