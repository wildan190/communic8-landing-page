<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'bg_hero',
        'hero_title',
        'hero_title_id',
        'client_id',
        'description',
        'description_id',
        'delivery',
        'img',
        'project_analysis',
        'project_analysis_id',
        'img_project_analysis',
        'challenges_and_insight',
        'challenges_and_insight_id',
        'img_challenges_and_insight',
        'project_id',
    ];

    public function projectResults()
    {
        return $this->hasMany(ProjectResult::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}
