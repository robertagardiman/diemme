<?php /* Template Name: Tecnologie e lavorazioni */ get_header(); ?>
<section class="tech-wrapper">
    <h1><?php the_title(); ?></h1>
    <?php
    $tech_1 = get_field('prima_tecnologia');
    if( $tech_1 ): ?>
        <div class="tech__item">
            <span class="bg-line"></span>
            <div class="item__media">
                <?php masterslider(3); ?>
            </div>
            <div class="item__content">
                <h2><?php echo $tech_1['titolo']; ?></h2>
                <p><?php echo $tech_1['descrizione']; ?></p>
            </div>
        </div>
    <?php endif; ?>

    <?php
    $tech_2 = get_field('seconda_tecnologia');
    if( $tech_2 ): ?>
        <div class="tech__item">
            <span class="bg-line"></span>
            <div class="item__media">
                <?php masterslider(4); ?>
            </div>
            <div class="item__content">
                <h2><?php echo $tech_2['titolo']; ?></h2>
                <p><?php echo $tech_2['descrizione']; ?></p>
            </div>
        </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>
