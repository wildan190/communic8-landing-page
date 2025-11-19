<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalArchitectureContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_img',
        'img_services',
        'img_first',
        'title1',
        'value_title1',
        'title2',
        'value_title2',
        'title3',
        'value_title3',
        'title4',
        'value_title4',
        'title1_id',
        'value_title1_id',
        'title2_id',
        'value_title2_id',
        'title3_id',
        'value_title3_id',
        'title4_id',
        'value_title4_id',
    ];
}
