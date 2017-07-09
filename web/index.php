<?php
require_once __DIR__ . "/../vendor/autoload.php";

use carcada\Application;

(new Application)
    ->boot()
    ->run();