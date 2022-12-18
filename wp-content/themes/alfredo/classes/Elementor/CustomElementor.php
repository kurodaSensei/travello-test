<?php

namespace Alfredo\Elementor;

use Alfredo\Elementor\CustomWidget;

class CustomElementor
{
    public function __construct()
    {
        add_action('elementor/widgets/register', array($this, 'register_oembed_widget'));
    }

    public function register_oembed_widget($widgets_manager)
    {
        $widgets_manager->register(new CustomWidget());
    }

}
