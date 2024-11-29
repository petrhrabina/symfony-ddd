<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

final class ServicesConfiguration
{

    public static function configure(ContainerConfigurator $container): void
    {
        $services = $container->services()
            ->defaults()
            ->autowire()
            ->autoconfigure();

        $services->load('DataFixtures\\', '%kernel.project_dir%/fixtures');
        $services->load('App\\', '%kernel.project_dir%/src');
    }

}
