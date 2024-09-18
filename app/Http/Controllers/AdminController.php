<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Main dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // User management
    public function users()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function userCreate()
    {
        return view('admin.user.create');
    }

    public function userEdit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    public function userDelete(User $user)
    {
        return view('admin.user.delete');
    }

    public function userUpdate(Request $request)
    {
        dd($request->all());
    }
}
