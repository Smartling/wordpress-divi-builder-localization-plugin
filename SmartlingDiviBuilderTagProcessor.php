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
     * Get default shortcodes value.
     */
    public static function getShortcodes()
    {
        return [
            'et_pb_section',
            'et_pb_image',
            'et_pb_gallery',
            'et_pb_tabs',
            'et_pb_tab',
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
            'et_pb_video',
            'et_pb_video_slider',
            'et_pb_video_slider_item',
            'et_pb_button',
            'et_pb_code',
            'et_pb_search',
            'et_pb_social_media_follow_network_network',
            'et_pb_social_media_follow_network',
            'et_pb_fullwidth_image',
            'et_pb_map',
            'et_pb_post_nav',
            'et_pb_comments',
            'et_pb_contact_field',
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
            'columns',
        ];
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
     * Get copied attributes patterns.
     *
     * @return array
     */
    public static function getCopiedAttributesPatterns()
    {
        return [
            "admin_label",
            "address_lat",
            "address_lng",
            "align",
            "alignment",
            "allow_player_pause",
            "always_center_on_mobile",
            "animation",
            "area",
            "author",
            "auto",
            "auto_ignore_hover",
            "auto_speed",
            "aweber_list",
            "background",
            "background_color",
            "background_layout",
            "background_position",
            "background_size",
            "bar_bg_color",
            "bg_color",
            "bg_overlay_color",
            "body_font",
            "body_font_select",
            "body_line_height",
            "body_line_height_phone",
            "body_line_height_tablet",
            "border_color",
            "border_style",
            "button_alignment",
            "button_font",
            "button_font_select",
            "button_icon_placement",
            "button_letter_spacing",
            "button_letter_spacing_hover",
            "button_link",
            "button_on_hover",
            "button_url",
            "button_use_icon",
            "captcha",
            "caption_all_caps",
            "categories",
            "center_list_items",
            "circle_border_color",
            "circle_color",
            "class",
            "color",
            "columns_number",
            "comments",
            "company_name",
            "content_source",
            "controls_color",
            "counter_color",
            "currency",
            "currency_frequency_font",
            "currency_frequency_font_select",
            "custom_button",
            "date",
            "date_format",
            "date_time",
            "datetime",
            "disabled",
            "disabled_on",
            "divider_position",
            "divider_style",
            "et_pb_post_title-title",
            "excerpt_length",
            "exclude",
            "exclude_pages",
            "exclude_posts",
            "facebook_url",
            "featured",
            "featured_image",
            "featured_placement",
            "field_type",
            "follow_button",
            "font",
            "font_icon",
            "force_fullwidth",
            "fullwidth",
            "fullwidth_field",
            "google_url",
            "header_font",
            "header_font_select",
            "height",
            "hide",
            "hide_button",
            "hide_content_on_mobile",
            "hide_cta_on_mobile",
            "hide_next",
            "hide_on_mobile",
            "hide_prev",
            "himp_list",
            "hover_overlay_color",
            "icon_color",
            "icon_placement",
            "id",
            "image_placement",
            "in_same_term",
            "include_categories",
            "inner_shadow",
            "input_border_radius",
            "link_shape",
            "linkedin",
            "linkedin_url",
            "mailchimp",
            "mailchimp_list",
            "meta",
            "meta_letter_spacing",
            "module_bg_color",
            "mouse_wheel",
            "number",
            "offset_number",
            "open",
            "orderby",
            "orientation",
            "padding",
            "parallax",
            "parallax_effect",
            "parallax_method",
            "per",
            "percent",
            "percent_sign",
            "phone",
            "position",
            "posts_number",
            "price_font",
            "price_font_select",
            "provider",
            "quote_icon",
            "remove_border",
            "remove_featured_drop_shadow",
            "remove_inner_shadow",
            "required_mark",
            "show_arrows",
            "show_author",
            "show_avatar",
            "show_bullet",
            "show_categories",
            "show_comments",
            "show_content",
            "show_count",
            "show_date",
            "show_divider",
            "show_image",
            "show_image_overlay",
            "show_image_video_mobile",
            "show_in_lightbox",
            "show_meta",
            "show_more",
            "show_more_button",
            "show_pagination",
            "show_reply",
            "show_thumbnail",
            "show_thumbnails",
            "show_title",
            "show_title_and_caption",
            "skip_module",
            "skype",
            "skype_action",
            "social_network",
            "speciality",
            "speciality_placeholder",
            "specialty",
            "src",
            "sticky",
            "subheader_font",
            "subheader_font_select",
            "sum",
            "tab_font",
            "tab_font_select",
            "tab_line_height",
            "tab_line_height_phone",
            "tab_line_height_tablet",
            "tablet",
            "template_type",
            "text_background",
            "text_bg_color",
            "text_border_radius",
            "text_color",
            "text_orientation",
            "text_overlay_color",
            "title_all_caps",
            "twitter",
            "twitter_url",
            "type",
            "url",
            "url_new_window",
            "use_background_color",
            "use_bg_overlay",
            "use_border_color",
            "use_circle",
            "use_circle_border",
            "use_dropshadow",
            "use_focus_border_color",
            "use_grayscale_filter",
            "use_icon",
            "use_icon_font_size",
            "use_manual_excerpt",
            "use_overlay",
            "use_percentages",
            "use_redirect",
            "use_text_overlay",
            "video_bg_width",
            "video_url",
            "width",
            "et_pb_post_title-title",
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
            ],
        ];
    }
}