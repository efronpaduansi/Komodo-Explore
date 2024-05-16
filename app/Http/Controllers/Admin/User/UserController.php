<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserStoreRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::all();
        return view('adminpanel.pages.users.manage', compact('users'));
    }

    public function create()
    {
        $roles = \App\Models\UserRole::all();
        return view('adminpanel.pages.users.add', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $validator = $request->validated();

        if($validator){
            //True case
            $createNewUser = \App\Models\User::create([
               'name'           => $request->addName,
               'email'          => $request->addEmail,
                'password'      => bcrypt($request->addPassword),
                'user_roles_id' =>  $request->addRole,
            ]);

            if($createNewUser){
                return redirect()->route('admin.users_index')->withSuccess('Simpan berhasil');
            }else{
                return back()->withErrors('Simpan gagal!')->withInput(['addName', 'addEmail']);
            }
        }else{
            //False case
            return back()->with('errors', $validator->messages()->all()[0])->withInput(['addName', 'addEmail']);
        }
    }
}
