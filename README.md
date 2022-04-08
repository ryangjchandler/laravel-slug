# Simple slugs for your Laravel models.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/ryangjchandler/laravel-slug.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-slug)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-slug/run-tests?label=tests)](https://github.com/ryangjchandler/laravel-slug/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/ryangjchandler/laravel-slug/Check%20&%20fix%20styling?label=code%20style)](https://github.com/ryangjchandler/laravel-slug/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ryangjchandler/laravel-slug.svg?style=flat-square)](https://packagist.org/packages/ryangjchandler/laravel-slug)

This packages provides an opinionated, attribute-driven trait for automatically generating slugs when creating Laravel models.

## Installation

You can install the package via Composer:

```bash
composer require ryangjchandler/laravel-slug
```

## Usage

Use the `RyanChandler\Slug\Concerns\HasSlug` trait on your model class.

```php
use RyanChandler\Slug\Concerns\HasSlug;

class Post extends Model
{
    use HasSlug;
}
```

By default, this package will generate a slug using a `title` column on your model and store the value in a `slug` column.

This can be changed using the `RyanChandler\Slug\Attribute\Slug` attribute.

```php
use RyanChandler\Slug\Concerns\HasSlug;
use RyanChandler\Slug\Attribute\Slug;

#[Slug(source: 'name', column: 'my_slug')]
class Post extends Model
{
    use HasSlug;
}
```

The `source` argument should contain the name of the column you'd like to generate a slug from. The `column` argument should contain the name of the column you'd like to store the generated slug in.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Ryan Chandler](https://github.com/ryangjchandler)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
