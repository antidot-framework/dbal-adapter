# Antidot PSR-11 DBAL FACTORY 

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/badges/build.png?b=master)](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/antidot-framework/dbal-adapter/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

Doctrine DBAL adapter library for Antidot Framework.

# Config

It uses the config parameters defined in the [doctrine DBAL project docs](https://www.doctrine-project.org/projects/doctrine-dbal/en/2.10/reference/configuration.html#getting-a-connection).

```php
<?php

declare(strict_types=1);

$config = [
    'dbal' => [
        'connections' => [
            'default' => [
                'url' => 'mysql://user:secret@localhost/mydb',
            ],
            'other_connection' => [
                'dbname' => 'otherdb',
                'user' => 'user',
                'password' => 'secret',
                'host' => 'localhost',
                'driver' => 'pdo_mysql',
            ],
        ],
    ],
];
```

## Usage

### Using Laminas Component Installer

If your application uses PSR-11 container and [Laminas Component installer](https://docs.laminas.dev/laminas-component-installer/) it will work out of the box. only by installing it.

### As standalone package


```php
<?php

declare(strict_types=1);

use Antidot\Persistence\DBAL\Container\DBALConnectionFactory;
use Psr\Container\ContainerInterface;

/** @var ContainerInteface $container */
$container->set('config', $config);
$factory = new DBALConnectionFactory();
$defaultConnection = $factory->__invoke($container);
$theOtherConnection = $factory->__invoke($container, 'other_connection');
```

[ico-version]: https://img.shields.io/packagist/v/antidot-fw/dbal-adapter.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/antidot-fw/dbal-adapter
