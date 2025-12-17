<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $fillable = [
        'title',
        'content',
        'slug'
    ];

    public $casts = [
        'content' => 'json',
    ];

    /** @var array|string[] */
    public array $translatable = [
        'title',
        'content',
        'slug'
    ];
}
