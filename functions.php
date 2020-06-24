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
	add_theme_support('post-thumbnails', ['post']); // минеатюру в post
	add_image_size('anime', 150, 150, true);
	add_theme_support('custom-logo', [
		'width' => '150',
		'height' => '40'
	]);
	add_theme_support('custom-background', [
		'default-color' => 'wight',
		'default-image' => get_template_directory_uri() . '/assets/images/background.jpg'
	]);
	add_theme_support('custom-header', [
		'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
		'width' => '2000',
		'height' => '1300'
	]);
}

add_filter( 'document_title_separator', 'filter_function_name_4326' );
function filter_function_name_4326( $sep ){
	$sep = ' | ';

	return $sep;
}

// удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	/*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

	return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// выводим пагинацию
the_posts_pagination( array(
	'end_size' => 2,
) );

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


add_action( 'customize_register', 'my_theme_customize_register' );
function my_theme_customize_register($wp_customize ) {
	// Здесь делаем что-либо с $wp_customize - объектом класса WP_Customize_Manager, например
	$wp_customize->add_setting('link_color', [
		'default' => '#007bff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'=>'postMessage'
	]);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			[
				'label' => 'Цвет ссылок',
				'section' => 'colors',
				'setting' => 'link_color'
			]
		)
	);

	/**
	 * custom section
	 */
	$wp_customize->add_section('site_data', [
		'title' => 'Информация сайта',
		'priority' => 20,
	]);
	$wp_customize->add_setting('phone', [
		'default' => '',
		'transport'=>'postMessage'
	]);
	$wp_customize->add_control(
			'phone',
			[
				'label' => 'Телефон',
				'section' => 'site_data',
				'setting' => 'text'
			]
	);

	$wp_customize->add_setting('show_phone', array(
		'default' => true,
		'transport'=> 'postMessage',
	));
	$wp_customize->add_control(
		'show_phone',
		array(
			'label' => 'Показывать телефон',
			'section' => 'site_data',
			'type' => 'checkbox',
		)
	);
}
add_action('wp_head', 'customize_css');
function customize_css ()
{
	$link_color = get_theme_mod('link_color');
	echo <<<HEREDOC
<style type="text/css">
a {color: $link_color;}
</style>
HEREDOC;

}

add_action('customize_preview_init', 'customize_js');
function customize_js(){
	wp_enqueue_script('test-customizer', get_template_directory_uri() . '/assets/js/customize.js', array( 'jquery','customize-preview' ),	'', true);
}

