# Image to ASCII Converter

Laravel package to convert images into ASCII art using HTML and inline CSS. This package is an old project I created that I turned into a Packagist package.
It has little to no usecases, unless you like ASCII :P.

## Features

- **Upload Images**: Convert uploaded images to ASCII art.
- **Customize Output**: Adjust properties for your ASCII art.

### Input

![Input Image](https://github.com/y0f/html-css-ascii-converter/assets/70378641/52df0461-74a2-48fe-a865-183c2db8ca9f)

### Output

![Output Image](https://github.com/y0f/html-css-ascii-converter/assets/70378641/0cfb710d-155b-4b64-937e-46a7a1c8e07d)

## Installation

You can install the package via Composer:

```bash
composer require y0f/image-to-ascii
```

## Requirements

Make sure GD library is enabled in your php.ini file:
```bash
extension=gd
```

## Register Service Provider

Add ImageToAsciiServiceProvider to your providers:

```php
<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
    Y0f\ImageToAscii\ImageToAsciiServiceProvider::class,
];

```

## Publish Views
You can publish the package views using the following command:
```bash
php artisan vendor:publish --tag=image-to-ascii-views
```
