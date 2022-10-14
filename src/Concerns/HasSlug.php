<?php

namespace RyanChandler\Slug\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RyanChandler\Slug\Attributes\Slug;
use RyanChandler\Slug\Support;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            $options = Support::getOptionsFromModel($model);

            $column = $options->column;
            $source = $options->source;
            $slug = Str::slug($model->{$source});

            $model->{$column} = $options->forceUniqueness ? $model->makeSlugUnique($slug, $options) : $slug;
        });
    }

    protected function makeSlugUnique(string $slug, Slug $options): string
    {
        $count = static::query()
            ->where(function (Builder $query) use ($options, $slug) {
                $query
                    ->where($options->column, $slug)
                    ->orWhere($options->column, 'LIKE', "{$slug}-%");
            })
            ->count();

        if ($count === 0) {
            return $slug;
        }

        return $slug . '-' . $count;
    }
}
