<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    use HasFactory;

    protected $table = 'subservices';

    protected $fillable = [
        'service_id',
        'name',
        'picture_upload',
    ];

    // Relasi ke Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
