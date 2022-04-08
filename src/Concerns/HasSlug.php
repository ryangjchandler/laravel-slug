<?php

namespace RyanChandler\Slug\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use RyanChandler\Slug\Support;

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
