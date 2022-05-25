<?php

namespace App\Enums;

class PostTypeEnum
{
    public const ARTWORKS = 'artworks';

    public const NEWS = 'news';

    public const STATUS_COLOR = [
        'artworks' => 'text-teal-700 bg-teal-100 rounded-full',
        'news' => 'text-rose-700 bg-rose-100 rounded-full',
    ];

    public static function getValues(): array
    {
        return [
            'artworks',
            'news'
        ];
    }
}
