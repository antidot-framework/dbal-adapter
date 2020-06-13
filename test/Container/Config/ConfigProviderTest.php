<?php

declare(strict_types=1);


namespace AntidotTest\Persistence\DBAL\Container\Config;

use Antidot\Persistence\DBAL\Container\Config\ConfigProvider;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    public function testItHaveAPackageConfig(): void
    {
        $configProvider = new ConfigProvider();
        $this->assertEquals(ConfigProvider::DEFAULT_CONFIG, $configProvider->__invoke());
    }
}
