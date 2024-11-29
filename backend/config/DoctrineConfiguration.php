<?php

declare(strict_types=1);

namespace App\Config;

use Dev\Walk;
use Dev\Finder;
use Ramsey\Collection\Collection;
use Ramsey\Collection\Map\TypedMap;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class DoctrineConfiguration
{
    public static function configure(ContainerBuilder $container): void
    {

        $xmlMapCollection = Walk::dir($container->getParameter('kernel.project_dir') . '/src/Module/*/Infrastructure/*', 'orm.xml');

        $mappings = [];
        $xmlMapCollection->each(function (string $path) use (&$mappings) {
            $xml = simplexml_load_file($path);

            if ($xml === false || empty($xml->entity)) {
                return;
            }

            $entityFqn = (string) $xml->entity['name'];
            $entityNamespace = substr($entityFqn, 0, strrpos($entityFqn, '\\'));

            $mappings[] = [
                'is_bundle' => false,
                'type' => 'xml',
                'dir' => dirname($path),
                'prefix' => $entityNamespace,
                'name' => $entityFqn
            ];
        });

        $container->loadFromExtension('doctrine', [
            'dbal' => [
                'url' => '%env(resolve:DATABASE_URL)%',
            ],
            'orm' => [
                'auto_generate_proxy_classes' => true,
                'naming_strategy' => 'doctrine.orm.naming_strategy.underscore_number_aware',
                'auto_mapping' => true,
                'mappings' => $mappings
            ],
        ]);

        $container->loadFromExtension('doctrine_migrations', [
            'migrations_paths' => [
                'DoctrineMigrations' => '%kernel.project_dir%/migrations'
            ],
            'enable_profiler' => false
        ]);
    }

}
