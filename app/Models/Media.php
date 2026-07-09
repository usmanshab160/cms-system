<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';

    protected $fillable = [
        'user_id',
        'file_name',
        'file_path',
        'mime_type',
        'file_size',
        'alt_text',
    ];

    /**
     * User who uploaded this media
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Blogs using this media as Featured Image
     */
    public function featuredBlogs()
    {
        return $this->hasMany(Blog::class, 'featured_media_id');
    }
}