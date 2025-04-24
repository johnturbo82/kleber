<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php get_template_part('meta-links'); ?>
    <?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/standard.js"></script>
</head>

<body <?php body_class(); ?>>
    <div class="container">
        <div class="header">
            <div class="content">
                <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/kleber_logo_kleiner.svg" alt="Kleber Logo" />
                <?php wp_nav_menu(array('menu' => 'Hauptmenü', 'container_class' => 'navigation')) ?>
                <div class="hamburger">
                    <div></div>
                </div>
            </div>
        </div>
        <div id="header-scrolling" class="header-scrolling">
            <div class="scrolling-nav-container">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/kleber_logo_klein.svg" alt="Logo" />
                <?php wp_nav_menu(array('menu' => 'Hauptmenü', 'container_class' => 'navigation')) ?>
            </div>
        </div>