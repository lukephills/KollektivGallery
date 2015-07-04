<?php get_header(); ?>

<?php
// Set ID of home page custom fields
	$HomeID = 445;

	// Get fields for homepage
	$main_strapline = get_field('main_strapline', $HomeID);
	$picture_interview_title = get_field('picture_interview_title', $HomeID);
	$workshops_title = get_field('workshops_title', $HomeID);
?>



<div class="homepage">

	<!--           ARTIST INTERVIEWS SECTION             -->
	<section class="artist-images" style="padding-bottom: 70px;">
	<a href="<?php echo get_home_url(); ?>/artists"><h2><?php echo $picture_interview_title;?></h2></a>
		<ul>
			<?php
				$args = array('posts_per_page' => 4, 'post_type' => 'kollektiv_artists', 'public' => true);
				$query = new WP_Query( $args );
				while ($query->have_posts()) : $query->the_post();
			?>
			<div class="col-xs-6 col-sm-4 col-md-3">
			<li>
				<a href="<?php the_permalink(); ?>">
					<div class="artist-thumb">
						<?php the_post_thumbnail( 'main-artist-image' ); ?>
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


	<!--         LATEST BLOG SECTION          -->
	<section class="blog" style="padding-left: 15px; margin-top: 20px; clear: both;">
						
				<?php
					$args = array('posts_per_page' => 1, 'category_name' => 'Blog', 'public' => true);
					$query = new WP_Query( $args );
					while ($query->have_posts()) : $query->the_post();
				?>
				<a href="<?php the_permalink(); ?>">
					<div class="col-xs-12 col-sm-8 col-md-8" style="padding-right: 40px;">
						<h2>BLOG: <?php the_title();?></h2>
						<p><?php the_date(); ?></p>

						<p><?php the_excerpt();?></p>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-4" style="text-align:center;"> 
						<?php the_post_thumbnail( 'main-artist-image' );?>	
					</div>
				</a>	
				
				<?php 
					endwhile;
				?>
			<div class="clearfix"></div>
	</section>


	<!--           BIG FEATURED IMAGE SECTION             -->
	<!-- <a href="http://kollektivgallery.com/events">
	<section id="big-image" data-type="background" data-speed="13">
		<!- <h1>Visit our new online shop!</h1> -->
		
		<!--div class="logo-kollektiv-gallery">
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
	</a> -->


	



	

	<div class="clearfix"></div>
</div>


<?php get_footer(); ?>