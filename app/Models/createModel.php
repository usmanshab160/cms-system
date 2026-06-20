<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class createModel extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
    'title',
    'slug',
    'description',
    'category',
    'read_time',
    'content',
    'featured_image',
    'img_alt',
    'gallery',
    'video',
    'video_url',
    'meta_title',
    'meta_description',
    'focus_keyword',
    'status',
    'scheduled_at',
    'author'
];
}
