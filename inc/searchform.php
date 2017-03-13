<?php
if (!function_exists('vbt_search_form')) :
	/**
	 * Search form filter
	 * Filtro del formulario de búsqueda
	 */
	function vbt_search_form( $form ) {
	    $form = '
	    	<form class="navbar-form" role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
				<div class="input-group">
					<input id="s" class="form-control input-lg" name="s" type="text" placeholder="' . __('Buscar', 'gb') . '" value="' . get_search_query() . '">
					 <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
				</div>
			</form>
	    ';
	
	    return $form;
	}
endif;
add_filter( 'get_search_form', 'vbt_search_form' );
?>