<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();
        return view('admin.pages.manajemen-user.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::findOrFail($user->id);
        $user ->update(['role' => $request->role]);
        return redirect()->route('admin.users.index')->with('success', 'User role updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted.');
    }
    public function show(User $user)
    {
        $user = User::findOrFail($user->id);
        return view('admin.pages.manajemen-user.show', compact('user'));
    }
}
