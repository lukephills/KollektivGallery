<?php
/*Template Name: Main*/
?>

<?php get_header(); ?>

<?php
// Set ID of home page custom fields
	$HomeID = 445;

	// Get fields for homepage
	$main_strapline = get_field('main_strapline', $HomeID);
	$picture_interview_title = get_field('picture_interview_title', $HomeID);
	$workshops_title = get_field('workshops_title', $HomeID);
?>


<!--           BIG FEATURED IMAGE SECTION             -->
<a href="http://kollektivgallery.com/apply">
	<section id="big-image" data-type="background" data-speed="13">
		<!--div class="social">
			<div class="facebook"></div>
			<div class="twitter"></div>
		</div-->
		<div class="apply-button featured-button"><p>APPLY</p></div>
		<div class="logo-kollektiv-gallery">
			<img src="<?php bloginfo( 'template_url' );?>/images/logo.png" />
		</div>
		<div class="strapline">
			<p>
				<?php
				// Set ID of home page custom fields
				$HomeID = 445;

				// Get fields for homepage
				$main_strapline = get_field('main_strapline', $HomeID);
				$picture_interview_title = get_field('picture_interview_title', $HomeID);
				$workshops_title = get_field('workshops_title', $HomeID);

				// Echo Strapline
				echo $main_strapline;
				?>
			</p>
		</div>
	</section>
</a>

<!--           ARTIST INTERVIEWS SECTION             -->

<section class="artist-images">
<h1><?php echo $picture_interview_title;?></h1>
	<ul>
		<?php
			$args = array('posts_per_page' => 4, 'post_type' => 'kollektiv_artists', 'orderby' => 'date');
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
		?>
		<div class="col-xs-6 col-sm-4 col-md-3">
		<li>
			<a href="<?php the_permalink(); ?>">
				<div class="artist-thumb">
					<?php the_post_thumbnail( 'featured' ); ?>
					<h5 class="caption simple-caption"><?php the_title(); ?></h5>
				</div>
			</a>
		</li>
		</div>
		<?php 
			endwhile;
		?>
		<div class="clearfix"></div>
	</ul>
</section>


<!--           WORKSHOPS SECTION             -->

<section class="artist-images">
	<h1><?php echo $workshops_title;?></h1>
	<ul>
		<?php
			$args = array('posts_per_page' => 4, 'post_type' => 'kollektiv_workshops', 'orderby' => 'date');
			$query = new WP_Query( $args );
			while ($query->have_posts()) : $query->the_post();
		?>
		<div class="col-xs-6 col-sm-4 col-md-3">
		<li>
			<a href="<?php the_permalink(); ?>">
				<div class="artist-thumb">
					<?php the_post_thumbnail( 'featured' ); ?>
					<h5 class="caption simple-caption"><?php the_title(); ?></h5>
				</div>
			</a>
		</li>
		</div>
		<?php 
			endwhile;
		?>
		<div class="clearfix"></div>
	</ul>
</section>


<?php get_footer(); ?>