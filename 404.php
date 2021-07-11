<?php get_header(); ?>

	<?php
		if( have_rows('404', 'option') ):
			while ( have_rows('404', 'option') ) : the_row();
				$icon = get_sub_field('icon');
				$title_img = get_sub_field('title_img');
				$title = get_sub_field('title');
				$description = get_sub_field('description');
			endwhile;
		endif;
	?>
	<section class="error404__main">
		<div class="heading">
			<img class="egg" src="<?php echo $icon ?>" alt="Egg">
			<img class="title_img" src="<?php echo $title_img ?>" alt="Error 404">
			<h2 class="typo--h3 color-neutral--800"><?php echo $title ?></h2>
		</div>
		<div class="subtitle">
			<p  class="typo--p color-neutral--800"><?php echo $description ?></p>
			<img src="<?php echo get_template_directory_uri(); ?>/img/icons/arrow-down.svg" alt="icon">
		</div>
	</section>

	<?php
		wp_nav_menu([
			'menu_id' => 'footer_menu',
			'theme_location' => 'header_menu',
			'menu_class' => 'error404__footer',
		]); ?>
	</div>

		<?php wp_footer(); ?>

		<!-- analytics -->
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
        </script>

        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v7.0&appId=2652669031618088&autoLogAppEvents=1" nonce="I9lJm4Bj"></script>

	</body>
</html>

