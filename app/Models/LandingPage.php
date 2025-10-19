<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'banner_text', 'img', 'img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'title_text1', 'description1', 'title_text2', 'description2', 'title_text3', 'description3'];
}
