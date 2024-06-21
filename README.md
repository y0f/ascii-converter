# Small laravel package to make ASCII art

This Laravel package converts images to ASCII art using HTML/CSS.
It's a small package containing a trait that converts images into a representation of the image in HTML and inline CSS.

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
