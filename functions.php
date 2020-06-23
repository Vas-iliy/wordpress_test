<?php

add_action('wp_enqueue_scripts', 'my_wp_head' ); // хук автоматом сработает во время wp_head

add_action('wp_enqueue_scripts', 'my_wp_footer' ); // хук автоматом сработает во время wp_footer

add_action( 'after_setup_theme', function(){
	register_nav_menus( [
		'header_menu' => 'Меню в шапке',
		'footer_menu' => 'Меню в подвале'
	] );
} );

add_action('after_setup_theme', 'different');

function different ()
{
	add_theme_support('title-tag'); //выводит title страницы автоматически
	add_theme_support('post-thumbnails', array('post')); // минеатюру в post

}

add_filter( 'document_title_separator', 'filter_function_name_4326' );
function filter_function_name_4326( $sep ){
	$sep = ' | ';

	return $sep;
}

add_action( 'widgets_init', 'action_function_name_7868' );
function action_function_name_7868(){
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => "sidebar",
		'description'   => 'Описание сайдбара',
		'before_widget' => '<div class="widget %2$s">',
		'after_widget'  => "</div>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h5>\n",
	) );
}

function my_wp_head ()
{
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() .'/assets/css/bootstrap.min.css');
}

function my_wp_footer ()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap.js', get_template_directory_uri(). '/assets/js/bootstrap.js', array(), null, true);
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri(). '/assets/js/bootstrap.min.js', array(), null, true);
	wp_enqueue_script('doubletaptogo.js', get_template_directory_uri(). '/assets/js/doubletaptogo.js', array(), null, true);
	wp_enqueue_script('flexslider', get_template_directory_uri(). '/assets/js/jquery.flexslider.js', ['jquery'], null, true);
	wp_enqueue_script('init', get_template_directory_uri(). '/assets/js/init.js', array(), null, true);

}

