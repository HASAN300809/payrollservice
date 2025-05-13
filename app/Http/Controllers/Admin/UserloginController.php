<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserloginController extends Controller
{
    public function index() 
    {
        $users = User::latest()->get();
        return view('admin.userlogin', compact('users'));
    }

    public function destroy(string $id)
    {
        $user = User::findOrfail($id);

        $user->delete();

        return redirect()->route('admin.userlogin')->with('success', 'Data Berhasil Dihapus');
    }
}
