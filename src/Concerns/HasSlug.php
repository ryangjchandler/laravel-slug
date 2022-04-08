<?php

namespace RyanChandler\Slug\Concerns;

use Illuminate\Support\Str;
use RyanChandler\Slug\Support;
use Illuminate\Database\Eloquent\Model;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            $options = Support::getOptionsFromModel($model);

            $column = $options->column;
            $source = $options->source;

            $model->{$column} = Str::slug($model->{$source});
        });
    }
}
