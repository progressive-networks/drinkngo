<?php

namespace Modules;

$fsIterator = new \FilesystemIterator(dirname(__FILE__), \FilesystemIterator::SKIP_DOTS);

foreach ($fsIterator as $entry) {
    if (!$entry->isDir()) {
        continue;
    }

    $moduleDir = $entry->getPathname();
    $moduleFile = $moduleDir . DIRECTORY_SEPARATOR . 'module.php';

    // if (!file_exists($entry->getPath() . '/module.php')) {
    //     continue;
    // }

    require_once $moduleFile;
}
