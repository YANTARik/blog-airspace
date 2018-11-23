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
        //dd($request->all());
        $this->validate( $request, [
            'name'	=>	['required', 'string', 'max:255'],
            'lastname'	=>	['required', 'string', 'max:255'],
            'email'=>'required|email|unique:users',
            'password'=>'nullable',
            'avatar'=>'nullable|image'
        ] );
//        dd($request->all());
        $user = User::add( $request->all() );
        //$user =  new User($request->all());

        //$user->uploadAvatar( $request->file( 'avatar' ) );
        $user->save();
        dd($user);
        //return view( 'admin.users.fetchUser');
        return $user;
    }

    public function edit(Request $request, $id)
    {

        //dd($request->all());
//        $user = User::find($id);
//        return view('admin.users.edit', compact('user'));

        $user = User::where('id', $id)->first();
        $user->lastname = $request->get('lastname');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        //$user->password = $request->get('password');
        $user->save();

        return $user;
    }



    public function update(Request $request, $id)
    {
        dd($request->all());
        $user = User::find($id);

//        $this->validate($request, [
//            'name'	=>	['required', 'string', 'max:255'],
//            'lastname'	=>	['required', 'string', 'max:255'],
//            'email' =>  [
//                'required',
//                'email',
//                Rule::unique('users'),
//            ],
//            //'avatar'    =>  'nullable|image'
//        ]);

        //$user->edit($request->all()); //name,email
        $user->lastname = $request->lastname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->avatar = $request->file('avatar');
        dd($request->all());
         //$user->uploadAvatar($request->file('avatar'));
        $user->save();
        //return redirect()->route('users.index');
        return $user;
    }

    public function destroy($id)
    {
        //d($id);
        User::find( $id )->remove();

        //return redirect()->route( 'users.fetchUsers' );
        return response()->json(['message' => 'Пользователь был удален.']);
    }

//    public function deleteUser(Request $request)
//    {
//        $user = User::find( $request->id )->delete();
//    }

    public function uploadAvatar($image)
    {
        if ($image == null) { return; }

        //$this->removeAvatar();
        //dd(get_class_methods($image));
        $filename = str_random(10) . '.' . $image->extension();

        $image->storeAs('uploads', $filename);

        $this->avatar = $filename;
        $this->save();

    }

//    public function removeAvatar() {
//        if ($this->avatar != null) {
//            Storage::delete('uploads/' . $this->avatar);
//        }
//    }

}