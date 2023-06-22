<?php

require 'vendor/autoload.php';

use Cache\Adapter\PHPArray\ArrayCachePool;
use Psr\SimpleCache\CacheInterface;

function getCache(): CacheInterface {
    static $cache = null;

    if ($cache === null) {
        $cache = new ArrayCachePool();
    }
    return $cache;
}

$cache = getCache();
$items = [
    'index.php',
    'public',
    'config'
];

foreach ($items as $item) {
    // checking
    if ($cache->has($item)) {
        $content = $cache->get($item);
    } else {
        $content = getContent($item);
        $cache->set($item, $content);
    }
    echo $content;
}

function getContent($item)
{
    if (is_dir($item)) {
        $content = '';
        $files = scandir($item);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') {
                continue;
            }
            $filePath = $item . '/' . $file;
            $content .= file_get_contents($filePath);
        }
    } else {
        $content = file_get_contents($item);
    }
    return $content;
}
    // Adhim Niokagi
    // Github : Nioka666
?>
