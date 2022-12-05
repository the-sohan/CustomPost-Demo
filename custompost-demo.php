<?php
/*
Plugin Name: Custom Post Demo
Plugin URI: 
Description: Demo of Plugin Custom Post
Version: 1.0
Author: Sohan
Author URI: https://sohan.co
License: GPLv2 or later
Text Domain: cpt-demo
Domain Path: /languages/
*/

function cptdemo_register_cpt_recipe() {
    $labels = array(
        "name"  => __( "Recipes", "cpt-demo" ),
        "singular_name"  => __( "Recipe", "cpt-demo" ),
        "all_items"  => __( "My Recipe", "cpt-demo" ),
        "add_new"  => __( "New Recipe", "cpt-demo" ),
    );

    $args = array(
        "label" =>  __( "Recipes", "cpt-demo" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_is_rest" => true,
        "rest_base" => "",
        "has_archive" => "recipes",
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "query_var" => false,
        "menu_position" => 6,
        "menu_icon" => "dashicon-book-alt",
        "supports" => array( "title", "editor", "thumbnail", "excerpt" ),
        "taxonomies" => array( "category" )
    );
    
    register_post_type( "recipe", $args );
}
add_action( 'init', 'cptdemo_register_cpt_recipe' );

function cptdemo_recipe_template( $file ) {
    global $post;
    if ( "recipe" == $post->post_type ) {
        $file_path = plugin_dir_path(__FILE__)."cpt-templates/single-recipe.php";
        $file = $file_path;
    }
    return $file;
}
add_filter( 'single_template', 'cptdemo_recipe_template' );