<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
//        //return User::all();
//        return view( 'admin.users.index', compact('users') );
        return view( 'admin.users.fetchUser');
    }

    public function fetchUsers()
    {
        $users = User::all();

        return response()
            ->json([
                'users' => $users,
            ]);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function create()
    {
        return view( 'admin.users.create' );
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate( $request, [
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'avatar'=>'nullable|image'
        ] );

        $user = User::add( $request->all() );
        $user->uploadAvatar( $request->file( 'avatar' ) );
        //dd($user);
        return $user;
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);

        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar'    =>  'nullable|image'
        ]);

        $user->edit($request->all()); //name,email
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        //return redirect()->route('users.index');
        return $user;
    }

    public function destroy($id)
    {
        User::find( $id )->remove();

        //return redirect()->route( 'users.index' );
        return '';
    }

}
