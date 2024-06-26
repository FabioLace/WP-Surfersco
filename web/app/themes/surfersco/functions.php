<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

if (! function_exists('\Roots\bootloader')) {
    wp_die(
        __('You need to install Acorn to use this theme.', 'sage'),
        '',
        [
            'link_url' => 'https://roots.io/acorn/docs/installation/',
            'link_text' => __('Acorn Docs: Installation', 'sage'),
        ]
    );
}

\Roots\bootloader()->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/*
|--------------------------------------------------------------------------
| Register Navigation Menus
|--------------------------------------------------------------------------
|
| Register Header and Footer menus
|
*/

register_nav_menu('header','Header');
register_nav_menu('footer','Footer');

/*
|--------------------------------------------------------------------------
| Remove Gutenberg
|--------------------------------------------------------------------------
|
| I don't use Gutenberg because it has some limitation while using plugins
| like Advanced Custom Fields. More control is better than less control.
|
*/

add_filter( 'use_block_editor_for_post', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
}, 20 );

/*
|-------------------------------------------------------------------------
| Remove WYSIWYG editor
|--------------------------------------------------------------------------
| 
| I don't need the WYSIWYG everywhere
|
*/

function remove_pages_editor(){
    $front_page_id = get_option('page_on_front');
    $current_page_id = get_the_ID();

    if($current_page_id == $front_page_id) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'add_meta_boxes', 'remove_pages_editor' );

/*
|--------------------------------------------------------------------------
| Mute JQuery migrator
|--------------------------------------------------------------------------
| 
| Mutes jQuery migrator console log
|
*/

function mute_jquery_migrator() {   
    echo '<script>jQuery.migrateMute = true;</script>';
}
add_action( 'wp_head', 'mute_jquery_migrator' );
add_action( 'admin_head', 'mute_jquery_migrator' );

/*
|--------------------------------------------------------------------------
| ACF save and load points
|--------------------------------------------------------------------------
|
| As the title says
|
*/

function my_acf_json_save_point( $path ) {
    $path = get_stylesheet_directory() . '/resources/acf-json';
    return $path;
}
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\my_acf_json_save_point');

function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/resources/acf-json';
    return $paths;
}
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\my_acf_json_load_point');

/*
|--------------------------------------------------------------------------
| Customize Login Page
|--------------------------------------------------------------------------
|
| As the title says, it customizes the default WP login page
|
*/

add_filter( 'login_headerurl', function(){
    return home_url();
});

add_filter( 'login_headertext', function(){
    return 'Surfers Co.';
});

add_action( 'login_enqueue_scripts', function(){
    $pathToBackgroundImage = get_template_directory_uri() . '/resources/images/wave.jpg';
    echo '
    <style type="text/css">
        .login{
            background-image: url("'. $pathToBackgroundImage . '");
            background-color: #ffff;
            background-repeat: no-repeat;
            font-family: \'Montserrat\', sans-serif!important;
        }
        body{ background: #ffff; }
        #login h1 a, .login h1 a{
            display: contents;
            color: black;
            background: none;
            font-size: 32px;
            font-weight: 700;
        }
        .login #nav a, .login #backtoblog a{ color: black!important; }
    </style>';
});

//FAVICONS
/* add_action('wp_head',function(){
    $faviconDirectory = get_template_directory_uri() . 'resources/images/favicon';
    echo "<link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"".$faviconDirectory."/favicon-32x32.png\">";
    echo "<link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"".$faviconDirectory."/favicon-16x16.png\">";
    echo "<link rel=\"manifest\" href=\"".$faviconDirectory."/site.webmanifest\">";
    echo "<link rel=\"mask-icon\" href=\"".$faviconDirectory."/safari-pinned-tab.svg\" color=\"#9d9d9c\">";
    echo "<meta name=\"msapplication-TileColor\" content=\"#9d9d9c\">";
    echo "<meta name=\"theme-color\" content=\"#ffffff\">";
}); */



