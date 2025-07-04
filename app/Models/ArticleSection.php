<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSection extends Model
{
    protected $fillable = [
        'article_id',
        'heading',
        'slug',            // ✅ Required because your DB expects it
        'image_url',
        'content',
        'order',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
