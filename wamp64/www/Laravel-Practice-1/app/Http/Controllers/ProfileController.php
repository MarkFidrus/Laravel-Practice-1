<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getProfile($id)
    {
        if (Auth::guest())
        {
            return redirect()->route('login');
        }
        return redirect()->route('profile');
    }
}
