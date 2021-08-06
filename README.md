# Laravel Knowledge Base

[![Latest Version on Packagist](https://img.shields.io/packagist/v/athulya/laravel-knowledge-base.svg?style=flat-square)](https://packagist.org/packages/athulya/laravel-knowledge-base)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/athulyasanthosh/laravel-knowledge-base/run-tests?label=tests)](https://github.com/athulyasanthosh/laravel-knowledge-base/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/athulyasanthosh/laravel-knowledge-base/Check%20&%20fix%20styling?label=code%20style)](https://github.com/athulyasanthosh/laravel-knowledge-base/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/athulya/laravel-knowledge-base.svg?style=flat-square)](https://packagist.org/packages/athulya/laravel-knowledge-base)

## Description 


This package can be used to integrate knowledge base to your Laravel application. Package installation and publishing commands are given below, please refer that.
Backend section contains category and article management system. (add, edit, list and delete)

Front end features are described below:
Landing page with article listing and, they contain article search options such as, category based and keyword-based searching.
Search listing page contains article title and pagination. Each article contains link to their detail page.
Like and dislike feature for voting in article details page, it can be show/hide using config settings.
Config to control the landing page title, category title, show/hide article count, like and dislike feature and sidebar show/hide.

This package contains an API section, following are the feature in that section
API to list all articles and popular articles separately.
API to search articles by category.
API to get details page with next and previous links.
Article voting feature using API.





## Installation

You can install the package via composer:

```bash
composer require athulya/laravel-knowledge-base
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Athulya\LaravelKnowledgeBase\LaravelKnowledgeBaseServiceProvider" --tag="laravel-knowledge-base-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Athulya\LaravelKnowledgeBase\LaravelKnowledgeBaseServiceProvider" --tag="laravel-knowledge-base-config"
```

Front end routing:
```bash
Route::knowledgeBase('knowledge-base');
```

Backend Routing :
```bash
Route::category('category');
Route::article('article');
```

Api Routes
Front end routing:
```bash
Route::knowledgeApi('knowledge');
```

This is the contents of the published config file:

```php
return [
    /*
    |--------------------------------------------------------------------------
    | Home page title text Setting
    |--------------------------------------------------------------------------
    |
    | This option controls the home page title. Default set to Knowledge Base for displaying.
    | You can change these default text by any text as per your needs.
    |
    */
    'home_page_title' => 'Knowledge Base',

    /*
    |--------------------------------------------------------------------------
    | Category Name Display Setting
    |--------------------------------------------------------------------------
    |
    | This option controls the settings for display category title in home page. Default set to true for displaying.
    | You can change these default to false for hiding as per your needs.
    |
    */
    'category_title_show' => true,

    /*
    |--------------------------------------------------------------------------
    | Article count Display Setting
    |--------------------------------------------------------------------------
    |
    | This option controls the settings for display article count in home page. Default set to true for displaying.
    | You can change these default to false for hiding as per your needs.
    |
    */
    'article_count_show' => true,

    /*
    |--------------------------------------------------------------------------
    | Like and dislike feature Display Setting
    |--------------------------------------------------------------------------
    |
    | This option controls the settings for display like and dislike feature in article details page. Default set to true for displaying.
    | You can change these default to false for hiding as per your needs.
    |
    */
    'like_and_dislike' => true,

    /*
    |--------------------------------------------------------------------------
    | Home page sidebar Display Setting
    |--------------------------------------------------------------------------
    |
    | This option controls the settings for display sidebar feature in article listing page. Default set to true for displaying.
    | You can change these default to false for hiding as per your needs.
    |
    */
    'show_sidebar' => true,
];
```


## Usage

```php
$laravel-knowledge-base = new Athulya\LaravelKnowledgeBase();
echo $laravel-knowledge-base->echoPhrase('Hello, Spatie!');
```

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

- [Athulya Santhosh](https://github.com/athulyasanthosh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
