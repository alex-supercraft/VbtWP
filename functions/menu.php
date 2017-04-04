<?php
/**
 * Register menus
 */
register_nav_menus(
	array(
		'primary' => __('Primary Nav')
		));

/**
 * Make menus compatibles with .navbar from Bootstrap
 * Hace los menus compatibles con .navbar de bootstrap
 */
function vbt_change_menu_class($menu)
{  
	$menu = preg_replace('/class="menu"/','class="menu nav navbar-nav"', $menu);
	$menu = preg_replace('/class="sub-menu"/','class="sub-menu dropdown-menu"', $menu);
	$menu = preg_replace('/(menu-item-has-children)/','$1 dropdown', $menu);
	$menu = preg_replace('/<a(.*)href="#">(.*)<\/a>/','<a$1href="#" class="dropdown-toggle" data-toggle="dropdown">$2 <b class="caret"></b></a>', $menu);
    return $menu;  
} /* end change menu class */
add_filter('wp_nav_menu','vbt_change_menu_class');
?>