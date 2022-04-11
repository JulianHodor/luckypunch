<?php

function my_theme_enqueue_scripts()
{
  wp_enqueue_style('style', get_template_directory_uri() . '/css/main.css', array(), date("U", filemtime(get_template_directory() . '/css/main.css')), false);
  wp_enqueue_script('script', get_template_directory_uri() . '/js/main-min.js', array(), date("U", filemtime(get_template_directory() . '/js/main-min.js')), true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts', 99);


// ENABLE POST THUMBNAILS
add_theme_support('post-thumbnails');


// OPTIONS PAGE

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Settings',
    'menu_title'  => 'Lucky Punch',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

}


// ENABLE MENUS
add_theme_support('menus');
add_action('after_setup_theme', 'register_my_menu');
function register_my_menu()
{
  register_nav_menu('primary', __('Primary Menu', 'luckypunch'));
  register_nav_menu('secondary', __('Footer Menu', 'luckypunch'));
  register_nav_menu('legal', __('Legal Menu', 'luckypunch'));
}


// INSTAGRAM

function get_insta_cache() {
  $insta_cache = get_field('instagram-cache', 'option');
  return $insta_cache;
}

?>