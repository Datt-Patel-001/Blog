<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'meta_title',
        'meta_description',
        'slug',
        'summary',
        'published',
        'published_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }
}
