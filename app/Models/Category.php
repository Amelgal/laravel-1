<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    static public function getCacheCategory($slug)
    {
        $key = static::class."_cat_".$slug;
        $result = Cache::get($key, false);

        if (!$result) {
            $result = self::where('slug', $slug)->first();
            Cache::put($key, $result, now()->addMinutes(2));
        }
        return $result;
    }

    static public function getCacheCategories()
    {
        $key = static::class."_cat_list";
        $result = Cache::get($key, false);

        if (!$result) {
            $result = self::orderBy('title')->get();
            Cache::put($key, $result, now()->addMinutes(2));
        }
        return $result;
    }
}
