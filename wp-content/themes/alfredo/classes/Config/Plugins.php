<?php
namespace Alfredo\Config;

class Plugins
{
    public function __construct()
    {
        require_once dirname(__FILE__) . '/../../libs/tgmpa/class-tgm-plugin-activation.php';
        add_action('tgmpa_register', array($this, 'registerRequiredPlugins'));
    }

    public function registerRequiredPlugins()
    {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // This is an example of how to include a plugin bundled with a theme.
            array(
                'name' => 'Advanced Custom Fields PRO', // The plugin name.
                'slug' => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name).
                'source' => dirname(__FILE__) . '/../../libs/tgmpa/plugins/advanced-custom-fields-pro.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '5.11.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url' => '', // If set, overrides default API URL and points to an external URL.
                'is_callable' => 'acf',
            ),

            // This is an example of how to include a plugin bundled with a theme.
            array(
                'name' => 'WPBakery Page Builder', // The plugin name.
                'slug' => 'js_composer', // The plugin slug (typically the folder name).
                'source' => dirname(__FILE__) . '/../../libs/tgmpa/plugins/js_composer.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '6.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
                'force_activation' => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'is_callable' => array('Vc_Manager', 'getInstance'),
            ),

            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            array(
                'name' => 'Yoast SEO', // The plugin name.
                'slug' => 'wordpress-seo', // The plugin slug (typically the folder name).
                'source' => 'https://downloads.wordpress.org/plugin/wordpress-seo.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '17.8',
                'is_callable' => 'wpseo_auto_load',
            ),

            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            array(
                'name' => 'W3 Total Cache', // The plugin name.
                'slug' => 'w3-total-cache', // The plugin slug (typically the folder name).
                'source' => 'https://downloads.wordpress.org/plugin/w3-total-cache.2.2.1.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '2.2.1',
                'is_callable' => 'w3tc_class_autoload',
            ),

            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            array(
                'name' => 'Contact Form 7', // The plugin name.
                'slug' => 'contact-form-7', // The plugin slug (typically the folder name).
                'source' => 'https://downloads.wordpress.org/plugin/contact-form-7.5.5.3.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '5.5.3',
                'is_callable' => 'wpcf7',
            ),
            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            array(
                'name' => 'Contact Form 7 Database Addon', // The plugin name.
                'slug' => 'contact-form-cfdb7', // The plugin slug (typically the folder name).
                'source' => 'https://downloads.wordpress.org/plugin/contact-form-cfdb7.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '1.2.6',
            ),

            // This is an example of how to include a plugin from an arbitrary external source in your theme.
            array(
                'name' => 'Polylang', // The plugin name.
                'slug' => 'polylang', // The plugin slug (typically the folder name).
                'source' => 'https://downloads.wordpress.org/plugin/polylang.3.1.3.zip', // The plugin source.
                'required' => true, // If false, the plugin is only 'recommended' instead of required.
                'version' => '3.1.3',
                'is_callable' => array('Polylang', 'init'),
            ),
        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id' => 'alfredo_base_theme', // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '', // Default absolute path to bundled plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug' => 'themes.php', // Parent menu slug.
            'capability' => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices' => true, // Show admin notices or not.
            'dismissable' => true, // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false, // Automatically activate plugins after installation or not.
            'message' => '', // Message to output right before the plugins table.

            'strings' => array(
                'page_title' => __('Install Required Plugins', 'alfredo_base_theme'),
                'menu_title' => __('Install Plugins', 'alfredo_base_theme'),
                /* translators: %s: plugin name. */
                'installing' => __('Installing Plugin: %s', 'alfredo_base_theme'),
                /* translators: %s: plugin name. */
                'updating' => __('Updating Plugin: %s', 'alfredo_base_theme'),
                'oops' => __('Something went wrong with the plugin API.', 'alfredo_base_theme'),
                'notice_can_install_required' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This theme requires the following plugin: %1$s.',
                    'This theme requires the following plugins: %1$s.',
                    'alfredo_base_theme'
                ),
                'notice_can_install_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'This theme recommends the following plugin: %1$s.',
                    'This theme recommends the following plugins: %1$s.',
                    'alfredo_base_theme'
                ),
                'notice_ask_to_update' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                    'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                    'alfredo_base_theme'
                ),
                'notice_ask_to_update_maybe' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'There is an update available for: %1$s.',
                    'There are updates available for the following plugins: %1$s.',
                    'alfredo_base_theme'
                ),
                'notice_can_activate_required' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following required plugin is currently inactive: %1$s.',
                    'The following required plugins are currently inactive: %1$s.',
                    'alfredo_base_theme'
                ),
                'notice_can_activate_recommended' => _n_noop(
                    /* translators: 1: plugin name(s). */
                    'The following recommended plugin is currently inactive: %1$s.',
                    'The following recommended plugins are currently inactive: %1$s.',
                    'alfredo_base_theme'
                ),
                'install_link' => _n_noop(
                    'Begin installing plugin',
                    'Begin installing plugins',
                    'alfredo_base_theme'
                ),
                'update_link' => _n_noop(
                    'Begin updating plugin',
                    'Begin updating plugins',
                    'alfredo_base_theme'
                ),
                'activate_link' => _n_noop(
                    'Begin activating plugin',
                    'Begin activating plugins',
                    'alfredo_base_theme'
                ),
                'return' => __('Return to Required Plugins Installer', 'alfredo_base_theme'),
                'plugin_activated' => __('Plugin activated successfully.', 'alfredo_base_theme'),
                'activated_successfully' => __('The following plugin was activated successfully:', 'alfredo_base_theme'),
                /* translators: 1: plugin name. */
                'plugin_already_active' => __('No action taken. Plugin %1$s was already active.', 'alfredo_base_theme'),
                /* translators: 1: plugin name. */
                'plugin_needs_higher_version' => __('Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'alfredo_base_theme'),
                /* translators: 1: dashboard link. */
                'complete' => __('All plugins installed and activated successfully. %1$s', 'alfredo_base_theme'),
                'dismiss' => __('Dismiss this notice', 'alfredo_base_theme'),
                'notice_cannot_install_activate' => __('There are one or more required or recommended plugins to install, update or activate.', 'alfredo_base_theme'),
                'contact_admin' => __('Please contact the administrator of this site for help.', 'alfredo_base_theme'),

                'nag_type' => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
            ),
        );

        tgmpa($plugins, $config);
    }
}
