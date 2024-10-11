<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\User;
use App\Models\Notice;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\View\View;

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

    public function userUpdate(AdminRequest $request)
    {

        $request->validated();

        $user = User::findOrFail($request->id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role = $request['role'];
        $user->save();

        return redirect('/admin/users');
    }

    public function statistics(): View
    {
        $statistics = [
            'users' => User::count(),
            'notices' => Notice::count(),
            'comments' => Comment::count(),
            'categories' => Category::count(),
        ];

        return view('admin.statistics', compact('statistics'));
    }

    public function userCreate()
    {
        return view('admin.user.create');
    }

    public function userStore(AdminRequest $request)
    {

        $userData = array_merge($request->validated(), ['role' => isset($request->is_admin) ? 'admin' : 'user']);

        $user = User::create($userData);

        event(new Registered($user));
        return redirect('/admin/users');
    }
}
