<?php

namespace RyanChandler\Slug\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class Slug
{
    public function __construct(
        public string $source = 'title',
        public string $column = 'slug',
        public bool $forceUniqueness = false,
    ) {
    }
}
