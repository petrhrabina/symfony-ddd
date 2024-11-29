<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\DependencyInjection\ContainerBuilder;

final class FrameworkConfiguration
{
    public static function configure(ContainerBuilder $container): void
    {
        $container->loadFromExtension('framework', [
            'secret' => '%env(APP_SECRET)%',
            'session' => true,
        ]);

        if ($container->getParameter('kernel.environment') === 'test') {
            $container->loadFromExtension('framework', [
                'test' => true,
                'session' => [
                    'storage_factory_id' => 'session.storage.factory.mock_file'
                ]
            ]);
        }
    }
} 
