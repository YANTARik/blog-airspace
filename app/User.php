<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use \Storage;
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
        'name', 'lastname', 'email',
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

    public function remove() {
        $this->removeAvatar();
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
