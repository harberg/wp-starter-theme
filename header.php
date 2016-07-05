<?php
/**
 * Template for loading and displaying the header
 *
 * Displays and loads all of the head elements, including navigation
 *
 * @package WordPress
 * @subpackage Starter_Theme
 */
?><!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <?php if (is_search()) { ?>
        <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <title><?php the_title(); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" />
        <!-- place favicon.ico in root -->
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
        <link rel="stylesheet" type='text/css' href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="sb-site">
    <div id="wrapper">
        <header class="">
            <div class="innerContainer">
                <h1 class="siteTitle"><a href="<?php bloginfo( 'url' ); ?>" rel="home">Title</a></h1>
                <a class="headerLogo" href="<?php bloginfo( 'url' ); ?>">
                    <img src="<?php
                                echo get_header_image() ?
                                esc_url( get_header_image() ) :
                                esc_url( sms_theme_img( 'seamonster-studios-logo-image.svg' ) ); ?>"
                </a>
                <a id="menuNavLeft" class="sb-toggle-right open-menu fa fa-reorder" href="javascript: void(0)"></a>
                <?php wp_nav_menu( array(
                    'theme_location'  => 'primary',
                    'container'       => 'nav',
                    'container_class' => 'mainNav',
                )); ?>
            </div>
        </header><!-- /header -->

