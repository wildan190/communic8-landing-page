<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandForgeContent extends Model
{
    use HasFactory;

    protected $fillable = ['head_img', 'insight_strategy_driven', 'desc_insight_strategy_driven', 'img_insight_strategy_driven', 'bold_creative_ideas', 'desc_bold_creative_ideas', 'img_bold_creative_ideas', 'impactful_visual_identity', 'desc_impactful_visual_identity', 'img_impactful_visual_identity', 'img_framework', 'align_strategic_foundation', 'build_constructing_the_brand_world', 'maintain_ensuring_lasting_relevance', 'insight_strategy_driven_id', 'desc_insight_strategy_driven_id', 'bold_creative_ideas_id', 'desc_bold_creative_ideas_id', 'impactful_visual_identity_id', 'desc_impactful_visual_identity_id', 'align_strategic_foundation_id', 'build_constructing_the_brand_world_id', 'maintain_ensuring_lasting_relevance_id'];
}
