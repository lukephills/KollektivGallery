<?php get_header(); ?>

<div class="text-center page-title">
    <h2 class="underline uppercase">
        <?php the_title(); ?>
    </h2>
</div>

<section class="row page">
    <div class="small-12 columns">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <p><?php the_content(); ?></p>
    
        <?php endwhile; else : ?>

			<p><?php _e( 'Sorry, no pages found.', 'kollektiv-legacy-theme' ); ?></p>

		<?php endif; ?>
    </div>
</section>



<?php get_footer(); ?>