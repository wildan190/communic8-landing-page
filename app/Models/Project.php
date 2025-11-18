<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client',
        'project_img',
        'project_url',
        'is_highlighted',
        'description', // ✅ add this
    ];

    public function portfolioDetail()
    {
        return $this->hasOne(PortfolioDetail::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'company_name', 'client_id');
    }

    public function results()
    {
        return $this->hasMany(ProjectResult::class);
    }
}
