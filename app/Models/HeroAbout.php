<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroAbout extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'box_img',
        'about_us',
        'philosophy_title_1',
        'content_philosophy_title_1',
        'philosophy_title_2',
        'content_philosophy_title_2',
        'philosophy_title_3',
        'content_philosophy_title_3',
    ];
}
