<?php

namespace App\Enums;

class PostStatusEnum
{
    public const STATUS = [
        'Draft',
        'Published',
        'Trashed'
    ];

    public const DRAFT = 0;

    public const PUBLISHED = 1;

    public const TRASHED = 2;

    public const STATUS_COLOR = [
        'text-gray-700 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-100',
        'text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100',
        'text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100',
    ];

    public static function getValue(string $value): int
    {
        return [
            'draft' => self::DRAFT,
            'published' => self::PUBLISHED,
            'trashed' => self::TRASHED,
        ][$value] ?? 99 ;
    }

    public static function isPublished(int $status): bool
    {
        return self::PUBLISHED === $status;
    }

    public static function isTrashed(int $status): bool
    {
        return self::TRASHED === $status;
    }
}
