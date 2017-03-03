<?php

namespace SmartlingDiviBuilder\Extension;

/**
 * Class ShortcodeInjector
 * @package SmartlingDiviBuilder\Extension
 */
class ShortcodeInjector
{
    private static $shortcodes = [];

    public static function addShortcode($shortcode)
    {
        self::$shortcodes[] = $shortcode;
    }

    public static function addShortcodes(array $shortcodes)
    {
        self::$shortcodes = array_merge(self::$shortcodes, $shortcodes);
    }

    public static function inject()
    {
        $list = self::$shortcodes;
        add_filter('smartling_inject_shortcode', function ($items) use ($list) {
            return array_merge($items, $list);
        });
    }
}