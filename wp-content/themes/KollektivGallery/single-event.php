<?php get_header(); ?>

<div class="page-title">
	<h1><?php the_title(); ?></h1>
</div>

<section class="row events-page-single">

	<? if ( have_posts() ) : while ( have_posts() ) : the_post();?>

		<div class="small-12 medium-8 large-7 small-centered columns text-center">

			<?php $date = DateTime::createFromFormat('Ymd', get_field('date'));?>

			<h4><?php echo $date->format('l jS F Y');?>, <?php the_field('time'); ?></h4>

			<h4><?php the_field('location'); ?></h4>

			<h4><a href="<?php the_field('booking_link'); ?>"  target="_blank" title="Book a place">BOOK HERE</a></h4>

			<? the_post_thumbnail(); ?>

		</div>

	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>