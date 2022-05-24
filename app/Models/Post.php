<?php

namespace App\Models;

use App\Enums\PostStatusEnum;
use App\Enums\PostTypeEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    use Sluggable;

    protected $guarded = [];

    protected $casts = [
        'meta' => 'json',
        'published_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function (self $model) {
            $model->uuid = Str::uuid();
        });
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(368)
            ->height(232);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function scopeOnlyArtworks(Builder $builder): Builder
    {
        return $builder->where('type', PostTypeEnum::ARTWORKS);
    }

    public function scopeOnlyNews(Builder $builder): Builder
    {
        return $builder->where('type', PostTypeEnum::NEWS);
    }

    public function scopeOnlyPublished(Builder $builder): Builder
    {
        return $builder->where('status', PostStatusEnum::PUBLISHED);
    }

    public function getStatusDescAttribute(): string
    {
        return PostStatusEnum::STATUS[$this->status] ?? 'unknown';
    }

    public function getStatusColorAttribute(): string
    {
        return PostStatusEnum::STATUS_COLOR[$this->status] ?? 'unknown';
    }

    public function getTypeColorAttribute(): string
    {
        return PostTypeEnum::STATUS_COLOR[$this->type] ?? 'unknown';
    }

    public function isPublished(): bool
    {
        return PostStatusEnum::isPublished($this->status);
    }

    public function isTrashed(): bool
    {
        return PostStatusEnum::isTrashed($this->status);
    }
}
