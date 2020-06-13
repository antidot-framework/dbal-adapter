<?php

declare(strict_types=1);

namespace Antidot\Persistence\DBAL\Container;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;

class DBALConnectionFactory
{
    public const DEFAULT_CONNECTION_NAME = 'default';
    public const MISSING_CONFIG_MESSAGE = 'Missing config for dbl connection inside the container.';

    public function __invoke(
        ContainerInterface $container,
        string $connectionName = self::DEFAULT_CONNECTION_NAME
    ): Connection {
        $connectionParams = $container->get('config')['dbal']['connections'][$connectionName] ?? null;

        if (false === is_array($connectionParams)) {
            throw new InvalidArgumentException(self::MISSING_CONFIG_MESSAGE);
        }

        return DriverManager::getConnection($connectionParams);
    }
}
