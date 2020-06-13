# Antidot PSR-11 DBAL FACTORY 

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
