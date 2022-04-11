<?php

/**
 * Template Name: Home
 *
 * @package WordPress
 * @subpackage Luckypunch
 */

include("includes/header.php");

$fields = get_field('modules');

if($fields) {
    foreach($fields as $field_key => $field_val) {
        if( file_exists( get_template_directory() . '/acf_modules/_' . $field_val['acf_fc_layout'] . '.php')) {
            include ( get_template_directory() . '/acf_modules/_' . $field_val['acf_fc_layout'] . '.php' );
        } else {
            echo get_template_directory() . '/acf_modules/_' . $field_val['acf_fc_layout'] . '.php // ';
        }
    }
}

include("includes/footer.php");

?>