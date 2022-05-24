<?php

namespace App\Enums;

class PostTypeEnum
{
    public const ARTWORKS = 'artworks';

    public const NEWS = 'news';

    public const STATUS_COLOR = [
        'artworks' => 'text-teal-700 bg-teal-100 rounded-full dark:bg-teal-700 dark:text-teal-100',
        'news' => 'text-rose-700 bg-rose-100 rounded-full dark:bg-rose-700 dark:text-rose-100',
    ];

    public static function getValues(): array
    {
        return [
            'artworks',
            'news'
        ];
    }
}
