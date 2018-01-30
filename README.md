# Yii2 Config Manager [![build status](https://git.hexa.com.ua/yii2/config/badges/master/build.svg)](https://git.hexa.com.ua/yii2/config/commits/master) [![coverage report](https://git.hexa.com.ua/yii2/config/badges/master/coverage.svg)](https://git.hexa.com.ua/yii2/config/commits/master)
Description here

## Installation

Run command
```php
composer require hexaua/yii2-config:*
```
OR add following lines to `composer.json` file in `require` section
```php
{
    "require": {
        "hexaua/yii2-config": "*"
    }
}
```

### Migrations

To run migrations execute following command from project root directory
```php
php yii migrate --migrationPath=@hexaua/yiiconfig/migrations
```

## Usage
```php 
[
    'components' => [
        'config' => [
              'class'          => 'hexaua\yiiconfig\component\ManagerConfig',
              'providerConfig' => [
                  'class'    => 'hexaua\yiiconfig\component\providers\DbProvider',
                  'duration' => 3600 // Cache duration in seconds
              ]
        ]
    ]
]
```
