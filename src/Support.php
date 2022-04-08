<?php

namespace RyanChandler\Slug;

use Illuminate\Database\Eloquent\Model;
use ReflectionObject;
use RyanChandler\Slug\Attributes\Slug;

/** @internal */
final class Support
{
    public static function getOptionsFromModel(Model $model): Slug
    {
        $reflection = new ReflectionObject($model);

        if ($attributes = $reflection->getAttributes(Slug::class)) {
            return $attributes[0]->newInstance();
        }

        return new Slug();
    }
}
