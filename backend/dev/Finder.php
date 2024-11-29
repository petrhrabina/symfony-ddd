<?php

declare(strict_types=1);

namespace Dev;

use Dev\Collection;

final class Finder
{
    private function __construct()
    {
    }

    public static function between(string $string, string $start, string $end): ?string
    {
        $startPos = strpos($string, $start);
        if ($startPos === false) {
            return null;
        }
        $startPos += strlen($start);

        $endPos = strpos($string, $end, $startPos);
        if ($endPos === false) {
            return null;
        }

        return substr($string, $startPos, $endPos - $startPos);
    }

}
