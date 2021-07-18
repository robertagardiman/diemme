<?php /* Template Name: Homepage Template */ get_header(); ?>
<section class="home-wrapper">
    <div class="home__intro">
        <div class="home__slider">
            <?php masterslider(1); ?>
        </div>
        <div class="home__heading">
            <h1>DIEMME</h1>
            <a href="/i-nostri-lavori" class="button--primary">scopri i lavori</a>
        </div>
    </div>
    <div class="home-content">
        <div class="home-content__item">
            <h2><?php the_title(); ?></h2>
            <div class="home-content__description"><?php the_content(); ?></div>
        </div>
        <div class="home-content__item">
            <h2><?php the_field('servizi_title'); ?></h2>
            <div class="home-content__servizi">
            <?php if( have_rows('servizi') ): ?>
                <?php while( have_rows('servizi') ): the_row();?>
                    <div class="servizi__item">
                        <p><?php the_sub_field('ristrutturazioni'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('pavimentazioni'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('restauro_soffitti'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('coperture'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('rifacimento_facciate'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('rifacimento_ascensori'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('pavimentazioni_industriali'); ?></p>
                    </div>
                    <div class="servizi__item">
                        <p><?php the_sub_field('pavimentazioni_esterni'); ?></p>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
