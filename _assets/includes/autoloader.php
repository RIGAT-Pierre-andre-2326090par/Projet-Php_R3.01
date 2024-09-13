<?php

spl_autoload_unregister(function ($class) {
    include $class . '.php';
});
