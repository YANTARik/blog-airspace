<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use \Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'lastname', 'email', 'avatar', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function generatePassword($password)
    {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function edit($fields) {

        $this->fill($fields);

        $this->save();
    }

    public function uploadAvatar($image)
    {

        if ($image == null) {return;}

        $this->removeAvatar();

        $filename = str_random(10) . '.' . $image->extension();

        $image->storeAs('uploads', $filename);

        $this->avatar = $filename;
        $this->save();

    }

    public function removeAvatar()
    {
        if ($this->avatar != null) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function remove()
    {

        $this->delete();
    }

    public function getImage()
    {
        if($this->avatar == null)
        {
            return '/images/no-user-image.png';
        }

        return '/uploads/' . $this->avatar;
    }

}
