<?php

declare(strict_types=1);

namespace AntidotTest\Persistence\DBAL\Container;

use Antidot\Persistence\DBAL\Container\DBALConnectionFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;

class DBALConnectionFactoryTest extends TestCase
{
    private const CUSTOM_CONNECTION_NAME = 'custom_conn';
    private const DEFAULT_CONFIG = [
        'dbal' => [
            'connections' => [
                'default' => [
                    'url' => 'mysql://user:secret@localhost/mydb',
                ],
                self::CUSTOM_CONNECTION_NAME => [
                    'url' => 'mysql://user:secret@localhost/another_db',
                ],
            ]
        ],
    ];
    /** @var DBALConnectionFactory */
    private DBALConnectionFactory $factory;
    /** @var \PHPUnit\Framework\MockObject\MockObject|ContainerInterface */
    private $container;

    public function setUp(): void
    {
        $this->factory = new DBALConnectionFactory();
        $this->container = $this->createMock(ContainerInterface::class);
    }

    public function testItShouldCreateInstancesOfDBALConnection(): void
    {
        $this->container->expects($this->once())
            ->method('get')
            ->with('config')
            ->willReturn(self::DEFAULT_CONFIG);
        $this->factory->__invoke($this->container);
    }

    public function testItShouldThrowAnExceptionWithoutConfig(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage(DBALConnectionFactory::MISSING_CONFIG_MESSAGE);
        $this->factory->__invoke($this->container);
    }

    public function testItShouldInstantiateAConnectionForCustomConfig(): void
    {
        $this->container->expects($this->once())
            ->method('get')
            ->with('config')
            ->willReturn(self::DEFAULT_CONFIG);
        $this->factory->__invoke($this->container, self::CUSTOM_CONNECTION_NAME);
    }
}
