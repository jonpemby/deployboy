<?php

foreach (glob(__DIR__ . '/*_helpers.php') as $file)
    require_once($file);
