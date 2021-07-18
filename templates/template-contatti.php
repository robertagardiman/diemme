<?php /* Template Name: Contatti */ get_header(); ?>

<section class="contatti-wrapper">
    <div class="contatti__map">
        <div class="map"><?php the_field('map');?></div>
        <div class="info">
            <h3><?php the_field('nome_azienda');?></h3>
            <span><?php the_field('indirizzo'); ?></span>
            <p>Tel. <a href="tel:<?php the_field('telefono'); ?>"><?php the_field('telefono'); ?></a></p>
            <p>Email. <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></p>
        </div>
    </div>
    <div class="contatti__form">
        <h2>richiesta di informazioni</h2>
        <?php the_content(); ?>
    </div>
</section>

<?php get_footer(); ?>
