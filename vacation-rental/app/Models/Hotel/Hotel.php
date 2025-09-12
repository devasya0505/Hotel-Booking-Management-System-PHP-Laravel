<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = "hotels";

    protected $fillable = [
        'name',
        'image',
        'description',
        'location',
    ];

    public $timestamps = true;
}
