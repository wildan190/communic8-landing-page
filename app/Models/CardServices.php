<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardServices extends Model
{
    protected $fillable = [
        'title_en', 'title_id',
        'desc_en', 'desc_id',
        'img','route_name',
        'button_en','button_id'
    ];
}
