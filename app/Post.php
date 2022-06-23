<?php

namespace App;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while(Post::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        };

        return $slug;
    }
}
