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
        return view( 'admin.users.fetchUser', compact('users'));
    }

    public function fetchUsers()
    {
        $users = User::all();

        return response()
            ->json([
                'users' => $users,
            ]);
    }

    public function create()
    {
        return view( 'admin.users.create' );
    }

    public function store(Request $request)
    {

        $this->validate( $request, [
            'name'	=>	['string', 'max:255'],
            'lastname'	=>	['string', 'max:255'],
            'email'=>'email|unique:users',
            'password'=>'nullable',
            'avatar'=>'nullable|image'
        ] );

        $user = new User;
        $user->lastname = $request->lastname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->generatePassword( $request->get('password') );
        $user->avatar = $user->uploadAvatar( $request->file( 'avatar' ) );

        return $user;
    }





    public function update(Request $request, $id)
    {
        dd($request->all());
        $user = User::find($id);

        $this->validate($request, [
            'name'	=>	['string', 'max:255'],
            'lastname'	=>	['string', 'max:255'],
            'email' =>  [
                'email',
            ],
            'avatar'    =>  'nullable|image'
        ]);

        $user->lastname = $request->lastname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->generatePassword( $request->get('password') );

        $user->avatar = $user->uploadAvatar( $request->file( 'avatar' ) );

        $user->save();

        return $user;
    }

    public function destroy($id)
    {

        User::find( $id )->remove();

        //return redirect()->route( 'users.fetchUsers' );
        return response()->json(['message' => 'Пользователь был удален.']);
    }


}