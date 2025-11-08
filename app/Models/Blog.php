<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_id',
        'slug',
        'category_id',
        'content',
        'content_id',
        'keywords',
        'headline_img',
        'headline_img_alt',
        'date',
        'status',
        'highlighted',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
