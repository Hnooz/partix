<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);

        return inertia()->render('Dashboard/users/index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return inertia()->render('Dashboard/users/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'is_admin' => 'required|integer',
            'is_delivery' => 'required|integer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
            'is_delivery' => $request->is_delivery,
        ]);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'User created successfully',
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return inertia()->render('Dashboard/users/edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:8|confirmed',
            'is_admin' => 'required|integer',
            'is_delivery' => 'required|integer',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'User updated successfully',
        ]);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'User Deleted successfully',
        ]);

        return redirect()->back();
    }
}
