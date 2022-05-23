<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'json',
    ];

    public function scopeOnlyArtworks(Builder $builder): Builder
    {
        return $builder->where('type', PostTypeEnum::ARTWORKS);
    }

    public function getStatusDescAttribute(): string
    {
        return PostStatusEnum::STATUS[$this->status] ?? 'unknown';
    }

    public function getStatusColorAttribute(): string
    {
        return PostStatusEnum::STATUS_COLOR[$this->status] ?? 'unknown';
    }
}
