<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getCteatedAt($format)
    {
        return $this->created_at->format($format);
    }

    /**
     * Get the category record associated with the post.
     */
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    /**
     * Return our custom field by laravel accessor.
     * @return string
     */
    public function getUrlAttribute()
    {
        //$this->topic->slug
        return '/news/' . $this->topic->slug . '/' . $this->id . '-' . $this->slug . '.html';
    }
}
