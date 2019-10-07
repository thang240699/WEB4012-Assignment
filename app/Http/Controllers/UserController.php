<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view()
    {
        $users = User::all()->toArray();

        return view('admin.pages.users.view', compact('users'));
    }

    public function getEdit($id)
    {
        $user = User::find($id);
        $roles = Role::where('id','>',1)->get()->toArray();

        return view('admin.pages.users.addrole', compact('user','roles'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::find($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('users.view');
    }


}
