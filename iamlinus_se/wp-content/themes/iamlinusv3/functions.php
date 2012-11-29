<?php if ( function_exists('register_sidebar') ) 
{
	register_sidebar(array(
			'name' => __( 'Andra raden startsida', 'html5blank'),
			'description' => __( 'Detta är raden med widgets i sidfoten. Ska innehålla 3 widgets.', 'html5blank' ),
			'id' => 'startpage',
			'before_widget' => '<div class="fourcol"><div id="%1$s" class="widget">',
			'after_widget' => '</div></div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
			));

	register_sidebar(array(
			'name' => __( 'Sidfot Post', 'html5blank'),
			'description' => __( 'Detta är raden med widgets i sidfoten. Ska innehålla 2 widgets.', 'html5blank' ),
			'id' => 'footerpost',
			'before_widget' => '<div class="fourcol"><div id="%1$s" class="widget">',
			'after_widget' => '</div></div>',
			'before_title' => '',
			'after_title' => ' ',
		));
} ?>