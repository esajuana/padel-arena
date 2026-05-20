<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function show(User $user)
    {
        $user->load('bookings');

        return view('admin.users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'phone_number' => 'required',

            'password' => 'required|min:6',

            'role' => 'required',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone_number' => $request->phone_number,

            'password' => Hash::make(
                $request->password
            ),

            'role' => $request->role,

        ]);

        return redirect('/admin/users')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }

    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $user->id,

            'phone_number' => 'required',

            'role' => 'required',

        ]);

        $data = [

            'name' => $request->name,

            'email' => $request->email,

            'phone_number' => $request->phone_number,

            'role' => $request->role,

        ];

        // UPDATE PASSWORD JIKA DIISI
        if ($request->password) {

            $data['password'] = Hash::make(
                $request->password
            );

        }

        $user->update($data);

        return redirect('/admin/users')
            ->with(
                'success',
                'User berhasil diupdate'
            );
    }

    public function edit(User $user)
    {
        return view(
            'admin.users.edit',
            compact('user')
        );
    }

    public function destroy(User $user)
    {
        if (($user->id == auth()->id())) {
            return back()->with(
                'error',
                'Tidak dapat menghapus akun sendiri'
            );
        }
            $user->delete();

            return back()->with(
                'success',
                'User berhasil dihapus'
        );
    }
}
