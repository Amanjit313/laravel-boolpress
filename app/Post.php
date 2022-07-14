<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    public static function generatoreSlug($name){
        $slug = Str::slug($name, '-');
        $slug_base = $slug;
        $post_check = Post::where('slug', $slug)->first();
        $contatore = 1;

        while($post_check){
            $slug = $slug_base .'-'. $contatore;
            $contatore++;
            $post_check = Post::where('slug', $slug)->first();
        }
        return $slug;
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    protected $fillable = ['name', 'location', 'email', 'slug', 'category_id'];
}
