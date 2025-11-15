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
        'client_id',
        'description',
        'delivery',
        'img',
        'project_analysis',
        'challenges_and_insight',
    ];

    public function projectResults()
    {
        return $this->hasMany(ProjectResult::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
