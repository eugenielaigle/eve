<?php
/*** Module de Menu WP **/

register_nav_menus(array(
  'footer' => 'Menu Footer'
));


/*** Fichiers CSS ***/

// Style.css
function wpdocs_main_scripts() {
    wp_register_style('main-style', get_template_directory_uri().'/style.css', array(), true);
    wp_enqueue_style('main-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_main_scripts' );

// style.min.css
function wpdocs_min_scripts() {
    wp_register_style('scss-style', get_template_directory_uri().'/assets/css/style.min.css', array());
    wp_enqueue_style('scss-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_min_scripts' );

function wpdocs_bootstrap_scripts() {
wp_register_style('bootstrap-style', get_template_directory_uri().'/assets/bootstrap-4/css/bootstrap.min.css', array(), true);
 wp_enqueue_style('bootstrap-style');
}
add_action( 'wp_enqueue_scripts', 'wpdocs_bootstrap_scripts' );


/*** Fichiers JS ***/
function theme_js(){

  wp_enqueue_script( 'jquery-mobile-customized-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array() );

  wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/bootstrap-4/js/bootstrap.min.js', array('jquery'), '20180426', true );

  wp_enqueue_script( 'basics', get_template_directory_uri() . '/assets/js/basics.js', array() );

}
add_action( 'wp_footer', 'theme_js' );

// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');

// Ajouter image à la une au thème
add_theme_support( 'post-thumbnails');

function cptui_register_my_cpts() {

  /**
   * Post Type: evenements.
   */

  $labels = array(
    "name" => __( "evenements", "" ),
    "singular_name" => __( "evenement", "" ),
    "menu_name" => __( "Évènements", "" ),
    "all_items" => __( "Tous les évènements", "" ),
    "add_new" => __( "Nouvel évènement", "" ),
    "add_new_item" => __( "Ajouter un nouvel évènement", "" ),
    "edit_item" => __( "Modifier évènement", "" ),
    "new_item" => __( "Nouvel évènement", "" ),
    "view_item" => __( "Voir l'évènement", "" ),
    "view_items" => __( "Voir les évènements", "" ),
    "search_items" => __( "Rechercher un évènement", "" ),
  );

  $args = array(
    "label" => __( "evenements", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "evenement", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
    "taxonomies" => array( "type_event" ),
  );

  register_post_type( "evenement", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );function cptui_register_my_taxes() {

  /**
   * Taxonomy: Types d'évènement.
   */

  $labels = array(
    "name" => __( "Types d'évènement", "" ),
    "singular_name" => __( "Type d'évènement", "" ),
    "menu_name" => __( "Type d'évènement", "" ),
    "all_items" => __( "Tous les types d'évènements", "" ),
    "edit_item" => __( "Modifier un type d'évènement", "" ),
    "view_item" => __( "Voir le type d'évènement", "" ),
    "update_item" => __( "Mettre à jour le type d'évènement", "" ),
    "add_new_item" => __( "Nouveau type d'évènement", "" ),
    "new_item_name" => __( "Nouveau type d'évènement", "" ),
    "search_items" => __( "rechercher un type d'évènement", "" ),
    "separate_items_with_commas" => __( "séparer les catégories par des virgules", "" ),
    "add_or_remove_items" => __( "Ajouter ou supprimer un type d'évènement", "" ),
    "choose_from_most_used" => __( "Choisir parmi les plus utilisés", "" ),
    "items_list_navigation" => __( "Menu des types d'évènement", "" ),
    "items_list" => __( "Liste des types d'évènement", "" ),
  );

  $args = array(
    "label" => __( "Types d'évènement", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => true,
    "label" => "Types d'évènement",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'type_event', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "type_event",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "type_event", array( "evenement" ), $args );

  /**
   * Taxonomy: laboratoires.
   */

  $labels = array(
    "name" => __( "laboratoires", "" ),
    "singular_name" => __( "laboratoire", "" ),
    "menu_name" => __( "Laboratoires", "" ),
    "all_items" => __( "Tous les laboratoires", "" ),
    "edit_item" => __( "Modifier un laboratoire", "" ),
    "view_item" => __( "Voir le laboratoire", "" ),
    "update_item" => __( "Mettre à jour un nouveau laboratoire", "" ),
    "add_new_item" => __( "Ajouter un laboratoire", "" ),
    "new_item_name" => __( "Nom du laboratoire", "" ),
    "search_items" => __( "Rechercher un laboratoire", "" ),
    "separate_items_with_commas" => __( "Séparer les laboratoires par des virgules", "" ),
  );

  $args = array(
    "label" => __( "laboratoires", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => true,
    "label" => "laboratoires",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'laboratoire', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "laboratoire",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "laboratoire", array( "evenement" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes' );
