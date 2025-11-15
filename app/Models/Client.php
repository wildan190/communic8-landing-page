<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $fillable = ['logo', 'company_name', 'industry', 'category', 'slug'];

    public function portfolioDetail()
    {
        return $this->hasOne(PortfolioDetail::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($client) {
            $client->slug = Str::slug($client->company_name);
        });
    }
}
