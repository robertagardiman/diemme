			<?php
                if( have_rows('footer', 'option') ):
                    while ( have_rows('footer', 'option') ) : the_row();
                        $footer_1 = get_sub_field('instagram_url');
                        $footer_2 = get_sub_field('facebook_url');
                        $footer_3 = get_sub_field('linkedin_url');
                        $footer_4 = get_sub_field('tiktok_url');
                        $footer_5 = get_sub_field('pinterest_url');
                        $footer_accor_icon = get_sub_field('accor_icon');
                        $footer_accor_link = get_sub_field('accor_link');
                        $footer_caption = get_sub_field('caption');
                        $footer_copy = get_sub_field('copy');
                        $newsletter_box = get_sub_field('newsletter_box');
                    endwhile;
                endif;
                // Check how many social are there
                $count_footer=0; 
                for($i=1;$i<=5;$i++){ 
                    if(!empty(${"footer_$i"})) $count_footer++; 
                } 
                if( have_rows('announcement', 'option') ):
                    while ( have_rows('announcement', 'option') ) : the_row();
                        $announcement_hide = get_sub_field('hide_announcement');
                        $announcement_icon = get_sub_field('icon');
                        $announcement_title = get_sub_field('title');
                        $announcement_body = get_sub_field('body');
                        $announcement_footer_text = get_sub_field('footer_text');
                    endwhile;
                endif;
            ?>

            <?php
                if( have_rows('footer_questions_box') ):
                    while ( have_rows('footer_questions_box') ) : the_row();
                        $footer_questions_title = get_sub_field('title');
                        $footer_questions_description = get_sub_field('description');
                        $footer_questions_link_label = get_sub_field('link_label');
                        $footer_questions_link = get_sub_field('link');
                        $footer_questions_link_title = get_sub_field('link_title');
                    endwhile;
                endif;
            ?>

			<footer class="footer bg-color-neutral--800-darker" role="contentinfo">
                <div class="footer__item footer__item--heading">
                    <?php if($footer_questions_title): ?>
                        <div class="heading__questions">
                            <span class="questions__title color-neutral--800 typo--label"><?php echo __('Any questions', 'theme-domain');?>? </span>
                            <img class="questions__icon" src="<?php echo get_template_directory_uri(); ?>/img/icons/pigeon.png" alt="pigeons">
                            <a href="<?php echo $footer_questions_link; ?>" title="<?php echo $footer_questions_link_title; ?>" class="questions__description">
                                <h3 class="typo--usp color-neutral--800-darker"><?php echo $footer_questions_title; ?></h3>
                                <p class="typo--label color-neutral--800-darker"><?php echo $footer_questions_description; ?></p>
                                <h4 class="typo--p color-neutral--800-darker"><?php echo $footer_questions_link_label; ?></h4>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="heading__top-link">
                        <?php get_partial('top-link'); ?>
                    </div>
                    <?php
                        $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
                        $pages = array();

                        $header_menu_items = wp_get_nav_menu_items( 'header' );
                        $current_item = wp_filter_object_list (
                            $header_menu_items,
                            array('object_id' => get_queried_object_id())
                        );

                        $next_item = $header_menu_items[key($current_item) + 1];

                        foreach ($pagelist as $page) { $pages[] += $page->ID; }

                        $current = array_search(get_the_ID(), $pages);
                        $nextID = $pages[$current+1];

                        $page_tracking_name = '';
                        if( have_rows('tracking', $nextID) ):
                            while ( have_rows('tracking', $nextID) ) : the_row();
                                $page_tracking_name = get_sub_field('page_name');
                            endwhile;
                        endif;
                    ?>
                    <a
                        href="<?php echo $next_item->url; ?>"
                        class="heading__destinations"
                        title="<?php echo __('Go to page ','theme-domain').$next_item->title; ?>"
                        onclick="window.tracking({
                            'event': 'gaevent',
                            'eventcategory': 'navigation',
                            'eventaction': 'footer - click on cta',
                            'eventlabel': '<?php echo $next_item->title; ?>',
                        })">
                        <p class="typo--p color-neutral--800-darker"><?php echo $next_item->title; ?></p>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow-right.svg" alt="arrow">
                    </a>
                </div>
                <div class="footer__item footer__item--content">
                    <div class="footer-content__item footer-content__item--mobile">
                        <h3 class="item-title typo--usp"><?php echo __('Language','theme-domain');?></h3>
                        <?php //Hide if no translation
                            $wpml_languages = jo_has_lang_sel();
                            if($wpml_languages) {
                                do_action('wpml_add_language_selector');
                            } ?>
                    </div>

                    <div class="footer-content__item footer-content__item--menu">
                        <div class="heading">
                            <h3 class="item-title typo--usp"><?php echo __('Service','theme-domain');?></h3>
                            <?php //Hide if no translation
                                $wpml_languages = jo_has_lang_sel();
                                if($wpml_languages) {
                                    do_action('wpml_add_language_selector');
                                }
                            ?>
                        </div>
                        <?php wp_nav_menu( ['menu_class'  => 'menu typo--label' , 'theme_location' => 'footer_menu']); ?>
                    </div>

                    <div class="footer-content__item footer-content__item--social">
                        <h3 class="item-title typo--usp"><?php echo __('Follow Us','theme-domain');?></h3>
                        <div class="item-socials <?php echo (($count_footer) > 3) ? 'five-items' : '' ?>">
                        <?php if(!empty($footer_1))  { ?>
                            <a
                                title="<?php echo __('Go to an external page ','theme-domain').'Instagram' ?>"
                                href="<?php echo $footer_1; ?>"
                                target="_blank"
                                rel="noopener"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'footer - click on cta',
                                    'eventlabel': 'instagram',
                                })">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/instagram.png" alt="social">
                            </a>
                            <?php }
                            if(!empty($footer_2)) { ?>
                            <a
                                href="<?php echo $footer_2; ?>"
                                title="<?php echo __('Go to an external page ','theme-domain').'Facebook' ?>"
                                target="_blank"
                                rel="noopener"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'footer - click on cta',
                                    'eventlabel': 'facebook',
                                })">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/facebook.png" alt="social">
                            </a>
                            <?php }
                            if(!empty($footer_3)) { ?>
                            <a
                                href="<?php echo $footer_3; ?>"
                                title="<?php echo __('Go to an external page ','theme-domain').'Linkedin' ?>"
                                target="_blank"
                                rel="noopener"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'footer - click on cta',
                                    'eventlabel': 'linkedin',
                                })">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/linkedin.png" alt="social">
                            </a>
                            <?php }
                            if(!empty($footer_4)) { ?>
                            <a
                                href="<?php echo $footer_4; ?>"
                                title="<?php echo __('Go to an external page ','theme-domain').'Tiktok' ?>"
                                target="_blank"
                                rel="noopener"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'footer - click on cta',
                                    'eventlabel': 'Tiktok',
                                })">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/tik-tok.png" alt="social">
                            </a>
                            <?php }
                            if(!empty($footer_5)) { ?>
                            <a
                                href="<?php echo $footer_5; ?>"
                                title="<?php echo __('Go to an external page ','theme-domain').'Pinterest' ?>"
                                target="_blank"
                                rel="noopener"
                                onclick="window.tracking({
                                    'event': 'gaevent',
                                    'eventcategory': 'navigation',
                                    'eventaction': 'footer - click on cta',
                                    'eventlabel': 'Pinterest',
                                })">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/icons/pinterest.png" alt="social">
                            </a>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="footer-content__item footer-content__item--accessibility">
                        <h3 class="item-title typo--usp"><?php echo __('Accessibility','theme-domain');?></h3>
                        <div class="item-accessibility">
                            <div class="item__wrapper">
                                <div id="accessibility-contrast--standard" class="accessibility-btn accessibility-btn--contrast"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/accessibility-contrast-1.png" alt="accessibility"></div>
                                <div id="accessibility-contrast--high" class="accessibility-btn accessibility-btn--contrast"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/accessibility-contrast-2.png" alt="accessibility"></div>
                            </div>
                            <div class="item__wrapper">
                                <div id="accessibility-font--standard" class="accessibility-btn accessibility-btn--font"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/accessibility-font-1.png" alt="accessibility"></div>
                                <div id="accessibility-font--medium" class="accessibility-btn accessibility-btn--font"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/accessibility-font-2.png" alt="accessibility"></div>
                                <div id="accessibility-font--big" class="accessibility-btn accessibility-btn--font"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/accessibility-font-3.png" alt="accessibility"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer__item footer__item--legals  typo--label <?php echo (($count_footer) > 3) ? 'five-items' : '' ?>">
                    <div class="typo--label">
                        © <?php echo date('Y'); ?> JO&JOE. <?php echo $footer_copy; ?>
                    </div>
                    <a target="_blank" href="<?php echo $footer_accor_link; ?>" class="item-logo">
                        <img
                            src="<?php echo $footer_accor_icon; ?>"
                            alt="Accor icon"
                            onclick="window.tracking({
                                'event': 'gaevent',
                                'eventcategory': 'navigation',
                                'eventaction': 'footer - click on cta',
                                'eventlabel': 'all',
                            })">
                        <p class="typo--label">
                            <?php echo $footer_caption; ?>
                        </p>
                    </a>

                </div>
			</footer>
            
            <?php if ($announcement_hide == false) { ?>
            <div class="modal modal-announcement">
                <div class="modal--container bg-color-neutral--100">
                    <div class="modal__close"></div>
                    <div class="modal-announcement__icon">
                        <img src="<?php echo $announcement_icon; ?>"/>
                    </div>
                    <div class="modal-announcement__title typo--h2"><?php echo $announcement_title; ?></div>
                    <div class="modal-announcement__body typo--p"><?php echo $announcement_body; ?></div>
                    <?php if( $announcement_footer_text ): ?>
                        <div class="modal-announcement__footer typo--p"><?php echo $announcement_footer_text; ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php } ?>
		</div>
        <?php get_partial('modal-booking'); ?>

		<?php wp_footer(); ?>

        <div id="fb-root"></div>
        <?php $code =  wpml_get_code(ICL_LANGUAGE_CODE); ?>
        <script async defer crossorigin="anonymous" src="<?php echo 'https://connect.facebook.net/'.$code.'/sdk.js#xfbml=1&version=v7.0&appId=2652669031618088&autoLogAppEvents=1'; ?>" nonce="I9lJm4Bj"></script>

	</body>
</html>
