<?php

namespace SmartlingDiviBuilder;

use SmartlingDiviBuilder\Extension\ShortcodeInjector;

/**
 * Class SmartlingDiviBuilderTagProcessor
 * @package SmartlingAdrotate
 */
class SmartlingDiviBuilderTagProcessor
{
    /**
     * Register divi-builder shortcodes.
     */
    public static function registerShortcodes()
    {
        ShortcodeInjector::addShortcodes(static::getShortcodes());
        ShortcodeInjector::inject();
    }
    
    /**
     * Register divi-builder filters for shortcodes.
     */
    public static function registerFilters()
    {
        $filters = [];
        
        // Copied attributes.
        foreach (static::getCopiedAttributesPatterns() as $pattern) {
            $filters[] = [
                'pattern' => '^'.$pattern.'$',
                'action'  => 'copy',
            ];
        }
        
        // Localized.
        $filters = array_merge($filters, static::getLocalizedFilters());
        
        add_filter(
            'smartling_register_field_filter',
            function (array $definitions) use ($filters) {
                return array_merge($definitions, $filters);
            }
        );
    }
    
    /**
     * Get default shortcodes value.
     */
    private static function getShortcodes()
    {
        return [
            'et_pb_section',
            'et_pb_image',
            'et_pb_gallery',
            'et_pb_tabs',
            'et_pb_slider',
            'et_pb_testimonial',
            'et_pb_pricing_tables',
            'et_pb_fullwidth_post_title',
            'et_pb_fullwidth_header',
            'et_pb_post_title',
            'et_pb_cta',
            'et_pb_blurb',
            'et_pb_text',
            'et_pb_slide',
            'et_pb_pricing_table',
            'et_pb_audio',
            'et_pb_signup',
            'et_pb_login',
            'et_pb_portfolio',
            'et_pb_filterable_portfolio',
            'et_pb_counters',
            'et_pb_counter',
            'et_pb_circle_counter',
            'et_pb_number_counter',
            'et_pb_accordion',
            'et_pb_accordion_item',
            'et_pb_toggle',
            'et_pb_contact_form',
            'et_pb_sidebar',
            'et_pb_divider',
            'et_pb_team_member',
            'et_pb_shop',
            'et_pb_countdown_timer',
            'et_pb_social_media_follow',
            'et_pb_fullwidth_slider',
            'et_pb_blog',
            'et_pb_row',
            'et_pb_row_inner',
            'et_pb_row_column',
            'et_pb_text',
            'et_pb_column',
            'et_pb_column_inner',
            'et_pb_fullwidth_post_slider',
            'et_pb_post_slider',
            'body_font_select',
            'caption',
            'columns'
        ];
    }
    
    /**
     * Get copied attributes patterns.
     *
     * @return array
     */
    private static function getCopiedAttributesPatterns()
    {
        return [
            'animation',
            'tab_line_height_tablet',
            'admin_label',
            'sticky',
            'padding',
            'align',
            'alignment',
            'color',
            '_color',
            '_style',
            '_size',
            '_radius',
            '_hover',
            '_border_color',
            '_letter_spacing',
            '_padding',
            '_width',
            '_height',
            'width',
            'height',
            '_icon_size',
            '_position',
            'alignment',
            '_layout',
            'orientation',
            'template_type',
            'fullwidth',
            'speciality',
            'speciality_placeholder',
            'skip_module',
            'inner_shadow',
            'show_arrows',
            'show_pagination',
            'auto',
            'parallax',
            'type',
            'url_new_window',
            'use_icon',
            'use_circle',
            '_border',
            '_placement',
            '_url',
            'show_in_lightbox',
            'provider',
            'himp_list',
            'aweber_list',
            '_icon',
            'link_shape',
            '_button',
            '_overlay',
            'disabled',
            '_percentages',
            'percent',
            'show_',
            '_dropshadow',
            'offset_number',
            'custom_button',
            'number',
            'use_redirect',
            'field_type',
            'required_mark',
            'date_time',
            '_mobile',
            'mailchimp',
            'caption_all_caps',
            'in_same_term',
            'hide',
            'posts_number',
            'orderby',
            'content_source',
            'use_manual_excerpt',
            'excerpt_length',
            'show_meta',
            'meta_letter_spacing',
            // todo: what if we have text in title
            'title',
            'meta',
            'author',
            'date',
            'categories',
            'comments',
            'featured',
            'background',
            'title_all_caps',
            'center_list_items',
            'currency',
            'per',
            'sum',
            'font',
            'class',
            'exclude',
            'area',
            'allow_player_pause',
            'link_shape',
            'follow_button',
            'social_network',
            'skype',
            'twitter',
            'linkedin',
            'tablet',
            'phone',
            'company_name',
            'open',
            'specialty'
        ];
    }
    
    /**
     * Get attribute's patterns that should be localized.
     *
     * @return array
     */
    private static function getLocalizedFilters()
    {
        return [
            [
                'pattern'       => '^include_categories$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'category',
            ],
            [
                'pattern'       => '^gallery_ids$',
                'action'        => 'localize',
                'serialization' => 'coma-separated',
                'value'         => 'reference',
                'type'          => 'media',
            ]
        ];
    }
}