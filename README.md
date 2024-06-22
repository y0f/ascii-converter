# Image to ASCII Converter

Laravel package to convert images into ASCII art using HTML and inline CSS. This package is an old project I created that I turned into a Packagist package.
It is pretty useless, but it was fun to build. 

## Features

- **Upload Images**: Convert uploaded images to ASCII art.
- **Customize Output**: Adjust properties for your ASCII art.

### Input

![input image](https://github.com/y0f/html-css-ascii-converter/assets/70378641/ed5ffea5-210a-4fba-b0d5-be8132f22360)



### Output

![output image](https://github.com/y0f/html-css-ascii-converter/assets/70378641/b25143e2-0782-4caa-aac1-01aff6b08588)


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
