<?php

namespace Alfredo\Config;

class Shortcodes
{
    public function __construct()
    {
        add_shortcode('custom-shortcode', array($this, 'customShortcode'));
    }

    public function customShortcode()
    {
    }
}
