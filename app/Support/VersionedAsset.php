<?php

declare(strict_types=1);

namespace App\Support;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

/**
 * Public asset URL with a filemtime query so mobile browsers
 * cannot keep serving a stale CSS/JS file after a deploy.
 */
final class VersionedAsset
{
    /**
     * Long-lived on purpose: a deploy clears the cache, and nothing else can
     * change a file's timestamp on a production server.
     */
    private const TTL_SECONDS = 86400;

    public static function url(string $path): string
    {
        return asset($path).'?v='.self::version($path);
    }

    private static function version(string $path): string
    {
        // Every page asks for around eight assets, which was eight is_file plus
        // filemtime calls per request. Skipped locally so that saving a CSS file
        // still shows up on the next reload without clearing anything.
        if (App::environment('local', 'testing')) {
            return self::stamp($path);
        }

        return (string) Cache::remember(
            'asset.version.'.$path,
            self::TTL_SECONDS,
            static fn (): string => self::stamp($path),
        );
    }

    private static function stamp(string $path): string
    {
        $full = public_path($path);

        return is_file($full) ? (string) filemtime($full) : (string) time();
    }
}
