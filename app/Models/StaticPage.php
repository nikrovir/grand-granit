<?php

namespace App\Models;

use App\Enums\PageTypesEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class StaticPage extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'type',
        'title',
        'description',
        'attributes',
        'template',
    ];

    protected function casts(): array
    {
        return [
            'type' => PageTypesEnum::class,
            'attributes' => 'array',
        ];
    }
}
