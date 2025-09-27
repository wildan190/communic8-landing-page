<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandForgeContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_img',
        'insight_strategy_driven',
        'desc_insight_strategy_driven',
        'img_insight_strategy_driven',
        'bold_creative_ideas',
        'desc_bold_creative_ideas',
        'img_bold_creative_ideas',
        'impactful_visual_identity',
        'desc_impactful_visual_identity',
        'img_impactful_visual_identity',
    ];
}
