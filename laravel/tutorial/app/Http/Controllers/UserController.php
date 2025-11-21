<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function changePassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required|confirmed|min:6',  //confirmed = kell lennie egy párjának, és mindkettőnek ugyan annak kell lennie
        ]);
        $user = auth()->user();
        $user->password = Hash::make($validateData['password']);
        $user->save();
        return redirect('/profil');
    }
}