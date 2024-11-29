<?php

declare(strict_types=1);

namespace Dev;

use Dev\Collection;

final class Walk
{
    private function __construct()
    {
    }

    public static function dir(string $glob, string $needle, ?Collection $collection = null): Collection
    {

        if ($collection === null) {
            $collection = new Collection();
        }

        $current = glob($glob);
        $dirs = array_filter($current, 'is_dir');
        $files = array_filter($current, 'is_file');

        foreach ($files as $file) {
            if (str_contains($file, $needle)) {
                $collection->add($file);
            }
        }

        foreach ($dirs as $dir) {
            self::dir($dir, $needle, $collection);
        }

        return $collection;
    }

}
