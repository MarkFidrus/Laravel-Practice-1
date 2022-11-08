<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $profileData = DB::table('users')->select('id', Auth::id());
        return view('profile.index', ['cssName' => 'profile.css', 'title' => 'My profile'], compact('profileData'));
    }

    public function set(Request $request)
    {
        $username = $request->input('username');
        $profilePicture = $request->file('profilePicture');
        $picture = '';
        $newPassword = $request->input('newPassword');
        $newPasswordAgain = $request->input('newPasswordAgain');

        if ($profilePicture)
        {
            $picture = $profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('images/profiles'), $picture);
        }

        $newPassword = encrypt($newPassword);
        $newPasswordAgain = encrypt($newPasswordAgain);

        if ($newPassword !== $newPasswordAgain)
        {
            return redirect()->route('profile.index')->with('message_text', 'Passwords are not matched!')->with('message_type', 'danger');
        }
        else
        {
            DB::table('users')->where('id', Auth::id())->update(
                [
                    'name' => $username,
                    'profile_picture' => $picture,
                    'password' => $newPassword
                ]
            );
        }
        return redirect()->route('profile.index')->with('message_text', 'Successfully edited your profile!')->with('message_type', 'success');
    }
}
