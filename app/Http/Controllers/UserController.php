<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        $permissions = Permission::all();

        return view('users.index', compact('users', 'permissions'));
    }

    public function updatePermissions(Request $request, User $user) {

        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'string|exists:permissions,name'
        ]);

        $user->syncPermissions($request->permissions ?? []);

        return redirect()->back()->with('success', 'Permissions updated successfully!');

    }
}