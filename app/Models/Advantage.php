<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advantage extends Model
{
    /** @use HasFactory<\Database\Factories\AdvantageFactory> */
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'description',
    ];
}
