<?php
/*Template Name: Workshops*/
?>


<?php get_header(); ?>


<section class="page-text">	
	<ul>
		<?php while ( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="line-separator"></div>
			<?php get_template_part( 'content', 'page' ); ?>	
		<?php endwhile; ?>

		<?php
			$args = array(
				'posts_per_page' => 16,
				'post_type' => 'kollektiv_workshops',
				//'orderby' => 'date',
				//'order' => 'ASC',
				'public' => true
				);
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
		?>
		<li class="row">
			<a href="<?php the_permalink(); ?>">
				<div class="col-xs-12 col-sm-6 artist-images">
					<?php the_post_thumbnail( 'featured' ); ?>
				</div>
				<div class="col-xs-12 col-sm-6">
					<h3><?php the_title(); ?></h3>
					<p>
						<?php echo excerpt(85); ?>
					</p>
					<p>
						<a href="<?php echo get_permalink(); ?>"> Read More...</a>
					</p>
				</div>
			</a>	
		</li>

		<?php 
			endwhile;
		?>
	</ul>
	<div class="line-separator"></div>
</section>
<div class="clearfix"></div>


<?php get_footer(); ?>