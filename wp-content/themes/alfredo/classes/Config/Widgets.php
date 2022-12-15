<?php
namespace Alfredo\Config;

class Widgets
{
    public function __construct()
    {
        add_action('widgets_init', array($this, 'registerThemeWidgets'));
    }

    public function registerThemeWidgets()
    {
        /** definimos los argumentos compartidos por los widgets del footer */
        $shared_args = array(
            'before_title' => '<h3 class="title-menu-footer">',
            'after_title' => '</h3>',
            'before_widget' => '<div class="widget-content">',
            'after_widget' => '</div>',
        );

        /** Widget 1 */
        register_sidebar(
            array_merge(
                $shared_args,
                array(
                    'name' => __('Footer Widget #1', 'alfredo_base_theme'),
                    'id' => 'sidebar-1',
                    'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'alfredo_base_theme'),
                )
            )
        );

        /** Widget 2 */
        register_sidebar(
            array_merge(
                $shared_args,
                array(
                    'name' => __('Footer Widget #2', 'alfredo_base_theme'),
                    'id' => 'sidebar-2',
                    'description' => __('Widgets in this area will be displayed in the second column in the footer.', 'alfredo_base_theme'),
                )
            )
        );

        /** Widget 3 */
        register_sidebar(
            array_merge(
                $shared_args,
                array(
                    'name' => __('Footer Widget #3', 'alfredo_base_theme'),
                    'id' => 'sidebar-3',
                    'description' => __('Widgets in this area will be displayed in the third column in the footer.', 'alfredo_base_theme'),
                )
            )
        );

        /** Widget 4 */
        register_sidebar(
            array_merge(
                $shared_args,
                array(
                    'name' => __('Footer Widget #4', 'alfredo_base_theme'),
                    'id' => 'sidebar-4',
                    'description' => __('Widgets in this area will be displayed in the fourth column in the footer.', 'alfredo_base_theme'),
                )
            )
        );

        /** Widget 5 */
        register_sidebar(
            array_merge(
                $shared_args,
                array(
                    'name' => __('Footer Widget #5', 'alfredo_base_theme'),
                    'id' => 'sidebar-5',
                    'description' => __('Widgets in this area will be displayed in the fifth column in the footer.', 'alfredo_base_theme'),
                )
            )
        );

        /** Widget top */
        register_sidebar(
            array(
                'before_title' => '',
                'after_title' => '',
                'before_widget' => '<div class="widget widget-top %2$s">',
                'after_widget' => '</div>',
                'name' => __('Top Widget', 'alfredo_base_theme'),
                'id' => 'top-sidebar',
                'description' => __('Widgets in this area will be displayed near to header menu.', 'alfredo_base_theme'),
            )
        );

        /** Header social widget */
        register_sidebar(
            array(
                'before_title' => '<h3>',
                'after_title' => '</h3>',
                'before_widget' => '<div class="social widget-social %2$s">',
                'after_widget' => '</div>',
                'name' => __('Header social widget', 'alfredo_base_theme'),
                'id' => 'top-social-sidebar',
                'description' => __('Widgets in this area will be displayed over header menu.', 'alfredo_base_theme'),
            )
        );

        /** Header language widget */
        register_sidebar(
            array(
                'before_title' => '<h3>',
                'after_title' => '</h3>',
                'before_widget' => '<div class="language widget-language %2$s">',
                'after_widget' => '</div>',
                'name' => __('Header language widget', 'alfredo_base_theme'),
                'id' => 'top-language-sidebar',
                'description' => __('Widgets in this area will be displayed over header menu.', 'alfredo_base_theme'),
            )
        );

        /** Footer social widget */
        register_sidebar(
            array(
                'before_title' => '<h3>',
                'after_title' => '</h3>',
                'before_widget' => '<div class="social widget-social %2$s">',
                'after_widget' => '</div>',
                'name' => __('Footer social widget', 'alfredo_base_theme'),
                'id' => 'footer-social-sidebar',
                'description' => __('Widgets in this area will be displayed over footer menu.', 'alfredo_base_theme'),
            )
        );

        /** Footer language widget */
        register_sidebar(
            array(
                'before_title' => '<h3>',
                'after_title' => '</h3>',
                'before_widget' => '<div class="language widget-language %2$s">',
                'after_widget' => '</div>',
                'name' => __('Footer language widget', 'alfredo_base_theme'),
                'id' => 'footer-language-sidebar',
                'description' => __('Widgets in this area will be displayed over footer menu.', 'alfredo_base_theme'),
            )
        );
    }
}
