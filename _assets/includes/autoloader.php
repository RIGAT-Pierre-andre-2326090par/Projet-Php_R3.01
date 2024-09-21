<?php

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $baseDir = str_replace(DIRECTORY_SEPARATOR.'_assets'.DIRECTORY_SEPARATOR.'includes', '', __DIR__) . DIRECTORY_SEPARATOR .'modules' . DIRECTORY_SEPARATOR;
    $file = $baseDir . $class . '.php';

    if (file_exists($file)) {
        include $file;
    } else {
        $baseDir = str_replace(DIRECTORY_SEPARATOR.'_assets'.DIRECTORY_SEPARATOR.'includes', '', __DIR__) . DIRECTORY_SEPARATOR .'_assets' . DIRECTORY_SEPARATOR;
        $file = $baseDir . $class . '.php';

        if (file_exists($file)) {
            include $file;
        } else {
            echo "non";
            // Log or echo for debugging
            error_log("Autoload failed for class: $class");
        }
    }
});
