<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicPresenceContent extends Model
{
    use HasFactory;

    protected $table = 'public_presence_contents';

    protected $fillable = [
        'head_img',
        'INSIGHT_DRIVEN_STRATEGY',
        'desc_INSIGHT_DRIVEN_STRATEGY',
        'img_INSIGHT_DRIVEN_STRATEGY',
        'Creative_and_Channel_Synergy',
        'desc_Creative_and_Channel_Synergy',
        'img_Creative_and_Channel_Synergy',
    ];
}
