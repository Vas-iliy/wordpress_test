<?php

add_action('wp_enqueue_scripts', 'my_wp_head' ); // хук автоматом сработает во время wp_head
add_action('wp_enqueue_scripts', 'my_wp_footer' ); // хук автоматом сработает во время wp_head

function my_wp_head ()
{
	wp_enqueue_style('style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'assets/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() .'assets/css/bootstrap.min.css');
}

function my_wp_footer ()
{
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap.js', get_template_directory_uri(). 'assets/js/bootstrap.js', array(), null, true);
	wp_enqueue_script('bootstrap.min.js', get_template_directory_uri(). 'assets/js/bootstrap.min.js', array(), null, true);
	wp_enqueue_script('doubletaptogo.js', get_template_directory_uri(). 'assets/js/doubletaptogo.js', array(), null, true);
	wp_enqueue_script('flexslider', get_template_directory_uri(). 'assets/js/jquery.flexslider.js', ['jquery'], null, true);
	wp_enqueue_script('init', get_template_directory_uri(). 'assets/js/init.js', array(), null, true);

}