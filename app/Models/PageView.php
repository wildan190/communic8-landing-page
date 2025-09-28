<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'session_id',
        'visited_at',
        'visitable_id',
        'visitable_type',
    ];

    public function visitable()
    {
        return $this->morphTo();
    }
}