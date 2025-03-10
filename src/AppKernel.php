<?php

declare(strict_types=1);

namespace App;

use App\Config\CacheConfiguration;
use App\Config\DoctrineConfiguration;
use App\Config\FrameworkConfiguration;
use App\Config\RoutesConfiguration;
use App\Config\ServicesConfiguration;
use App\Config\ValidatorConfiguration;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

class AppKernel extends Kernel
{

    use MicroKernelTrait;

    // 1. Build is called first - basic container assembly
    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        CacheConfiguration::configure($container);
        DoctrineConfiguration::configure($container);
        FrameworkConfiguration::configure($container);
        ValidatorConfiguration::configure($container);
    }

    // 2. Container configuration follows - service registration
    protected function configureContainer(ContainerConfigurator $container): void
    {
        ServicesConfiguration::configure($container);
    }

    // 3. Finally, routes are configured
    protected function configureRoutes(RoutingConfigurator $routes): void
    {
        RoutesConfiguration::configure($routes);
    }

}
