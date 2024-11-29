<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\DependencyInjection\ContainerBuilder;

final class CacheConfiguration
{
    public static function configure(ContainerBuilder $container): void
    {
        $container->loadFromExtension('framework', [
            'cache' => []
        ]);
    }
} 
