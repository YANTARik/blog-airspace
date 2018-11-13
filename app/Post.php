<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'content', 'date', 'description'];

    public function author() {


        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsTomany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public static function add($fields) {
        $post = new static;
        $post->fill($fields);
        $post->user_id = 1;
        $post->save();

        return $post;
    }

    public function edit($fields) {
        $this->fill($fields);
        $this->save();
    }

    public function remove() {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage() {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image) {
        dd($image);
        if ($image == null) {return;}

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getImage() {
        if ($this->image == null) {
            return '/images/blog-post-2.jpg';
        }
        return '/uploads/' . $this->image;
    }

    public function setDateAttribute($value) {

        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');

        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value) {

        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        $this->attributes['date'] = $date;
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ? implode(', ', $this->tags->pluck('title')->all())
            : 'No tags';
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['date'])->format('F d, Y');
    }

    public function getComments() {
        return $this->comments()->get();
    }

    public function setTags($ids)
    {
        if($ids == null){return;}

        $this->tags()->sync($ids);
    }
}
