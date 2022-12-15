<?php

namespace Alfredo\Config;

use Alfredo\Config\Assets;
use Alfredo\Config\CustomFunctions;
use Alfredo\Config\Customize;
use Alfredo\Config\CustomPostTypes;
use Alfredo\Config\Plugins;
use Alfredo\Config\SettingsPage;
use Alfredo\Config\Shortcodes;
use Alfredo\Config\SVGSupport;
use Alfredo\Config\Widgets;
use Timber\Menu;
use Timber\Site;

/**
 * Timber init class
 * Inspired from https://github.com/timber/starter-theme
 *
 * @package  Alfredo-Theme
 * @subpackage  Timber
 * @since   Timber 0.1
 */

/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class StarterSite extends Site
{
    /** Add timber support. */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'themeSupports'));
        add_filter('timber/context', array($this, 'addToContext'));
        add_filter('timber/twig', array($this, 'addToTwig'));
        add_action('init', array($this, 'registerNavMenus'));

        new Assets();
        new SettingsPage();
        new SVGSupport();
        new Plugins();
        new Customize();
        new CustomTaxonomies();
        new CustomPostTypes();
        new CustomAjax();
        new Shortcodes();
        new Widgets();
        parent::__construct();
    }

    public function registerNavMenus()
    {
        register_nav_menus(
            array(
                'top-menu' => __('Primary', 'alfredo-theme'),
                'footer-menu' => __('Footer', 'alfredo-theme'),
            )
        );
    }

    public function themeSupports()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support(
            'post-formats',
            array(
                'aside',
                'image',
                'video',
                'quote',
                'link',
                'gallery',
                'audio',
            )
        );

        add_theme_support('menus');

        add_theme_support(
            'custom-logo',
            array(
                'width' => 250,
                'height' => 40,
                'flex-width' => false,
                'flex-height' => false,
                'header-text' => array('site-title'),
            )
        );

        add_filter('use_block_editor_for_post', '__return_false', 10);
        add_filter('use_widgets_block_editor', '__return_false');

        add_filter('wpseo_metabox_prio', function () {
            return 'low';
        });
    }

    /** This is where you add some context
     *
     * @param string $context context['this'] Being the Twig's {{ this }}.
     */
    public function addToContext($context)
    {
        $context['mainMenu'] = new Menu('top-menu');
        $context['footerMenu'] = new Menu('footer-menu');
        $context['site'] = $this;
        $context['logo'] = $this->getLogo();
        $context['options'] = get_field('footer', 'option');
        return $context;
    }

    /** This is where you can add your own functions to twig.
     *
     * @param string $twig get extension.
     */
    public function addToTwig($twig)
    {
        $twig->addFunction(new \Timber\Twig_Function(
            'getField',
            array(new CustomFunctions, 'getField')
        ));

        $twig->addExtension(new \Twig\Extension\StringLoaderExtension());

        return $twig;
    }
    public function getLogo()
    {
        if (function_exists('the_custom_logo')) {
            if (has_custom_logo()) {
                $logo = get_theme_mod('custom_logo');
                $image = wp_get_attachment_image_src($logo, 'full');
                $image_url = $image[0];
                return "<img src='{$image_url}' alt='Logo' />";
            } else {
                $site_title = get_bloginfo('name');
                return $site_title;
            }
        }
    }
}
