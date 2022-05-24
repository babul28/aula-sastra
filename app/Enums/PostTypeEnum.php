<?php

namespace App\Enums;

class PostTypeEnum
{
    public const ARTWORKS = 'artworks';

    public const NEWS = 'news';

    public static function getValues(): array
    {
        return [
            'artworks',
            'news'
        ];
    }
}
