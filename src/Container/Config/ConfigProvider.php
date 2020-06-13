<?php

declare(strict_types=1);

namespace Antidot\Persistence\DBAL\Container\Config;

use Antidot\Persistence\DBAL\Container\DBALConnectionFactory;
use Doctrine\DBAL\Connection;

class ConfigProvider
{
    public const DEFAULT_CONFIG = [
        'factories' => [
            Connection::class => DBALConnectionFactory::class,
        ],
        'dbal' => [
            'connections' => [
//                    'default' => [
//                        'url' => 'mysql://user:secret@localhost/mydb',
//                    ],
//                    'other'=> [
//                        'url' => 'mysql://user:secret@localhost/another_db',
//                    ],
            ]
        ],
    ];


    public function __invoke(): array
    {
        return self::DEFAULT_CONFIG;
    }
}
