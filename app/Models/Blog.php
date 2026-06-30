<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Blog extends Model
{
    protected $fillable = [
        'user_id',
        'author_name',
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
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    // One Blog has many gallery images
    public function galleries()
    {
        return $this->hasMany(BlogGallery::class);
    }

    // One Blog belongs to one User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}