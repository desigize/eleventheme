<?php

add_action( 'wp_enqueue_scripts', 'theme_colors_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function theme_colors_root() {

    $primary_color = get_field( 'primary_color', 'option' );
    $secondary_color = get_field( 'secondary_color', 'option' );
	$tertiary_color = get_field( 'tertiary_color', 'option' );
	$accent_color = get_field( 'accent_color', 'option' );
    $gray_color = get_field( 'gray_color', 'option' );
    $border_color = get_field( 'border_color', 'option' );
	$alt_border_color = get_field( 'alt_border_color', 'option' );
	$dark_color = get_field( 'dark_color', 'option' );
	$light_color = get_field( 'light_color', 'option' );
	$text_color = get_field( 'text_color', 'option' );
	$heading_color = get_field( 'heading_color', 'option' );
	$error_color = get_field( 'error_color', 'option' );
	$error_light_color = get_field( 'error_light_color', 'option' );
	$success_color = get_field( 'success_color', 'option' );
	$success_light_color = get_field( 'success_light_color', 'option' );
	$warning_color = get_field( 'warning_color', 'option' );
	$warning_light_color = get_field( 'warning_light_color', 'option' );
	$black_color = get_field( 'black_color', 'option' );
	$white_color = get_field( 'white_color', 'option' );
	$site_bg_color = get_field( 'site_bg_color', 'option' );
	$placeholder_color = get_field( 'placeholder_color', 'option' );
	$alt_placeholder_color = get_field( 'alt_placeholder_color', 'option' );
	$transparent_color = get_field( 'transparent_color', 'option' );
	$extra_color_1 = get_field( 'extra_color_1', 'option' );
	$extra_color_2 = get_field( 'extra_color_2', 'option' );
	
    $theme_colors_root = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
			--tertiary-color: {$tertiary_color};
			--accent-color: {$accent_color};
            --gray-color: {$gray_color};
			--border-color: {$border_color};
			--alt-border-color: {$alt_border_color};
            --dark-color: {$dark_color};
			--light-color: {$light_color};
			--text-color: {$text_color};
			--heading-color: {$heading_color};
			--error-color: {$error_color};
			--light-error-color: {$error_light_color};
			--success-color: {$success_color};
			--light-success-color: {$light_success_color};
			--warning-color: {$warning_color};
			--light-warning-color: {$warning_light_color};
			--black-color: {$black_color};
			--white-color: {$white_color};
			--site-bg-color: {$site_bg_color};
			--placeholder-color: {$placeholder_color};
			--alt-placeholder-color: {$alt_placeholder_color};
			--transparent-color: {$transparent_color};
			--extra-color-1: {$extra_color_1};
			--extra-color-2: {$extra_color_2};
        }";

    wp_add_inline_style( 'eleven-style', $theme_colors_root );

}

add_action( 'wp_enqueue_scripts', 'global_settings_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function global_settings_root() {

    $site_width = get_field( 'site_width', 'option' );
	$section_padding_x = get_field( 'section_padding_x', 'option' );
	$section_padding_y = get_field( 'section_padding_y', 'option' );
	
	$global_radius = get_field( 'global_radius', 'option' );
	$global_transition_duration = get_field( 'global_transition_duration', 'option' );
	$global_img_radius = get_field( 'global_img_radius', 'option' );
	$global_col_gap = get_field( 'global_col_gap', 'option' );
	
    $global_settings_root = "
        :root {
			--site-width: {$site_width}px;
			--section-padding-x: {$section_padding_x};
			--section-padding-y: {$section_padding_y};
			
			--global-radius: {$global_radius}px;
			--global-transition-duration: {$global_transition_duration}ms;
			--global-img-radius: {$global_img_radius}px;
			--global-col-gap: {$global_col_gap} 0px;
        }";

    wp_add_inline_style( 'eleven-style', $global_settings_root );

}


add_action( 'wp_enqueue_scripts', 'heading_body_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function heading_body_root() {
	
	$heading_font_family = get_field( 'heading_font_family', 'option' );
	$body_font_family = get_field( 'body_font_family', 'option' );

    $h1_font_size = get_field( 'h1_font_size', 'option' );
	$h1_font_weight = get_field( 'h1_font_weight', 'option' );
	$h1_line_height = get_field( 'h1_line_height', 'option' );
	$h1_color = get_field( 'h1_color', 'option' );
	$h1_text_transform = get_field( 'h1_text_transform', 'option' );
	$h1_letter_spacing = get_field( 'h1_letter_spacing', 'option' );
	$h1_style = get_field( 'h1_style', 'option' );
	
	$h2_font_size = get_field( 'h2_font_size', 'option' );
	$h2_font_weight = get_field( 'h2_font_weight', 'option' );
	$h2_line_height = get_field( 'h2_line_height', 'option' );
	$h2_color = get_field( 'h2_color', 'option' );
	$h2_text_transform = get_field( 'h2_text_transform', 'option' );
	$h2_letter_spacing = get_field( 'h2_letter_spacing', 'option' );
	$h2_style = get_field( 'h2_style', 'option' );
	
	$h3_font_size = get_field( 'h3_font_size', 'option' );
	$h3_font_weight = get_field( 'h3_font_weight', 'option' );
	$h3_line_height = get_field( 'h3_line_height', 'option' );
	$h3_color = get_field( 'h3_color', 'option' );
	$h3_text_transform = get_field( 'h3_text_transform', 'option' );
	$h3_letter_spacing = get_field( 'h3_letter_spacing', 'option' );
	$h3_style = get_field( 'h3_style', 'option' );
	
	$h4_font_size = get_field( 'h4_font_size', 'option' );
	$h4_font_weight = get_field( 'h4_font_weight', 'option' );
	$h4_line_height = get_field( 'h4_line_height', 'option' );
	$h4_color = get_field( 'h4_color', 'option' );
	$h4_text_transform = get_field( 'h4_text_transform', 'option' );
	$h4_letter_spacing = get_field( 'h4_letter_spacing', 'option' );
	$h4_style = get_field( 'h4_style', 'option' );
	
	$h5_font_size = get_field( 'h5_font_size', 'option' );
	$h5_font_weight = get_field( 'h5_font_weight', 'option' );
	$h5_line_height = get_field( 'h5_line_height', 'option' );
	$h5_color = get_field( 'h5_color', 'option' );
	$h5_text_transform = get_field( 'h5_text_transform', 'option' );
	$h5_letter_spacing = get_field( 'h5_letter_spacing', 'option' );
	$h5_style = get_field( 'h5_style', 'option' );
	
	$h6_font_size = get_field( 'h6_font_size', 'option' );
	$h6_font_weight = get_field( 'h6_font_weight', 'option' );
	$h6_line_height = get_field( 'h6_line_height', 'option' );
	$h6_color = get_field( 'h6_color', 'option' );
	$h6_text_transform = get_field( 'h6_text_transform', 'option' );
	$h6_letter_spacing = get_field( 'h6_letter_spacing', 'option' );
	$h6_style = get_field( 'h6_style', 'option' );
	
	$body_font_size = get_field( 'body_font_size', 'option' );
	$body_font_weight = get_field( 'body_font_weight', 'option' );
	$body_line_height = get_field( 'body_line_height', 'option' );
	$body_color = get_field( 'body_color', 'option' );
	$body_text_transform = get_field( 'body_text_transform', 'option' );
	$body_letter_spacing = get_field( 'body_letter_spacing', 'option' );
	$body_style = get_field( 'body_style', 'option' );
	
    $heading_body_root = "
        :root {
            --h1-font-size: {$h1_font_size};
			--h1-font-weight: {$h1_font_weight};
			--h1-line-height: {$h1_line_height};
			--h1-color: {$h1_color};
			--h1-text-transform: {$h1_text_transform};
			--h1-letter-spacing: {$h1_letter_spacing}px;
			--h1-style: {$h1_style};
			
			--h2-font-size: {$h2_font_size};
			--h2-font-weight: {$h2_font_weight};
			--h2-line-height: {$h2_line_height};
			--h2-color: {$h2_color};
			--h2-text-transform: {$h2_text_transform};
			--h2-letter-spacing: {$h2_letter_spacing}px;
			--h2-style: {$h2_style};
			
			--h3-font-size: {$h3_font_size};
			--h3-font-weight: {$h3_font_weight};
			--h3-line-height: {$h3_line_height};
			--h3-color: {$h3_color};
			--h3-text-transform: {$h3_text_transform};
			--h3-letter-spacing: {$h3_letter_spacing}px;
			--h3-style: {$h3_style};
			
			--h4-font-size: {$h4_font_size};
			--h4-font-weight: {$h4_font_weight};
			--h4-line-height: {$h4_line_height};
			--h4-color: {$h4_color};
			--h4-text-transform: {$h4_text_transform};
			--h4-letter-spacing: {$h4_letter_spacing}px;
			--h4-style: {$h4_style};
			
			--h5-font-size: {$h5_font_size};
			--h5-font-weight: {$h5_font_weight};
			--h5-line-height: {$h5_line_height};
			--h5-color: {$h5_color};
			--h5-text-transform: {$h5_text_transform};
			--h5-letter-spacing: {$h5_letter_spacing}px;
			--h5-style: {$h5_style};
			
			--h6-font-size: {$h6_font_size};
			--h6-font-weight: {$h6_font_weight};
			--h6-line-height: {$h6_line_height};
			--h6-color: {$h6_color};
			--h6-text-transform: {$h6_text_transform};
			--h6-letter-spacing: {$h6_letter_spacing}px;
			--h6-style: {$h6_style};
			
			--body-font-size: {$body_font_size};
			--body-font-weight: {$body_font_weight};
			--body-line-height: {$body_line_height};
			--body-color: {$body_color};
			--body-text-transform: {$body_text_transform};
			--body-letter-spacing: {$body_letter_spacing}px;
			--body-style: {$body_style};
			
			--heading-font-family: '{$heading_font_family}',sans-serif;
			--body-font-family: '{$body_font_family}',sans-serif;

        }";

    wp_add_inline_style( 'eleven-style', $heading_body_root );

}

add_action( 'wp_enqueue_scripts', 'button_and_links_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function button_and_links_root() {

    $btn_bg_color = get_field( 'btn_bg_color', 'option' );
	$hvr_btn_bg_color = get_field( 'hvr_btn_bg_color', 'option' );
	$btn_color = get_field( 'btn_color', 'option' );
	$hvr_btn_color = get_field( 'hvr_btn_color', 'option' );
	$btn_radius = get_field( 'btn_radius', 'option' );
	$btn_border_size = get_field( 'btn_border_size', 'option' );
	$btn_pad_x = get_field( 'btn_pad_x', 'option' );
	$btn_pad_y = get_field( 'btn_pad_y', 'option' );
	$btn_font_size = get_field( 'btn_font_size', 'option' );
	$btn_font_weight = get_field( 'btn_font_weight', 'option' );
	$btn_border_color = get_field( 'btn_border_color', 'option' );
	$hvr_btn_border_color = get_field( 'hvr_btn_border_color', 'option' );
	$btn_text_transform = get_field( 'btn_text_transform', 'option' );
	$btn_transition_duration = get_field( 'btn_transition_duration', 'option' );
	
	$link_color = get_field( 'link_color', 'option' );
	$hvr_link_color = get_field( 'hvr_link_color', 'option' );
	$link_font_size = get_field( 'link_font_size', 'option' );
	$link_font_weight = get_field( 'link_font_weight', 'option' );
	$link_text_decoration = get_field( 'link_text_decoration', 'option' );
	$hvr_link_text_decoration = get_field( 'hvr_link_text_decoration', 'option' );
	
    $button_and_links_root = "
        :root {
            --btn-bg-color: {$btn_bg_color};
			--hvr-btn-bg-color: {$hvr_btn_bg_color};
			--btn-color: {$btn_color};
			--hvr-btn-color: {$hvr_btn_color};
			--btn-radius: {$btn_radius}px;
			--btn-border-size: {$btn_border_size}px;
			--btn-pad-x: {$btn_pad_x};
			--btn-pad-y: {$btn_pad_y};
			--btn-font-size: {$btn_font_size};
			--btn-font-weight: {$btn_font_weight};
			--btn-border-color: {$btn_border_color};
			--hvr-btn-border-color: {$hvr_btn_border_color};
			--btn-text-transform: {$btn_text_transform};
			--btn-transition-duration: {$btn_transition_duration}ms;
			
			--link-color: {$link_color};
			--hvr-link-color: {$hvr_link_color};
			--link-font-size: {$link_font_size};
			--link-font-weight: {$link_font_weight};
			--link-text-decoration: {$link_text_decoration};
			--hvr-link-text-decoration: {$hvr_link_text_decoration};
			
        }";

    wp_add_inline_style( 'eleven-style', $button_and_links_root );

}

add_action( 'wp_enqueue_scripts', 'woocommerce_settings_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function woocommerce_settings_root() {

    $woo_primary_btn_bg_color = get_field( 'woo_primary_btn_bg_color', 'option' );
	$woo_hvr_primary_btn_bg_color = get_field( 'woo_hvr_primary_btn_bg_color', 'option' );
	$woo_primary_btn_color = get_field( 'woo_primary_btn_color', 'option' );
	$woo_hvr_primary_btn_color = get_field( 'woo_hvr_primary_btn_color', 'option' );
	$woo_primary_btn_border_color = get_field( 'woo_primary_btn_border_color', 'option' );
	$woo_hvr_primary_btn_border_color = get_field( 'woo_hvr_primary_btn_border_color', 'option' );
	
    $woo_secondary_btn_bg_color = get_field( 'woo_secondary_btn_bg_color', 'option' );
	$woo_hvr_secondary_btn_bg_color = get_field( 'woo_hvr_secondary_btn_bg_color', 'option' );
	$woo_secondary_btn_color = get_field( 'woo_secondary_btn_color', 'option' );
	$woo_hvr_secondary_btn_color = get_field( 'woo_hvr_secondary_btn_color', 'option' );
	$woo_secondary_btn_border_color = get_field( 'woo_secondary_btn_border_color', 'option' );
	$woo_hvr_secondary_btn_border_color = get_field( 'woo_hvr_secondary_btn_border_color', 'option' );
	
	$woo_tertiary_btn_bg_color = get_field( 'woo_tertiary_btn_bg_color', 'option' );
	$woo_hvr_tertiary_btn_bg_color = get_field( 'woo_hvr_tertiary_btn_bg_color', 'option' );
	$woo_tertiary_btn_color = get_field( 'woo_tertiary_btn_color', 'option' );
	$woo_hvr_tertiary_btn_color = get_field( 'woo_hvr_tertiary_btn_color', 'option' );
	$woo_tertiary_btn_border_color = get_field( 'woo_tertiary_btn_border_color', 'option' );
	$woo_hvr_tertiary_btn_border_color = get_field( 'woo_hvr_tertiary_btn_border_color', 'option' );
	
    $woocommerce_settings_root = "
        :root {
            --woo-primary-btn-bg-color: {$woo_primary_btn_bg_color};
			--woo-hvr-primary-btn-bg-color: {$woo_hvr_primary_btn_bg_color};
			--woo-primary-btn-color: {$woo_primary_btn_color};
			--woo-hvr-primary-btn-color: {$woo_hvr_primary_btn_color};
			--woo-primary-btn-border-color: {$woo_primary_btn_border_color};
			--woo-hvr-primary-btn-border-color: {$woo_hvr_primary_btn_border_color};
			
            --woo-secondary-btn-bg-color: {$woo_secondary_btn_bg_color};
			--woo-hvr-secondary-btn-bg-color: {$woo_hvr_secondary_btn_bg_color};
			--woo-secondary-btn-color: {$woo_secondary_btn_color};
			--woo-hvr-secondary-btn-color: {$woo_hvr_secondary_btn_color};
			--woo-secondary-btn-border-color: {$woo_secondary_btn_border_color};
			--woo-hvr-secondary-btn-border-color: {$woo_hvr_secondary_btn_border_color};
			
			--woo-tertiary-btn-bg-color: {$woo_tertiary_btn_bg_color};
			--woo-hvr-tertiary-btn-bg-color: {$woo_hvr_tertiary_btn_bg_color};
			--woo-tertiary-btn-color: {$woo_tertiary_btn_color};
			--woo-hvr-tertiary-btn-color: {$woo_hvr_tertiary_btn_color};
			--woo-tertiary-btn-border-color: {$woo_tertiary_btn_border_color};
			--woo-hvr-tertiary-btn-border-color: {$woo_hvr_tertiary_btn_border_color};
			
        }";

    wp_add_inline_style( 'eleven-style', $woocommerce_settings_root );

}

add_action( 'wp_enqueue_scripts', 'fields_settings_root' );
/**
 * Set custom CSS variables using values from ACF options page.
 */
function fields_settings_root() {

    $input_padding_y = get_field( 'input_padding_y', 'option' );
	$input_padding_x = get_field( 'input_padding_x', 'option' );
	$input_font_size = get_field( 'input_font_size', 'option' );
	$input_border_size = get_field( 'input_border_size', 'option' );
	$input_border_radius = get_field( 'input_border_radius', 'option' );
	$input_border_style = get_field( 'input_border_style', 'option' );
	$input_border_color = get_field( 'input_border_color', 'option' );
	$input_bg_color = get_field( 'input_bg_color', 'option' );
	$hvr_input_border_color = get_field( 'hvr_input_border_color', 'option' );
	$hvr_input_bg_color = get_field( 'hvr_input_bg_color', 'option' );
	$focus_input_border_color = get_field( 'focus_input_border_color', 'option' );
	$focus_input_bg_color = get_field( 'focus_input_bg_color', 'option' );
	$focus_input_color = get_field( 'focus_input_color', 'option' );
	
	$label_font_size = get_field( 'label_font_size', 'option' );
	$label_color = get_field( 'label_color', 'option' );
	$label_text_transform = get_field( 'label_text_transform', 'option' );
	$label_letter_spacing = get_field( 'label_letter_spacing', 'option' );
	$label_font_weight = get_field( 'label_font_weight', 'option' );

	
    $fields_settings_root = "
        :root {
            --input-padding-y: {$input_padding_y};
			--input-padding-x: {$input_padding_x};
			--input-font-size: {$input_font_size};
			--input-border-size: {$input_border_size};
			--input-border-radius: {$input_border_radius};
			--input-border-style: {$input_border_style};
			--input-border-color: {$input_border_color};
			--input-bg-color: {$input_bg_color};
			--hvr-input-border-color: {$hvr_input_border_color};
			--hvr-input-bg-color: {$hvr_input_bg_color};
			--focus-input-border-color: {$focus_input_border_color};
			--focus-input-bg-color: {$focus_input_bg_color};
			--focus-input-color: {$focus_input_color};
			
			--label-font-size: {$label_font_size};
			--label-color: {$label_color};
			--label-text-transform: {$label_text_transform};
			--label-letter-spacing: {$label_letter_spacing}px;
			--label-font-weight: {$label_font_weight};
			
        }";

    wp_add_inline_style( 'eleven-style', $fields_settings_root );

}

function checkACFData( $key, $value, $option='') {
    if( $option == 'option' || $option == 'options' ) {
        $current_value = get_field( $key, $option );
    } else {
        $current_value = get_field( $key );
    }

    return $value === $current_value;
}