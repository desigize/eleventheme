<?php

// Theme Support

add_action( 'after_setup_theme', 'eleven_setup' );

function eleven_setup()
{

load_theme_textdomain( 'eleven', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form', 'navigation-widgets' ) );
add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'eleven' ) ) );
require 'inc/woocommerce-functions.php';
require 'inc/acf-functions.php';
require 'inc/theme-options.php';

}


// Register Style.css 

add_action( 'wp_enqueue_scripts', 'eleven_enqueue' );

function eleven_enqueue()
{
wp_enqueue_style( 'eleven-style', get_stylesheet_uri() );
wp_enqueue_script( 'jquery' );
}


add_action( 'wp_footer', 'eleven_footer' );
function eleven_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
$("html").addClass("mobile");
}
if (deviceAgent.match(/(Android)/)) {
$("html").addClass("android");
$("html").addClass("mobile");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'eleven_document_title_separator' );
function eleven_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'eleven_title' );
function eleven_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
function eleven_schema_type() {
$schema = 'https://schema.org/';
if ( is_single() ) {
$type = "Article";
} elseif ( is_author() ) {
$type = 'ProfilePage';
} elseif ( is_search() ) {
$type = 'SearchResultsPage';
} else {
$type = 'WebPage';
}
echo 'itemscope itemtype="' . $schema . $type . '"';
}
add_filter( 'nav_menu_link_attributes', 'eleven_schema_url', 10 );
function eleven_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'eleven_wp_body_open' ) ) {
function eleven_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'eleven_skip_link', 5 );
function eleven_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'eleven' ) . '</a>';
}
add_filter( 'the_content_more_link', 'eleven_read_more_link' );
function eleven_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'eleven' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'eleven_excerpt_read_more_link' );
function eleven_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'eleven' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'eleven_image_insert_override' );
function eleven_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'eleven_widgets_init' );
function eleven_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'eleven' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'eleven_pingback_header' );
function eleven_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'eleven_enqueue_comment_reply_script' );
function eleven_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function v_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'eleven_comment_count', 0 );
function eleven_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}


function eleven_woo_scripts() {
    wp_register_script('woo-eleven-scripts', get_template_directory_uri() . '/inc/woocommerce/woocommerce-scripts.js', array('jquery'),'1.1', true);
    wp_enqueue_script('woo-eleven-scripts');
} 

 add_action( 'wp_enqueue_scripts', 'eleven_woo_scripts', 99999 );