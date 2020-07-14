<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;

class UserController extends Controller
{
    public function index(User $user){
        return view('users/index', [
            'user' => $user,
        ]);
    }

    public function showEditForm(User $user){
        return view('users/edit',[
            'user' => $user
        ]);
    }

    public function edit(User $user, EditUser $request){
        $request->name ? $user->name = $request->name : [];
        $request->email ? $user->email = $request->email : [];
        $user->save();
        
        return redirect()->route('users.index',[
            'user' => $user,
        ]);
    }
}
