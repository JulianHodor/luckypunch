<!DOCTYPE html>
<html lang="de" dir="ltr">

<head>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta charset="utf-8">
</head>

<body>

    <header class="w-100 sticky top-0 z-max">
        <div class="wrapper w-90 w-80-xl center flex justify-between items-center">
            <button title="Open Navigation" class="bigmac" aria-controls="mainnav">
                <hr class="bigmac__burger burger bread1" />
                <hr class="bigmac__burger burger paddie" />
                <hr class="bigmac__burger burger bread2" />
            </button>
            <a href="<?php echo get_home_url(); ?>" title="Home" class="header__logo db absolute">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/lucky-punch-logo.svg" alt="<?php echo get_bloginfo('title'); ?>" title="<?php echo get_bloginfo('title'); ?>" width="69" height="40" />
            </a>
        </div>
    </header>
    <nav id="mainnav" class="fixed left-0 w-100 bg-white">
        <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_class' => '',
        'container' => '',
        'menu_class' => ''
      ));
      ?>
    </nav>