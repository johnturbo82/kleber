<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Heizungstechnik Kleber">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php get_template_part('meta-links'); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="topbar container">
        <div class="content">
            <span>Official H.O.G. Chapter #8547</span>
            <?php wp_nav_menu(array('menu' => 'Pflichtangaben')) ?>
        </div>
    </div>
    <div class="navigation container">
        <div class="content">
            <a class="homebutton" href="<?php echo get_home_url() ?>">
                <img class="small_logo" src="<?php echo get_template_directory_uri(); ?>/images/logo/Ingolstadt_Chapter.svg" alt="Ingolstadt Chapter" />
            </a>
            <div class="current_page_title"><?php the_title(); ?></div>
            <input id="menu_toggle" type="checkbox"></input>
            <label for="menu_toggle" class="hamburger">
                <div class="top-bun"></div>
                <div class="meat"></div>
                <div class="bottom-bun"></div>
            </label>
            <div class="nav">
                <?php wp_nav_menu(array('menu' => 'Hauptmenü', 'container_class' => 'mainmenu')) ?>
            </div>
        </div>
    </div>