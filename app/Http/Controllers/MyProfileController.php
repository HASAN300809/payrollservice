<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    public function show()
    {
        // Mendapatkan data user yang sedang login
        $user = Auth::user();

        // Mengirim data user ke view
        return view('user.myprofile.show', compact('user'));
    }
}
