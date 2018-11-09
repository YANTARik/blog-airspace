<?php

namespace App;


use Illuminate\Support\Facades\Storage;
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

    public function remove() {
        $this->delete();
    }

    public function related()
    {
        return self::all()->except($this->id);
    }
}
