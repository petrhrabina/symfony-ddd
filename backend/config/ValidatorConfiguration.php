<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ValidatorConfiguration
{
    
    public static function configure(ContainerBuilder $container): void
    {
        if ($container->hasParameter('kernel.environment') && $container->getParameter('kernel.environment') === 'test') {
            $container->loadFromExtension('framework', [
                'validation' => [
                    'not_compromised_password' => false
                ]
            ]);
        }
    }

}
