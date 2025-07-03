<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Atau gunakan paginate() untuk performa yang lebih baik
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'aktif' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('dashboard.users.index')->with('success', 'User created successfully');
    }
    public function show(User $user)
    {
        return view('dashboard.users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('dashboard.users.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8', // Pembaruan kata sandi opsional
            'role' => 'required',
            'aktif' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        if ($user->berita()->exists()) {
            return redirect()->route('dashboard.users.index')->with('error', 'User tidak bisa dihapus karena masih digunakan oleh berita');
        }

        $user->delete();

        return redirect()->route('dashboard.users.index')->with('success', 'User deleted successfully');
    }
}
