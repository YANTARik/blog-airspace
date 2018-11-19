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

    public function create()
    {
        return view( 'admin.users.create' );
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate( $request, [
            'name'	=>	['required', 'string', 'max:255'],
            'lastname'	=>	['required', 'string', 'max:255'],
            'email'=>'required|email|unique:users',
            'password'=>'required',
            'avatar'=>'nullable|image'
        ] );

        $user = User::add( $request->all() );
        $user->uploadAvatar( $request->file( 'avatar' ) );
        //dd($user);
        return view( 'admin.users.fetchUser');
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
            'name'	=>	['required', 'string', 'max:255'],
            'lastname'	=>	['required', 'string', 'max:255'],
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
        return view( 'admin.users.fetchUser');
    }

    public function destroy($id)
    {
        User::find( $id )->remove();

        return redirect()->route( 'users.fetchUsers' );
//        return response()->json(['message' => 'Пользователь был удален.']);
    }

    public function uploadAvatar($image)
    {
        if ($image == null) {return;}

        $this->removeAvatar();
        //dd(get_class_methods($image));
        $filename = str_random(10) . '.' . $image->extension();

        $image->storeAs('uploads', $filename);

        $this->avatar = $filename;
        $this->save();

    }

    public function removeAvatar() {
        if ($this->avatar != null) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

}
