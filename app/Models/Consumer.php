<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'phone',
        'industry',
        'services',
        'find_us',
        'area',
        'message',
    ];
}
