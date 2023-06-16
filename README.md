# Bytepoint image optimization API client SDK for laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/flixtechs-labs/laravel-bytepoint.svg?style=flat-square)](https://packagist.org/packages/flixtechs-labs/laravel-bytepoint)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/flixtechs-labs/laravel-bytepoint/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/flixtechs-labs/laravel-bytepoint/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/flixtechs-labs/laravel-bytepoint/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/flixtechs-labs/laravel-bytepoint/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/flixtechs-labs/laravel-bytepoint.svg?style=flat-square)](https://packagist.org/packages/flixtechs-labs/laravel-bytepoint)

Optimize uploaded images on the fly with Bytepoint in Laravel. Fits nicely into your existing workflow

```php

$file = $request->file('image');

$file->bytepoint([
	'type' => 'jpeg'
])
 ->store('avatars');

```


## Installation

You can install the package via composer:

```bash
composer require flixtechs-labs/laravel-bytepoint
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-bytepoint-config"
```

This is the contents of the published config file:

```php
return [
    'token' => env('BYTEPOINT_TOKEN', ''),
    'url' => env('BYTEPOINT_URL', ''),
];
```

## Usage
To use this package you to first to obtain an API token from Bytepont

Visit https://bytepont.flixtechs.co.zw and create an account

On the profile page at the bottom click on "generate token" and copy the token to your .env file as follows

```bash
BYTEPOINT_TOKEN=XXXXXX
```

Add another optional enviroment variable

```bash
BYTEPOINT_URL=https://bytepoint.flixtechs.co.zw/api/v1/images
```

After this, all you need to do is hook bytepoint into your existing workflow.

This package adds a fluent `bytepoint()` helper to the `UploadedFile` object which accepts an array options as arguments.

Currently you can only specifiy the resulting file type, more options coming soon!

```php
$request->file('image')->bytepoint(['type' => 'resulting type'])->store('avatars');
```

list of accepted file types

- webp
- png
- jpeg

Just call bytepoint before you save the file storage or any other media library that you are using

## Optimizing existing images

You can also optimize existing images using the Bytepoint facade

```php
use  FlixtechsLabs\Bytepoint\Facades\Bytepoint;

Bytepoint::optimize($filePath, $destinationPath, $fileName = '', $options = []);

```

The parameters are as follows

- the file `$filePath` is the path to file you want to optimize
- `$destinationPath` is the path to save the optimized file
- `$fileName` is the name of the file, this is optional though
- `$options` an array of options to tell bytepoint how to optimize the image, currently you can only set the resulting file to either `webp,jpeg,png`




## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Given Ncube](https://github.com/slimgee)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
