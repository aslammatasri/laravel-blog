<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);

        return view('user.list-user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | string | max:255',
                'email' => 'required | string | unique:users,email,' . $id,
            ]
        );

        $users = User::findOrFail($id);

        $users->name = $request->input('name');
        $users->email = $request->input('email');
    
        $users->save();


        return redirect()->route('users.index')->with('success', 'User updated successfully');

    }
}
