# Filter Eloquent results via query URL

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smartisan/laravel-query-filter.svg?style=flat-square)](https://packagist.org/packages/smartisan/laravel-query-filter)
[![GitHub Tests Action Status](https://github.com/iamohd/laravel-query-filter/workflows/run-tests/badge.svg)](https://github.com/iamohd/laravel-query-filter/actions?query=workflow%3Arun-tests)
[![Total Downloads](https://img.shields.io/packagist/dt/smartisan/laravel-query-filter.svg?style=flat-square)](https://packagist.org/packages/smartisan/laravel-query-filter)


Laravel query filter is a simple package that allows you to filter Eloquent results via URL query params.

## Installation

You can install the package via composer:

```bash
composer require smartisan/laravel-query-filter
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Smartisan\QueryFilter\QueryFilterServiceProvider" --tag="config"
```

## Usage
1. Create a new filter class using the following command
```bash
php artisan make:filter UserFilter
```

2. Add a new filter method with your logic to the generated filter class
```php
namespace App\Filters;

use Smartisan\QueryFilter\QueryFilter;

class UserFilter extends QueryFilter
{
    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}
```

3. To trigger the filter method, do the following in your controller
```php
use App\Filters\UserFilter;

public function index()
{
    User::filter(UserFilter::class)->get();
}
```

the status filter method will be triggered automatically when the URL contains the following query param ```?status=value```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Mohammed Isa](https://github.com/iamohd)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
