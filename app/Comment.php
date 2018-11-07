<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function author() {
       // dd($this->belongsTo(User::class, 'user_id'));
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getAvatar() {

     dd($comment->author);
//        if ($this->avatar == null) {
//            return '/images/no-user-image.jpg';
//        }
//        return '/uploads/' . $this->avatar;
    }

    public function remove() {
        $this->delete();
    }
}
