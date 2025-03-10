<?php

declare(strict_types=1);

namespace App\Config;

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

final class RoutesConfiguration
{
    public static function configure(RoutingConfigurator $routes): void
    {
        $routes
            ->add(
                'users',
                '/users'
            )
            ->controller(
                [
                    'App\Controller\UserController',
                    'findAllUsers'
                ]
            );

        $routes
            ->add(
                'not_found',
                '/{catchAll}'
            )
            ->controller(
                [
                    'App\Controller\ErrorController',
                    'notFound'
                ]
            )
            ->requirements(
                [
                    'catchAll' => '.+'
                ]
            );
    }
}
