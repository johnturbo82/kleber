<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width">
    <title><?php bloginfo("name"); ?> | <?php is_front_page() ? bloginfo("description") : wp_title(""); ?></title>
    <?php get_template_part("meta-links"); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class((isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == "1") ? "dark" : ""); ?>>
    <div class="container">
        <div class="header">
            <div class="content">
                <a href="<?php echo esc_url(home_url("/")); ?>" class="logo"></a>
                <?php wp_nav_menu(array("menu" => "Hauptmenü", "container_id" => "main-navigation", "container_class" => "navigation")) ?>
                <?php wp_nav_menu(array("menu" => "Hauptmenü", "container_id" => "overlay-navigation", "container_class" => "navigation")) ?>
                <div class="hamburger" onclick="toggleNav()">
                    <div></div>
                </div>
            </div>
        </div>