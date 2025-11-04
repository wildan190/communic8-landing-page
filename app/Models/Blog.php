<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'content',
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
}
