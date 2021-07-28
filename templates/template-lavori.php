<?php /* Template Name: I nostri lavori */ get_header(); ?>
<section class="work-wrapper">
    <h1><?php the_title(); ?></h1>
    <div class="work-content">
        <span class="bg-line"></span>
        <?php
        $progetti = get_field('progetti');
        if( $progetti ): ?>
            <div class="work__item work__item--progetti">
                <span class="bg-line"></span>
                <div class="item__media">
                    <img src="<?php echo $progetti['immagine']; ?>">
                </div>
                <div class="item__content">
                    <h2><?php echo $progetti['titolo']; ?></h2>
                    <span class="icon-lens icon-lens--progetti"></span>
                </div>
            </div>
        <?php endif; ?>
        <div class="progetti-overlay">
            <div class="progetti-overlay__close"></div>
            <div class="overlay__content">
                <?php masterslider(5); ?>
            </div>
        </div>

        <?php
        $prima_e_dopo = get_field('prima_e_dopo');
        if( $prima_e_dopo ): ?>
            <div class="work__item work__item--primaedopo">
                <span class="bg-line"></span>
                <div class="item__media">
                    <img src="<?php echo $prima_e_dopo['immagine']; ?>">
                </div>
                <div class="item__content">
                    <h2><?php echo $prima_e_dopo['titolo']; ?></h2>
                    <span class="icon-lens icon-lens--primaedopo"></span>
                </div>
            </div>
        <?php endif; ?>
        <div class="primaedopo-overlay">
            <div class="primaedopo-overlay__close"></div>
            <div class="overlay__content">
                <?php masterslider(5); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
