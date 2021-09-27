<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*static public function getCachePost($slug_post)
    {
        $key = static::class."_".$slug_post;
        $result = Cache::get($key, false);

        if (!$result) {
            $result = self::where('slug', $slug_post)->first();
            Cache::put($key, $result, now()->addMinutes(2));
        }

        return $result;
    }

    static public function getCachePosts()
    {
        $key = static::class."_post_list";
        $result = Cache::get($key, false);

        if (!$result) {
            $result = self::paginate(4);
            Cache::put($key, $result, now()->addMinutes(2));
        }

        return $result;
    }*/
}
