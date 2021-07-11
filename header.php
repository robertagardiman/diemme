<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<script src="<?php echo get_template_directory_uri(); ?>/components.env.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!-- Qw Hotels web components -->
        <link rel="stylesheet" href="https://joandjoestg.wpengine.com/jj-booking-engine-components/qw-hotels/qw-hotels.css">
        <script type="module" src="https://joandjoestg.wpengine.com/jj-booking-engine-components/qw-hotels/qw-hotels.esm.js"></script>
        <script nomodule src="https://joandjoestg.wpengine.com/jj-booking-engine-components/qw-hotels.js"></script>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.png" rel="apple-touch-icon-precomposed">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link rel="stylesheet" href="https://unpkg.com/flickity-fade@1/flickity-fade.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="canonical" href="<?php echo get_permalink(get_the_ID()); ?>"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script src="<?php echo get_template_directory_uri(); ?>/dist/bundle.js?t=<?php echo time();?>"></script>

		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
        <script src="https://unpkg.com/flickity-hash@1/hash.js"></script>
        <script src="https://www.youtube.com/player_api"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>
		<?php wp_head(); ?>
        <script> var lan = "<?php echo ICL_LANGUAGE_CODE; ?>" ; </script>
        <?php get_partial('schema'); ?>


        <script>
            var _JoAndJoeTrackingDecorator = _JoAndJoeTrackingDecorator || {};
            _JoAndJoeTrackingDecorator.config = {
                autoDecorate: true,
                handleGoogleAnalytics: true, // Set to false if Google Analytics is not implemented yet.
                debug: true // Set to false in prod
            };
        </script>
            <script src="//staticaws.fbwebprogram.com/joandjoe_tracking_decorator/decorator.js"></script>

	    <script>
	        var eID = "<?php echo get_field('engine_id', 'options'); ?>";
	        var hID = "<?php echo get_field('hotel_id', 'options'); ?>";
	        window.QW_HOTEL_ENV = {
                ENDPOINT: 'https://booking-api-hub.decms.eu',
                ENGINE_ID: eID,
                HOTEL_ID: hID,
              };
	    </script>
	</head>

	<body <?php body_class(); ?>>
		<div class="wrapper">
		    <div class="cookie-popup typo--label">
		        <?php if( have_rows('cookie', 'options') ):
                    while ( have_rows('cookie', 'options') ) : the_row();
                        $cookie_description = get_sub_field('description');
                        $cookie_link_text = get_sub_field('link_text');
                        $cookie_link_url = get_sub_field('link_url');
                    endwhile;
                endif; ?>
		        <p><?php echo $cookie_description; ?></p>
		        <div class="cookie-popup__bottom-section">
		            <a href="<?php echo $cookie_link_url; ?>"><?php echo $cookie_link_text; ?></a>
                    <button class="typo--medium-text color-neutral--800-darker">Ok</button>
		        </div>
		    </div>
			<header class="header clear" role="banner">
			    <select
			        class="select color-neutral--800 select--header typo--p"
			        onclick="window.tracking({
			            'event': 'gaevent',
			            'eventcategory': 'navigation',
			            'eventaction': 'menu - click on cta',
			            'eventlabel': 'where are you going',
			        })">
                    <option value="<?php echo __('Where are you going?','theme-domain'); ?>"><?php echo __('Where are you going?','theme-domain'); ?></option>
                    <?php while( the_repeater_field('active_hostels_hostel', 'option') ): ?>
                        <?php if (get_sub_field('is_current') && get_sub_field('hotel_id') !== "0" ):  ?>
                            <option subtitle="<?php the_sub_field('subtitle');?>" engine-id="<?php the_sub_field('engine_id');?>" hotel-id="<?php the_sub_field('hotel_id');?>" selected value="<?php the_sub_field('value');?>"><?php the_sub_field('name');?></option>
                        <?php elseif(get_sub_field('hotel_id') !== "0") : ?>
                            <option subtitle="<?php the_sub_field('subtitle');?>" engine-id="<?php the_sub_field('engine_id');?>" hotel-id="<?php the_sub_field('hotel_id');?>" value="<?php the_sub_field('value');?>"><?php the_sub_field('name');?></option>
                        <?php endif; ?>
                    <?php endwhile; ?>
			    </select>
                <div
                    class="logo"
                    onclick="window.tracking({
                        'event': 'gaevent',
                        'eventcategory': 'navigation',
                        'eventaction': 'menu - click on cta',
                        'eventlabel': 'logo',
                    })">
                    <a href="<?php echo home_url(); ?>" title="<?php echo __('jo&joe logo, go to homepage of website','theme-domain');?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
                    </a>
                    <?php $page_title = $wp_query->post->post_title; ?>
                    <div class="logo__path-description color-neutral--800-darker typo--medium-text">
                    <?php
                        if(strlen($page_title) > 0) {
                            echo $page_title;
                        }else {
                            echo __("page not found","theme-domain");
                        }
                    ?>
                    </div>
                </div>

                <div class="qw-booking-form-wrapper booking--mobile-header">
                <span class="qw-close__be--header"></span>
                    <?php get_partial('booking-header-BE'); ?>
                </div>
                <div
                    class="menu"
                    onclick="window.tracking({
                        'event': 'gaevent',
                        'eventcategory': 'navigation',
                        'eventaction': 'menu - click on cta',
                        'eventlabel': 'burger menu',
                    })">
                    <span class="menu__line bg-color-neutral--800"></span>
                    <span class="menu__line bg-color-neutral--800"></span>
                    <span class="menu__line bg-color-neutral--800"></span>
                </div>
			</header>
			<section class="menu--open">
                    <?php if( have_rows('menu_labels', 'options') ):
                    while ( have_rows('menu_labels', 'options') ) : the_row();
                        $left_label = get_sub_field('menu_left_label');
                        $coming_soon_label = get_sub_field('label_coming_soon');
                        $newsletter_text = get_sub_field('newsletter_text');
                        $newsletter_text_mobile = get_sub_field('newsletter_text_mobile');
                        $newsletter_label = get_sub_field('newsletter_button');
                        $label_vert_left = get_sub_field('vertical_text_left');
                        $rigth_label = get_sub_field('menu_right_label');
                        $label_vert_right = get_sub_field('vertical_text_right');
                        $blog = get_sub_field('blog');
                    endwhile;
                endif; ?>
                <div class="menu--open__heading">
                    <?php //Hide if no translation
                    $wpml_languages = jo_has_lang_sel();
                    if($wpml_languages) {
                        do_action('wpml_add_language_selector');
                    } ?>
                    <span class="close-btn">
                        <div class="close-btn__icon"></div>
                    </span>
                </div>
                <div class="menu--open__item bg-color-primary--500 menu--open__item--left">
                    <div class="menu-item__content">
                        <span class="menu-content__item-title color-neutral--800-darker typo--p"><?php echo $left_label; ?></span>
                        <?php while( the_repeater_field('active_hostels_hostel', 'options') ):
                            if(get_sub_field('hotel_id') !== '0'): ?>
                            <a
                                href="/<?php the_sub_field('value'); echo "/".ICL_LANGUAGE_CODE."/";?>"
                                title="<?php echo __('Advance to the Jo&Joe hotel in ','theme-domain').the_sub_field('name')?>"
                                class="menu-content__item"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'menu - click on cta',
                                    'eventlabel': 'destination - <?php the_sub_field('name'); ?>',
                                })">
                                <?php if(get_sub_field('is_current')): ?>
                                    <span class="menu-content__current color-neutral--800-darker typo--p"><?php echo __('You are here','theme-domain');?>!</span>
                                <?php endif; ?>
                                <img class="menu-content__icon menu-content__icon--mobile" src="<?php the_sub_field('icon_mobile'); ?>" alt="icon">
                                <div class="menu-content__icon--sizer">
                                    <img class="menu-content__icon" src="<?php the_sub_field('icon'); ?>" alt="icon">
                                </div>
                                <p class="menu-content__title color-neutral--800-darker typo--usp"><?php the_sub_field('name');?></p>
                                <span class="menu-content__hover"></span>
                            </a>
                        <?php endif; endwhile; ?>

                        <p class="label"><?php echo  $coming_soon_label; ?></p>

                        <div class="menu-content__item-wrapper">
                            <?php while( the_repeater_field('header_coming_soon_hostel', 'options') ): ?>
                                <a href="<?php the_sub_field('link'); ?>" title="<?php echo __('Jo&Joe coming soon hotel in','theme-domain').the_sub_field('title')?>" class="menu-content__item menu-content__item--small color-neutral--800-darker typo--usp">
                                    <img class="menu-content__icon menu-content__icon--mobile" src="<?php the_sub_field('icon_mobile'); ?>" alt="icon">
                                    <span class="menu-content__wrapper">
                                        <img class="menu-content__icon" src="<?php the_sub_field('icon'); ?>" alt="icon">
                                    </span>
                                    <?php the_sub_field('title'); ?>
                                    <span class="menu-content__label typo--label color-neutral--800-darker"><?php the_sub_field('label'); ?></span>
                                    <div class="menu-content__polaroid">
                                        <img src="<?php the_sub_field('image'); ?>" alt="polaroid">
                                    </div>
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="menu-item__title typo--h3 color-neutral--800-darker"><?php echo $label_vert_left; ?></div>
                </div>
                <div class="menu--open__item menu--open__item--right bg-color-neutral--800-darker">
                    <div class="menu-item__title typo--h3"><?php echo $label_vert_right; ?></div>
                    <div class="menu-item__content">
                        <span class="menu-content__item-title color-primary--500 typo--p"><?php echo $rigth_label; ?></span>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'header_menu',
                            'menu_class' => 'main-menu',
                            'container' => 'nav',
                            'container_class' => 'header__main-nav',
                            'walker' => new AWP_Menu_Walker()
                        ]); ?>
                        <a
                            href="<?php echo $blog ?>"
                            title="<?php echo __('Advance to the Jo&Joe blog ','theme-domain')?>"
                            class="menu-content__item"
                            onclick="window.tracking({
                                'event': 'gaevent',
                                'eventcategory': 'navigation',
                                'eventaction': 'menu - click on cta',
                                'eventlabel': 'destination - blog ',
                            })"
                            target='_blank'>
                            <p class="menu-content__title color-primary--500 typo--usp"><?php echo __('&Friends','theme-domain');?></p>
                            <span class="menu-content__hover"></span>
                        </a>
                    </div>
                </div>
			</section>
