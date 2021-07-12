<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://unpkg.com/flickity-fade@1/flickity-fade.css">
        <link rel="canonical" href="<?php echo get_permalink(get_the_ID()); ?>"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="<?php echo get_template_directory_uri(); ?>/dist/bundle.js?t=<?php echo time();?>"></script>

		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
        <script src="https://unpkg.com/flickity-hash@1/hash.js"></script>
		<?php wp_head(); ?>
        <script> var lan = "<?php echo ICL_LANGUAGE_CODE; ?>" ; </script>

	</head>

	<body <?php body_class(); ?>>
		<div class="wrapper">
			<header class="header clear" role="banner">
			    <div class="logo"><span class="logo__mobile">d</span><span>iemme</span></div>
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                <div class="header__menu-trigger">
                    <span class="menu__line"></span>
                    <span class="menu__line"></span>
                    <span class="menu__line"></span>
                <div>
                <div class="header__menu-content">
                    <div class="header__menu-close">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/close-w.svg">
                    </div>
                    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
                </div>
			</header>
