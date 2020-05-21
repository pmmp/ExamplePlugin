# ExamplePlugin

This repository contains a basic example of a modern PocketMine-MP plugin, and a handful of the API features.

## PHPStan analysis
This repository shows an example setup for standalone local analysis of a plugin using [PHPStan](https://phpstan.org).

It uses [Composer](https://getcomposer.org) for autoloading, allowing you to install PHPStan extensions such as [phpstan-strict-rules](https://github.com/phpstan/phpstan-strict-rules). The configuration for this can be seen in [`phpstan-composer.json`](/phpstan-composer.json).

### Setting up PHPStan
Assuming you have Composer and a compatible PHP binary available in your PATH, run:
```
COMPOSER=phpstan-composer.json composer install
```

Then you can run PHPStan exactly as you would with any other project:
```
vendor/bin/phpstan analyze
```

### Updating the dependencies
```
COMPOSER=phpstan-composer.json composer update
```

In a nutshell, just stick `COMPOSER=phpstan-composer.json` in front of any Composer command. Alternatively you can export the `COMPOSER` environment variable, but beware if you use the same shell for a different project later on.


