<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package restaurant_01
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon.ico">
    <?php wp_head(); ?>
	<?php get_template_part('template-parts/google-analytics/google-analytics');?>
    <?php get_template_part('template-parts/ogp/ogp');?>
    <?php get_template_part('template-parts/code/adsense');?>
</head>
<body <?php body_class(); ?>>
</pre>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <!-- ヘッダー -->
    <?php if ( is_home() ) : ?>
        <header id="header" class="header is-transparent">
            <?php get_template_part('template-parts/header/header-content') ?>
        </header>
    <?php else: ?>
        <header class="header is-black">
            <?php get_template_part('template-parts/header/header-content') ?>
        </header>
    <?php endif; ?>
