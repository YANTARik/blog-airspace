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
        //dd($request->file());
        $this->validate( $request, [
            'name'	=>	['string', 'max:255'],
            'lastname'	=>	['string', 'max:255'],
            'email'=>'email|unique:users',
            'password'=>'nullable',
            'avatar'=>'nullable|image'
        ] );

        //$user = User::add( $request->all() );
        //$user =  new User($request->all());
        //dd($request->all());
        //$user->uploadAvatar( $request->file( 'avatar' ) );
        $user = new User;
        $user->lastname = $request->lastname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->generatePassword( $request->get('password') );
        $user->avatar = $user->uploadAvatar( $request->file( 'avatar' ) );

        //return view( 'admin.users.fetchUser');
        return $user;
    }

//    public function edit(Request $request, $id)
//    {
//
//        //dd($request->all());
////        $user = User::find($id);
////        return view('admin.users.edit', compact('user'));
//
//        $user->lastname = $request->lastname;
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->password = $user->generatePassword( $request->get('password') );
//        $user->avatar = $request->avatar;
//        $user->save();
//
//        return $user;
//    }



    public function update(Request $request, $id)
    {
        //dd($request->all());
        $user = User::find($id);

        $this->validate($request, [
            'name'	=>	['string', 'max:255'],
            'lastname'	=>	['string', 'max:255'],
            'email' =>  [
                'email',
            ]
            //'avatar'    =>  'nullable|image'
        ]);

        $user->lastname = $request->lastname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $user->generatePassword( $request->get('password') );
        //dd($request->all());
        $user->avatar = $user->uploadAvatar( $request->avatar( 'avatar' ) );
        //dd($request->all());
       //dd($user);
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

//    //public function uploadAvatar(Request $request)
//    {
//        dd($request->all());
//        //if ($request->file == null) { return; }
//
//        //$this->removeAvatar();
//        $image = $request->file('avatar');
//        $filename = str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads', $filename);
//        $this->avatar = $filename;
//        //$this->save();
//
//        //return $filename;
//        return response()->json(['avatar' => $filename]);
//
//    }

//    public function removeAvatar() {
//        if ($this->avatar != null) {
//            Storage::delete('uploads/' . $this->avatar);
//        }
//    }

}