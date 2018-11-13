<?php

namespace App;


use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $fillable = ['text', 'post_id', 'user_id'];

    public function post() {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function remove() {
        $this->delete();
    }

    public static function add($fields) {
        $comment = new static;
        $comment->fill($fields);
        $comment->save();

        return $comment;
    }

}
