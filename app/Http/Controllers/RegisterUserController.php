<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create() {
        return view('register_user.create')
        ->with('user', null);
    }

    public function edit(User $user) {
        return view('register_user.create')
        ->with('user', $user);
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user = User::create($attributes);

        session()->flash('success','User Created Successfully');

        return redirect('/admin');
    }

    public function update(User $user, Request $request) {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users,email, '.$user->id],
            'password' => ['required','min:8','confirmed'],
        ]);

        $user->update($attributes);

        session()->flash('success','User Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(User $user) {
        $user->delete();

        // Set a flash message
        session()->flash('success','User Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
