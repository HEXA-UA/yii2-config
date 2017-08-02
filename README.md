# Yii2 Config Manager [![build status](https://git.hexa.com.ua/yii2/config/badges/master/build.svg)](https://git.hexa.com.ua/yii2/config/commits/master) [![coverage report](https://git.hexa.com.ua/yii2/config/badges/master/coverage.svg)](https://git.hexa.com.ua/yii2/config/commits/master)
Description here

## Installation

Run command
```php
composer require hexa/yiiconfig:*
```
OR add following lines to `composer.json` file in `require` section
```php
{
    "require": {
        "hexa/yiiconfig": "*"
    }
}
```

### Migrations

To run migrations execute following command from project root directory
```php
php yii migrate --migrationPath=@hexa/yiiconfig/migrations
```

## Usage