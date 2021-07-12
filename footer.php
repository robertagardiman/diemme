<div class="footer">
    <div class="footer__menu">
        <div class="logo"><span class="logo__mobile">d</span><span>iemme</span></div>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </div>
    <div class="footer__legals">
    <?php
        // query for the about page
        $your_query = new WP_Query( 'pagename=contatti' );
        // "loop" through query (even though it's just one page)
        while ( $your_query->have_posts() ) : $your_query->the_post(); ?>
            <p><?php the_field('nome_azienda')?> - <?php the_field('indirizzo'); ?></p>
            <p>CF/P.IVA <?php the_field('partita_iva')?> - TEL. <a href="tel:<?php the_field('telefono'); ?>"><?php the_field('telefono'); ?></a></p>
        <?php endwhile;
        // reset post data (important!)
        wp_reset_postdata();
    ?>
    </div>
</div>
