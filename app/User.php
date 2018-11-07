<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields) {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function generatePassword($password) {
        if ($password != null) {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function edit($fields) {
        $this->fill($fields);

        $this->save();
    }

    public function uploadAvatar($image) {
        if ($image == null) {return;}

        $this->removeAvatar();

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

    public function remove() {
        $this->removeAvatar();
        $this->delete();
    }

    public function getAvatar() {
        if ($this->avatar == null) {
            return '/images/no-user-image.jpg';
        }
        return '/uploads/' . $this->avatar;
    }

}
