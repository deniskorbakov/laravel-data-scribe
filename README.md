# Laravel Data Scribe

<a href="https://github.com/deniskorbakov/laravel-data-scribe"><img alt="GitHub Workflow Status" src="https://github.com/deniskorbakov/laravel-data-scribe/actions/workflows/lint.yml/badge.svg"></a>
<a href="https://github.com/deniskorbakov/laravel-data-scribe"><img alt="GitHub Workflow Status" src="https://github.com/deniskorbakov/laravel-data-scribe/actions/workflows/tests.yml/badge.svg"></a>
<a href="https://packagist.org/packages/deniskorbakov/laravel-data-scribe"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/deniskorbakov/laravel-data-scribe"></a>
<a href="https://packagist.org/packages/deniskorbakov/laravel-data-scribe"><img alt="Latest Version" src="https://img.shields.io/packagist/v/deniskorbakov/laravel-data-scribe"></a>
<a href="https://packagist.org/packages/deniskorbakov/laravel-data-scribe"><img alt="License" src="https://img.shields.io/packagist/l/deniskorbakov/laravel-data-scribe"></a>

[This package](https://packagist.org/packages/deniskorbakov/laravel-data-scribe) is intended for [scribe](https://github.com/knuckleswtf/scribe) business with [laravel-data](https://github.com/spatie/laravel-data)

By default, [scribe](https://github.com/knuckleswtf/scribe) cannot generate documentation from [laravel-data](https://github.com/spatie/laravel-data), so I propose solutions in the form of this package with plugins

| Scribe Support        | Description                                |     Plugin Name      | Status |
|:----------------------|:-------------------------------------------|:--------------------:|:------:|
| ``Body Parameters``   | Generate Body Params from laravel-data     | LaravelDataBodyParam |   ✅    |
| ``Responses``         | Generate Response from laravel-data        |          🚫          |   ❌    |
| ``Url Parameters``    | Support Parameters along with laravel-data |          🚫          |   ❌    |
| ``Custom Validation`` | Support Custom Rules in laravel-data       |          🚫          |   ❌    |

## 📝 Getting Started

Install the package via composer:
```shell
composer require deniskorbakov/laravel-data-scribe
```

Add the plugin in your `config/scribe.php` file to the very end of the array:
```php
    'strategies' => [
        'bodyParameters'  => [
            ...Defaults::BODY_PARAMETERS_STRATEGIES,
            DenisKorbakov\LaravelDataScribe\LaravelDataBodyParam::class,
        ],
    ],
```

Run the command to generate documentation:
```bash
php artisan scribe:generate
```

## ⚒️ Local Development

Clone this repository:
```bash
git clone https://github.com/deniskorbakov/laravel-data-scribe
```

Let's go to the cloned repository:
```bash
cd laravel-data-scribe
```

To start, initialize the project and use it:
```bash
make init
```

## 🧪 Testing

You can run the command for testing after the step with local installation

Run Lint and Analyze code(phpstan/rector/phpcs):
```bash
make lint
```

Run Unit tests:
```bash
make test
```

Run mutation tests:
```bash
make test-mutation
```

Run test coverage:
```bash
make test-coverage
```

## 🤝 Feedback

We appreciate your support and look forward to making our product even better with your help!

[@Denis Korbakov](https://github.com/deniskorbakov)

---

📝 Generated from [deniskorbakov/skeleton-php-docker](https://github.com/deniskorbakov/skeleton-php-docker)
