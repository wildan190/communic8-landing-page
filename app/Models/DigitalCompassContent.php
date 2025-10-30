<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalCompassContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_img',
        'img_photo',
        'img_services',
        'title1',
        'value_title1',
        'title2',
        'value_title2',
        'title3',
        'value_title3',
        'title4',
        'value_title4',
    ];
}
