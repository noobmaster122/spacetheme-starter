<?php //$args['postion'] signifies the widget number
(function($args){
	$widget_id = "banner-sidebar-{$args['position']}";
	if ( is_active_sidebar( $widget_id ) ){
		dynamic_sidebar( $widget_id );
	}
})($args);
?>