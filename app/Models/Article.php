<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    // Add 'user_id' to allow mass assignment when creating an article
    protected $fillable = [
        'title',
        'slug',
        'author',
        'category_id',
        'published_at',
        'description',
        'status',
        'user_id'
    ];

    // Casting attributes for automatic conversion
    protected $casts = [
        'published_at' => 'datetime',
        'table_of_contents' => 'array',
    ];

    // Relationship: Article belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Article has many sections
    public function sections()
    {
        return $this->hasMany(ArticleSection::class);
    }
}
