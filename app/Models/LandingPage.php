<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'subtitle', 'banner_text', 'img', 'img_1', 'img_2', 'img_3', 'img_4', 'img_5', 'title_text1', 'description1', 'title_text2', 'description2', 'title_text3', 'description3', 'title_id', 'subtitle_id', 'banner_text_id', 'title_text1_id', 'description1_id', 'title_text2_id', 'description2_id', 'title_text3_id', 'description3_id'];
}
