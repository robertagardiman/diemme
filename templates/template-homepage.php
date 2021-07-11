<?php /* Template Name: Homepage Template */ get_header(); ?>
<?php
    if( have_rows('promo_banner', 'options') ):
        while ( have_rows('promo_banner', 'options') ) : the_row();
            $promo_banner_icon = get_sub_field('banner_icon');
            $promo_banner_cta = get_sub_field('banner_cta');
        endwhile;
    endif;
?>
<section class="intro-section">
    <?php $has_vid = get_field('introduction_video');
        $choice = get_field('select_video_source');
    if($has_vid && $choice !== 'None') {
        $fallback_image = get_field('poster_image');
        if($choice === 'Vimeo') {
            $video_id =  get_field('vimeo_video_id') ?>
            <div class="intro__video vimeo-intro">
                <iframe id="vimeoEmbed"  src="https://player.vimeo.com/video/<?php echo $video_id; ?>?api=1&loop=1&autoplay=1&muted=1&background=1" width="auto" height="auto" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
            </div>
            <?php $image_info = get_image_info_by_url($fallback_image); ?>
            <img class="intro-section__image--vimeo" src="<?php echo $fallback_image; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
        <?php } else if($choice === 'Youtube') {
            $vid_desk = get_field('yotube_for_desktop');
            $vid_mob = get_field('yotube_for_mobile'); ?>
            <div class="intro__video">
                <div id="youtubeEmbed" data-video-id-desktop="<?php echo $vid_desk; ?>" data-video-id-mobile="<?php echo $vid_mob; ?>"></div>
            </div>
            <?php } ?>
    <?php } else {
    $image_info = get_image_info_by_id(get_post_thumbnail_id()); ?>
    <img class="intro-section__image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
    <?php } ?>
    <h2 class="intro-section__title typo--h1"><span class="bg-color-neutral-800-alpha"><?php the_field('intro_text_start'); ?></span><span class="bg-color-neutral-800-alpha"><?php the_field('intro_text_end'); ?></span></h2>
    <div class="qw-booking-form-wrapper booking--mobile">
    <div class="qw-booking-form-content">
            <span class="qw-close__be--intro"></span>
            <?php get_partial('booking-intro-BE'); ?>
        </div>
    </div>
    <?php if($promo_banner_cta && $promo_banner_icon) { ?>
        <div class="promo-banner-trigger">
        <div class="promo-banner-trigger__content">
            <img class="promo-banner-trigger__icon" src="<?php echo $promo_banner_icon; ?>" alt="" title="">
            <p class="color-neutral--800 promo-banner-trigger__cta"><?php echo $promo_banner_cta; ?></p>
        </div>
    </div>
    <?php } ?>
</section>

<?php
    if( have_rows('services') ):
        while ( have_rows('services') ) : the_row();
            $services_title = get_sub_field('title');
            $services_description = get_sub_field('description');
        endwhile;
    endif;
?>

<section class="services-section">
    <h1 class="section__title typo--h1 color-neutral--800"><?php echo $services_title; ?></h1>
    <p class="section__description typo--p color-neutral--800"><?php echo $services_description; ?></p>
    <div class="services-section__container">
        <?php while( the_repeater_field('services_service') ): ?>
            <div class="service-item">
                <div class="service-item--container-mobile">
                    <?php if(!get_sub_field('animated_icon')): ?>
                        <img class="service-item__icon" src="<?php the_sub_field('icon'); ?>" alt="" title="">
                    <?php endif; ?>
                    <div><?php the_sub_field('animated_icon'); ?></div>
                    <h3 class="service-item__title typo--medium-text color-neutral--800"><?php the_sub_field('title'); ?></h3>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php
    if( have_rows('destinations') ):
        while ( have_rows('destinations') ) : the_row();
            $destinations_title = get_sub_field('title');
            $destinations_description = get_sub_field('description');
            $destinations_destinations = get_sub_field('destinations');
        endwhile;
    endif;
?>

<section class="destination-section">
    <h2 class="section__title typo--h1 color-neutral--800"><?php echo $destinations_title; ?></h2>
    <p class="section__description typo--p color-neutral--800"><?php echo $destinations_description; ?></p>
    <div class="destination-container">
        <div class="destination-container__actual">
            <?php 
            $count = count(get_field('destinations_destinations'));
            while( the_repeater_field('destinations_destinations') ): 
                ?>
                <?php  echo ($count > 4) ? '<div class="flickity-helper">' : ''; ?>
                <div class="polaroid" rel="nofollow">
                  <span class="polaroid__icon">
                    <img src="<?php the_sub_field('icon'); ?>" alt="" title="">
                  </span>
                  <a href="<?php the_sub_field('link'); ?>" rel="nofollow" class="polaroid__image">
                  <?php
                    $url = get_sub_field('image');
                    $image_info = get_image_info_by_url( $url);
                  ?>
                    <img src="<?php echo $url; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                    <div class="polaroid__image--description bg-color-neutral--800-darker">
                        <h3 class="typo--h3 color-neutral--800"><?php the_sub_field('subtitle'); ?></h3>
                        <p class="typo--p typo--p color-neutral--800"><?php the_sub_field('description'); ?></p>
                    </div>
                  </a>
                  <div class="polaroid__heading">
                    <a href="<?php the_sub_field('link'); ?>" title="<?php echo the_sub_field('link_title') ?>" class="polaroid__title typo--usp  color-neutral--800-darker"><?php the_sub_field('title'); ?></a>
                    <p class="polaroid__mobile-description typo--p color-neutral--800-darker"><?php the_sub_field('mobile_description'); ?></p>
                  </div>
                  <a href="<?php the_sub_field('link'); ?>" title="<?php echo the_sub_field('link_title') ?>" rel="nofollow" ><h3 class="polaroid__btn typo--medium-text color-neutral--800"><?php the_sub_field('link_label'); ?></h3></a>
                </div>
                <?php  echo ($count > 4) ? '</div>' : ''; ?>
            <?php endwhile; ?>
        </div>

        <div class="destination-container__new">
            <?php $count_n = count(get_field('destinations_new_destinations')); ?>
            <div class="polaroid-container <?php echo ($count_n < 4) ? 'smaller' : ''; ?>">
            <h2 class="destination-container__new__title typo--h3 color-neutral--800"><?php echo __('Soon','theme-domain');?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow-experiences.svg" alt="" title="">
                <img class="high-contrast" src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow-experiences-white.svg" alt="" title="">
            </h2>
                <?php 
                while( the_repeater_field('destinations_new_destinations') ): ?>
                    <a href="<?php the_sub_field('link'); ?>" class="polaroid--small <?php if(get_sub_field('link')): echo 'active'; endif; ?>">
                      <div class="polaroid--small__icon">
                        <img src="<?php the_sub_field('icon'); ?>" alt="" title="">
                      </div>
                      <span class="polaroid--small__label color-neutral--800-darker bg-color-neutral--50 typo--p"><?php the_sub_field('label'); ?></span>
                      <div class="polaroid--small__image">
                      <?php
                        $url = get_sub_field('image');
                        $image_info = get_image_info_by_url( $url); ?>
                        <img src="<?php echo $url; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                      </div>
                      <p class="polaroid--small__title typo--medium-text color-neutral--800-darker"><?php the_sub_field('title'); ?></p>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php
    if( have_rows('dormir') ):
        while ( have_rows('dormir') ) : the_row();
            $dormir_title = get_sub_field('title');
            $dormir_description = get_sub_field('description');
            $dormir_link_label = get_sub_field('link_label');
            $dormir_link = get_sub_field('link');
            $dormir_link_title = get_sub_field('link_title');
        endwhile;
    endif;
?>
<section class="rooms-section">
    <h2 class="section__title typo--h1 color-neutral--800"><?php echo $dormir_title; ?></h2>
    <p class="section__description typo--p color-neutral--800"><?php echo $dormir_description; ?></p>
    <a href="<?php echo $dormir_link; ?>" title="<?php echo $dormir_link_title; ?>" class="rooms__btn typo--medium-text color-neutral--800"><?php echo $dormir_link_label; ?></a>
    <div class="rooms-card-wrapper">
        <?php while( the_repeater_field('dormir_room') ): ?>
        <div class="room-card">
            <div class="room-card__image">
            <?php
            $url = get_sub_field('image');
            $image_info = get_image_info_by_url( $url); ?>
                <img src="<?php echo $url; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
            </div>
            <h3 class="room-card__title color-neutral--800 typo--usp"><?php the_sub_field('title'); ?></h3>
            <span class="room-card__heading">
                <div class="room-info">
                    <div class="room-info__images">
                        <?php if(!get_sub_field('people_animated_icon')): ?>
                            <?php
                            $url = get_sub_field('people_icon');
                            $image_info = get_image_info_by_url( $url); ?>
                            <img class="info-item__icon" src="<?php the_sub_field('people_icon'); ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                        <?php endif; ?>
                        <div><?php the_sub_field('people_animated_icon'); ?></div>
                    </div>
                    <p class="room-info__description typo--p color-neutral--800"><?php the_sub_field('people_label'); ?></p>
                </div>
                <div class="room-info">
                    <div class="room-info__images">
                        <?php if(!get_sub_field('bathroom_animated_icon')):
                            $url = get_sub_field('bathroom_icon');
                            $image_info = get_image_info_by_url( $url); ?>
                            <img class="info-item__icon" src="<?php the_sub_field('bathroom_icon'); ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                        <?php endif; ?>
                        <div><?php the_sub_field('bathroom_animated_icon'); ?></div>
                    </div>
                    <p class="room-info__description typo--p color-neutral--800"><?php the_sub_field('bathroom_label'); ?></p>
                </div>
            </span>
            <a
                class="room-card__btn typo--medium-text color-neutral--800-darker"
                title="<?php echo the_sub_field('link_title') ?>"
                href="<?php the_sub_field('link'); ?>"
                onclick="window.tracking({
                    'event': 'gaevent',
                    'eventcategory': 'homepage',
                    'eventaction': 'room - click on cta',
                    'eventlabel': 'view more <?php the_sub_field('title'); ?>',
                })">
                <?php the_sub_field('call_to_action'); ?>
            </a>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php
    if( have_rows('restaurants') ):
        while ( have_rows('restaurants') ) : the_row();
            $restaurants_title = get_sub_field('title');
            $restaurants_description = get_sub_field('description');
            $restaurants_gallery = get_sub_field('gallery', false, false);
            $restaurants_link = get_sub_field('link');
            $restaurants_link_label = get_sub_field('link_label');
            $restaurants_link_title = get_sub_field('link_title');
        endwhile;
    endif;
?>
<section class="restaurant-section">
    <div class="restaurant-section__heading">
        <div class="section__carousel">
            <div class="carousel--simple">
                <?php
                if( $restaurants_gallery ): ?>
                    <?php foreach( $restaurants_gallery as $image_id ): ?>
                        <div class="carousel-cell">
                        <?php
                            $image_url = wp_get_attachment_url( $image_id );
                            $image_info = get_image_info_by_url( $image_url); ?>
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                        </div>
                    <?php endforeach;
                endif; ?>
            </div>
        </div>
        <a class="heading__title" href="<?php echo $restaurants_link; ?>"><h2 class="typo--h2 color-neutral--800"><?php echo $restaurants_title; ?></h2></a>
        <p class="heading__description typo--p color-neutral--800"><?php echo $restaurants_description; ?></p>
        <div class="heading__icons">
            <?php while( the_repeater_field('restaurants_service') ): ?>
                <div class="heading__icons--item">
                    <?php if(!get_sub_field('animated_icon')):
                        $url = get_sub_field('animated_icon');
                        $image_info = get_image_info_by_url( $url); ?>
                        <img class="info-item__icon" src="<?php the_sub_field('icon'); ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                    <?php endif; ?>
                    <div><?php the_sub_field('animated_icon'); ?></div>
                    <p class="typo--p color-neutral--800"><?php the_sub_field('title'); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
        <a
            class="heading__btn typo--medium-text color-neutral--800"
            rel="nofollow"
            title="<?php echo $restaurants_link_title; ?>"
            href="<?php echo $restaurants_link; ?>"
            onclick="window.tracking({
                'event': 'gaevent',
                'eventcategory': 'homepage',
                'eventaction': 'click on cta',
                'eventlabel': 'discover our restaurants',
            })">
            <?php echo $restaurants_link_label; ?>
        </a>
    </div>
</section>

<?php
    if( have_rows('green') ):
        while ( have_rows('green') ) : the_row();
            $hide = get_sub_field('hide_component');
            $green_description = get_sub_field('description');
            $green_title = get_sub_field('title_img');
        endwhile;
    endif;

    if($hide == false) {
?>
<section class="green-section">
    <div class="green-section__heading">
        <img src="<?php echo $green_title?>" alt="" title="Title Green Philosopy">
        <p class="typo--p color-neutral--800"><?php echo $green_description; ?></p>
    </div>
    <div class="green-section__content">
        <span class="line line--horizontal first"></span>
        <span class="line line--horizontal last"></span>
        <span class="line line--vertical first"></span>
        <span class="line line--vertical last"></span>
        <?php while( the_repeater_field('green_item') ): ?>
            <div class="green-item">
                <?php if(!get_sub_field('animated_icon')): ?>
                    <?php
                    $url = get_sub_field('icon');
                    $image_info = get_image_info_by_url( $url);
                    ?>
                    <img src="<?php echo $url; ?>" alt="<?php echo $image_info['alt_text']; ?>" title ="<?php echo $image_info['title'] ?>">
                <?php endif; ?>
                <div><?php the_sub_field('animated_icon'); ?></div>
                <p class="color-neutral--800 typo--medium-text"><?php the_sub_field('title'); ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php } ?>

<?php get_partial('review-section'); ?>

<?php
    if( have_rows('la_promesse') ):
        while ( have_rows('la_promesse') ) : the_row();
            $hide_sub = get_sub_field('hide_component');
            $la_promesse_title_1 = get_sub_field('title_1');
            $la_promesse_title_2 = get_sub_field('title_2');
            $la_promesse_description = get_sub_field('description');
            $la_promesse_media = get_sub_field('media_link');
        endwhile;
    endif;
    if($hide_sub == false) {
?>
<section class="promesse-section">
    <div class="promesse-section__content">
        <iframe src="<?php echo $la_promesse_media; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="promesse-section__heading">
        <div class="heading__wrapper">
            <h2 class="heading__title typo--usp bg-color-neutral--800-darker"><?php echo $la_promesse_title_1; ?></h2>
            <br>
            <h2 class="heading__title typo--usp bg-color-neutral--800-darker"><?php echo $la_promesse_title_2; ?></h2>
            <p class="heading__description typo--label color-neutral--800-darker"><?php echo $la_promesse_description; ?></p>
        </div>
    </div>
</section>
<?php } ?>
<?php if($promo_banner_cta && $promo_banner_icon) {
    get_partial('promo-banner');
} ?>
<?php get_footer(); ?>
