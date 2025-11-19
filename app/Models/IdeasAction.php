<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeasAction extends Model
{
    protected $fillable = [
        'name',
        'description',
        'img_upload',
        'portfolio_detail_id'
    ];

    public function portfolioDetail()
    {
        return $this->belongsTo(PortfolioDetail::class);
    }
}
