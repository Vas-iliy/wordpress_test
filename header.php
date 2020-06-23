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


    <div class="twelve columns row">

        <a href="<?=home_url() ?>">
            <img style="width: 50px" src="https://logotab.ru/storage/logotypes/491/krylya.jpg">
        </a>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <?wp_nav_menu([
                    'theme_location'  => 'header_menu',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id'         => '',
                    'menu_class'      => 'navbar-nav',
                    'menu_id'         => '',
                ]); ?>
        </nav>


</header> <!-- Header End -->
<body>
