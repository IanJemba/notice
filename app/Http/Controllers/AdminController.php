<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Notice;
use App\Models\Comment;
use App\Models\Category;

class AdminController extends Controller
{
    // Main dashboard
    public function index()
    {
        $statistics = [
            'users' => User::count(),
            'notices' => Notice::count(),
            'comments' => Comment::count(),
            'categories' => Category::count(),
        ];

        return view('admin.dashboard', compact('statistics'));
    }

    // User management
    public function users()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
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

    public function userCreate()
    {
        return view('admin.user.create');
    }

    public function userStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = isset($request->is_admin) ? 'admin' : 'user';
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $admin,
        ]);

        event(new Registered($user));
        return redirect('/admin/users');
    }
}
