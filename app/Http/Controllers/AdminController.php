<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notice;
use App\Models\Comment;
use App\Models\Category;

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

    public function userEdit($user)
    {
        $user = User::find($user);

        return view('admin.user.edit', compact('user'));
    }

    public function userDelete($user)
    {
        $user = User::find($user);
        return view('admin.user.delete', compact('user'));
    }

    public function userDestroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect('/admin/users');
    }

    public function userUpdate(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect('/admin/users');
    }

    public function statistics()
    {
        $statistics = [
            'users' => User::count(),
            'notices' => Notice::count(),
            'comments' => Comment::count(),
            'categories' => Category::count(),
        ];

        return view('admin.statistics', compact('statistics'));
    }
}
