<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('/cashregister/users', compact('users'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/cashregister/users');
    }

    public function destroy(User $user)
    {
        $user = User::findOrFail($user->id);
        $userRoles = $user->roles->pluck('name');
        $adminAmount = Role::where('name', 'Admin')->first()->users()->get()->count();

        if($userRoles->contains('Admin'))
            if($adminAmount > 1){
                $user->delete();
                return redirect("/cashregister/users");
            }
            else{
                return redirect('/cashregister/users')->withFail("Je kan deze gebruiker niet verwijderen. Dit is de laatste admin!");
            }
        else{
            $user->delete();
            return redirect("/cashregister/users");
        }

        return redirect("/cashregister/users");
    }
}
