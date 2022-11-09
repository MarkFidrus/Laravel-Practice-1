<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function show($id)
    {
        $profileData = DB::table('users')->where('id', $id)->first();
        if ($profileData)
        {
            return view('profile.show', ['cssName' => 'profile.css', 'title' => $profileData->name], compact('profileData'));
        }
        else
        {
            return redirect('/')->with('message_text', 'User is not exist!')->with('message_type', 'error');
        }
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
