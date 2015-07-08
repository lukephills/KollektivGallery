<?php get_header(); ?>

<div class="text-center page-title">
	<h2 class="underline uppercase">
		<?= '#'.get_field('interview_number').' '; ?><?php the_title(); ?>
	</h2>
</div>

<section class="row picture-interview">

	<? if ( have_posts() ) : while ( have_posts() ) : the_post();?>

		<div class="small-12 medium-8 large-7 small-centered columns text-center">
			<? the_content(); ?>
		</div>

		<div class="small-12 medium-8 large-7 small-centered columns text-center artist-links">
			<h3>Artwork by <? the_title(); ?></h3>

			<? if (get_field('website')): ?>
				<p><a href="http://<?php the_field('website'); ?>" target="_blank" alt="<? the_title(); ?>'s website" title="<? the_title(); ?>'s website"><?php the_field('website'); ?></a></p>
			<? endif; ?>

		</div>

		<? include 'partials/share-post.php'; ?>

		<? get_template_part('content-templates/related', 'interviews'); ?>

		<? comments_template(); ?>

	<?php endwhile; endif; ?>

</section>




<?php get_footer(); ?>