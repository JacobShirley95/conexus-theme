<?php

class Semantic_UI_Menu_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        conexus_theme_check_category($item);
        $output .= sprintf( "\n<a class='%s %s item' href='%s'>%s</a>\n",
        	(in_array("current-menu-item", $item->classes) || conexus_theme_check_category($item) ? "active" : ""),
        	$item->classes[0],
            $item->url,
            $item->title
        );
    }
}

function conexus_theme_check_category($item) {
    if (is_single()) {
        //print_r($item);
        foreach (get_the_category() as $term) {
            //echo $item->ID.",";
            if ($term->cat_ID == $item->object_id) {
               // echo "Found!";
                return true;
            }
        }
    }
    return false;
}

function conexus_theme_semantic_ui_menu($theme_location) {
	$locations = get_nav_menu_locations();
	$menu = get_term($locations[$theme_location], 'nav_menu');
	$menu_items = wp_get_nav_menu_items($menu->term_id);

	$args = array("theme_location" => $theme_location, "menu_class" => "ui large secondary pointing menu tabular tabs  nav-menu", "walker" => new Semantic_UI_Menu_Walker());

	wp_nav_menu($args);
}