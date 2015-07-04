<?php get_header(); ?>

<section class="page-text">
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="post">
			<h1><?php the_title(); ?></h1>
			<div class="line-separator"></div>
			<div class="content"><?php get_template_part( 'content', 'page' ); ?></div>
			<div class="line-separator"></div>
		</div>
	<?php endwhile; ?>
</section>




<?php get_footer(); ?>