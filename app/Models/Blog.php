<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [

        'title',
        'slug',
        'description',
        'category',
        'read_time',
        'featured_image',
        'img_alt',
        'content',
        'video',
        'video_url',
        'meta_title',
        'meta_description',
        'focus_keyword',
        'status',
        'scheduled_at',
        'author'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function galleries()
    {
        return $this->hasMany(BlogGallery::class);
    }
}