<?php

require_once __DIR__ . '/vendor/autoload.php';

use Alfredo\Config\StarterSite;
use Timber\Timber;

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array('views');

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;

new StarterSite();
