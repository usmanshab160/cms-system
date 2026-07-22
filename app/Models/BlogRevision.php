<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogRevision extends Model
{
    protected $fillable = [

        'blog_id',
        'user_id',

        'title',
        'slug',
        'description',
        'category',
        'read_time',

        'featured_image',
        'featured_media_id',
        'img_alt',

        'content',

        'video',
        'video_url',

        'meta_title',
        'meta_description',
        'focus_keyword',

        'status',
        'scheduled_at',

        'author_name',

        'revision_number',

    ];

    /**
     * Revision belongs to a Blog
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * User who created this revision
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Featured media of this revision
     */
    public function featuredMedia()
    {
        return $this->belongsTo(Media::class, 'featured_media_id');
    }

}