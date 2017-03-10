<?php

/**
  * @link              https://www.smartling.com
  * @since             1.0.0
  * @package           smartling-divi-builder-localization
  * @wordpress-plugin
  * Plugin Name:       Smartling Divi Builder localization
  * Description:       Extend Smartling Connector functionality to support localization of Divi Builder shortcodes
  * Plugin URI:        https://www.smartling.com/translation-software/wordpress-translation-plugin/
  * Author URI:        https://www.smartling.com
  * License:           GPL-3.0+
  * Network:           true
  * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
  * Version: 1.0
*/

add_action('plugins_loaded', function () {
    add_action('smartling_before_init', function (\Symfony\Component\DependencyInjection\ContainerBuilder $di) {
        // Require files.
        require_once __DIR__ . '/extension/ShortcodeInjector.php';
        require_once __DIR__ . '/SmartlingDiviBuilderTagProcessor.php';

        // Register shortcodes.
        SmartlingDiviBuilder\SmartlingDiviBuilderTagProcessor::registerShortcodes();

        // Register filters.
        SmartlingDiviBuilder\SmartlingDiviBuilderTagProcessor::registerFilters();
    });
});
