# Image to ASCII Converter Laravel Package (VERY PRIMITIVE)

This Laravel package converts images to ASCII art using HTML/CSS.

## Installation

You can install the package via Composer:

```bash
composer require y0f/image-to-ascii
```

## Register Service Provider
Add ImageToAsciiServiceProvider to the providers array in config/app.php:
```php
return [
    // Other providers...
    App\Providers\AppServiceProvider::class,
    Y0f\ImageToAscii\ImageToAsciiServiceProvider::class,
];
```

## Publish Views
You can publish the package views using the following command:
```bash
php artisan vendor:publish --tag=image-to-ascii-views
```
