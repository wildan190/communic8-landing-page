<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'portfolio_detail_id',
        'description',
        'result_img',
    ];

    public function portfolioDetail()
    {
        return $this->belongsTo(PortfolioDetail::class);
    }
}
