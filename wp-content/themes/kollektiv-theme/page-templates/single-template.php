<?php
/*Template Name: Single Template*/
?>


<?php get_header(); ?>

<section id="home-container" class="whitebk">
	<div class="container">
		<div class="row top-row">
			<div class="col-xs-12 .col-sm-9 col-md-9">
			<div class="line-separator"></div>
	  			<div class="col-xs-12 artist-title">
						<h1><?php the_title(); ?></h1>
						<?php
							// Get the fields
							$title = get_field('product_title');
							$artist = get_field('artist');
		    			$price = get_field('price');
		    			$twitter = get_field('twitter'); 
		    			$website = get_field('website');
						?>
		    			<small class="date-published"><?php echo $date; ?></small>
		    			
				</div>
				<div class="col-xs-4 .col-sm-4 col-md-4 artist-links">
					<?php 
						echo get_the_tag_list('<div class="tags">',' ','</div>');		   			
			    ?>
			    	
	    			<p>
	    				<a href='http://www.twitter.com/<?php echo str_replace("@","", $twitter); ?>'>
	    					<?php 
	    					if ($twitter != ''){
	    						echo "@";
	    						echo str_replace("@","", $twitter); 
	    					} ?>
	    				</a>	
	    			</p>
	    			<p>
	    				<a href='http://<?php echo str_replace("http://","", $website); ?>'>
	    					<?php echo str_replace("http://","", $website); ?>
	    				</a>	
	    			</p>
	    			<p>
	    				
	    				<?php echo str_replace("http://","", $price); ?>
	    					
	    			</p>

	    			
				</div>

				<div class="clearfix"></div>
				<div class="line-separator"></div>

				
				<div class="col-xs-12 .col-sm-12 col-md-12 artist-post">
						<?php if (have_posts()) : while (have_posts()) : the_post();
						    the_content();
						    echo setPostViews(get_the_ID());  /* SET UP THE POST VIEWS FUNCTION */
						endwhile; endif; ?>
						<p></p>
						<small>Read <?php echo getPostViews(get_the_ID()); ?> times</small>
						<div class="line-separator"></div>
						
						<!-- DISCUS Comments section here -->

				</div>
			</div>	


			
			
				<?php
				$args = array('posts_per_page' => 3, 'post_type' => 'kollektiv_products', 'orderby' => 'rand');
				$query = new WP_Query( $args );
				while ($query->have_posts()) : $query->the_post();
				?>
				<div class="col-xs-6 .col-sm-3 col-md-3">
				<li>
					<a href="<?php the_permalink(); ?>">
						<div class="artist-thumb-side">
							<?php the_post_thumbnail( 'main-artist-image' ); ?>
						</div>	
						<div class="artist-name">
							<p><?php the_title(); ?></p>
						</div>
					</a>	
				</li>
				</div>
				
				<?php 
					endwhile;
				?>	
				<!-- <small class="indent15">
					<a href="<?php echo get_site_url(); ?>/products/">
						more...
					</a>
				</small> -->
				
				 <?php dynamic_sidebar( 'sidebar-widgets' ); ?>
			</div>
		</div>
	</div> 
</section>
<div class="clearfix"></div>


<?php get_footer(); ?>