<!doctype html>
<html lang="ru">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <? wp_head(); ?>

	<title>Hello, world!</title>
</head>

<header>
    <?if(is_front_page()):?>
        <div class="header-image" style="background: url(<? header_image(); ?>) center no-repeat; background-size: cover; height: 50vh;"></div>
    <?endif;?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <?if(has_custom_logo()): the_custom_logo();?>
        <?else:?>
            <a href="<?=home_url() ?>">
		        <? bloginfo('name'); ?>
            </a>
        <?endif;?>
        <div class="collapse navbar-collapse">
            <?wp_nav_menu([
                    'theme_location'  => 'header_menu',
                    'container' => '',
                    'menu_class'      => 'navbar-nav',
                    'menu_id'         => '',
            ]); ?>
            <p class="phone" <?if(get_theme_mod('show_phone') === false) echo ' style="display: none;"'?>>
                Телефон: <span><?=get_theme_mod('phone');?></span>
            </p>
        </div>
    </nav>


</header> <!-- Header End -->
<body <? body_class(); ?>>
