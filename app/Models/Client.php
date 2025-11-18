<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $fillable = ['logo', 'company_name', 'industry', 'category'];

    public function portfolioDetail()
    {
        return $this->hasOne(PortfolioDetail::class);
    }

    protected static function boot()
    {
        parent::boot();

        // EVENT TETAP ADA, tapi tidak menyentuh attribute apa pun
        static::saving(function ($client) {
            // Event tetap ada, tidak melakukan apa-apa untuk slug
        });
    }

    /**
     * Accessor untuk slug (virtual, tidak disimpan di DB)
     */
    public function getSlugAttribute()
    {
        return Str::slug($this->company_name);
    }
}
