<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
    	$user = Auth::user();

    	return view('pages.profile', ['user' => $user]);
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name'	=>	'required',
//            'last'	=>	'required',
    		'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
    		'avatar'	=>	'nullable|image'
    	]);

    	$user = Auth::user();
    	dd($request->all());
        $user->edit($request->all());
    	$user->generatePassword($request->get('password'));
    	$user->uploadAvatar($request->file('avatar'));

    	return redirect()->back()->with('status', 'Профиль успешно обновлен');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('pages.profile', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        $this->validate($request, [
            'name' => 'required',
            'lastname'	=>	'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => 'nullable|image',
        ]);

        $user->edit($request->all()); //name,email
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back();
    }
}
