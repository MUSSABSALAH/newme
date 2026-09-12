<?php

declare(strict_types=1);

namespace App\Support;

/**
 * Public asset URL with a filemtime query so mobile browsers
 * cannot keep serving a stale CSS/JS file after a deploy.
 */
final class VersionedAsset
{
    public static function url(string $path): string
    {
        $full = public_path($path);
        $version = is_file($full) ? (string) filemtime($full) : (string) time();

        return asset($path).'?v='.$version;
    }
}
