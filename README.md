# Laravel 9 DDD Boilerplate

[![CI](https://github.com/bryanwahyu/Laravel-9-DDD-boilerplates/actions/workflows/ci.yml/badge.svg)](https://github.com/bryanwahyu/Laravel-9-DDD-boilerplates/actions/workflows/ci.yml)

A Laravel 9 skeleton reorganised around Domain-Driven Design. Framework code (kernels, middleware, providers, exception handler) moves out of the way into an infrastructure layer, so `app/Domain` holds only business code: value objects, actions, models and domain exceptions.

## Layout

```
app/
  Domain/                     namespace Domain\
    Shared/
      Actions/Action.php      base class for use cases
      Models/                 BaseModel, AuthModel, PivotModel (soft deletes, guarded ids)
      VO/                     StringVO, IntegerVO, FloatVO, UlidVO, DateTimeVO
      Exceptions/             DomainException, NotFoundException, InvalidArgumentException, InvalidAccessException
    User/Models/User.php      the auth model, built on AuthModel
  Infrastructure/Laravel/     namespace Infra\Laravel\  (HTTP and console kernels, middleware, providers, handler)
  Application/                namespace App\            (application services; create the folder when needed)
  UserInterface/              namespace UI\             (controllers, requests, resources; create when needed)
```

`bootstrap/app.php` binds the kernels and exception handler from `Infra\Laravel`, and `config/app.php` registers the providers from there.

## Building blocks

**Value objects** are immutable and compare by value. `UlidVO` rejects anything that is not a valid ULID, and `DateTimeVO::value()` always renders in UTC with microseconds:

```php
$id = UlidVO::random();
$id->equals(UlidVO::fromPrimitives((string) $id)); // true

DateTimeVO::fromPrimitives('2024-01-02T07:30:00+07:00')->value();
// "2024-01-02 00:30:00.000000 UTC"
```

**Actions** are single-purpose use cases resolved from the container, so their dependencies are injected:

```php
namespace Domain\Order\Actions;

use Domain\Shared\Actions\Action;

class PlaceOrderAction extends Action
{
    public function __construct(private OrderRepository $orders) {}

    public function execute(PlaceOrderData $data): Order
    {
        // business rules here
    }
}

PlaceOrderAction::handle()->execute($data);
```

**Models** extend `BaseModel` (or `AuthModel` for anything that logs in), which turns on soft deletes and guards `id` and the timestamps.

## Adding a bounded context

1. Create `app/Domain/<Context>/` with `Models/`, `Actions/` and, when needed, `VO/` and `Exceptions/`.
2. Put the controller for it in `app/UserInterface/` and keep it thin: validate, call one action, return a resource.
3. Add tests under `tests/Unit/Domain/<Context>` for rules and `tests/Feature` for HTTP.

## Running it

Requires PHP 8.1 or 8.2 and Composer.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Checks, the same ones CI runs:

```bash
vendor/bin/phpstan analyse    # level 6
vendor/bin/phpunit            # uses in-memory SQLite
```

## License

MIT
