<?php get_header(); ?>
				
				<?php
					// Get the fields
					$title = get_field('product_title');
					$artist = get_field('artist');
    			$twitter = get_field('twitter'); 
    			$website = get_field('website');
    			$price = get_field('price');
    			$size = get_field('size');
				?>

<section id="home-container" class="whitebk">
	<div class="container">
	
		<div class="col-xs-12 .col-sm-9 col-md-9">
			<div class="line-separator"></div>
			
			<div class="artist-title">
    		<h1><?php echo $artist; ?></h1>	
    		<h2 class="title"><?php echo $title; ?></h2>
			</div>

			<div class="artist-links">
				<?php echo get_the_tag_list('<div class="tags">',' ','</div>'); ?>
				<div class="clearfix palm-none"></div>
  			
  			<p>
  				<span class="price">
  					<?php
							$price = str_replace("£","", $price); // remove £ sign if exists
							echo '£'.$price; // add £ sign to price
						?>
  				</span>
					<?php if ( $size ) {  // if size exists
						echo '<span class="size">'.$size.'</span>';
					}
					?>
  			</p>	
			</div>

			<div class="clearfix"></div>
			<div class="line-separator"></div>
			
			
			<div class="col-xs-12 .col-sm-12 col-md-12 artist-post">

					<?php if (have_posts()) : while (have_posts()) : the_post();
					    the_content();
					    echo setPostViews(get_the_ID());  /* SET UP THE POST VIEWS FUNCTION */
					endwhile; endif; ?>

					<?php if ($twitter): ?>
					<p>
    				<a href='http://www.twitter.com/<?php echo str_replace("@","", $twitter); ?>'>
    					<?php 
    					if ($twitter != ''){
    						echo "@";
    						echo str_replace("@","", $twitter); 
    					} ?>
    				</a>	
    			</p>
    			<?php endif; ?>

    			<?php if ($website): ?>
    			<p>
    				<a href='http://<?php echo str_replace("http://","", $website); ?>'>
    					<?php echo str_replace("http://","", $website); ?>
    				</a>	
    			</p>
    			<?php endif; ?>
					
					<small>Read <?php echo getPostViews(get_the_ID()); ?> times</small>
					<div class="line-separator"></div>


					
					<!-- DISCUS Comments section here -->

			</div>
		</div>
		


		<ul class="col-xs-12 .col-sm-3 col-md-3 shop-items-sidebar">
			
			<?php
			$args = array('posts_per_page' => 4, 'post_type' => 'kollektiv_products', 'orderby' => 'rand');
			$query = new WP_Query( $args );

			while ($query->have_posts()) : $query->the_post();
			?>

			<?php
					// Get the fields
					$title = get_field('product_title');
					$artist = get_field('artist');
    			$price = get_field('price');
    			$size = get_field('size'); 
			?>
	
			<li class="col-xs-6 .col-sm-12 col-md-12 shop-item">
				<a href="<?php the_permalink(); ?>">
					
					<div class="artist-images">
						<?php the_post_thumbnail( 'main-artist-image' ); ?>
					</div>
					
					<div class="item-details">
						<h5 class="title"><?php echo $title; ?></h5>
						<h6 class="artist-name"><?php echo $artist; ?></h6>
						<span class="price">
							<?php
							$price = str_replace("£","", $price); // remove £ sign if exists
							echo '£'.$price; // add £ sign to price
							?>
						</span>
						<?php if ( $size ) {  // if size exists
							echo '<span class="size">'.$size.'</span>';
						}
						?>

					</div>
				</a>	
			</li>

			<?php 
				endwhile;
			?>

			<li class="col-xs-6 .col-sm-12 col-md-12 widget-cart">
				<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
			</li>
			<!-- <h5 class="more">
				<a href="<?php echo get_site_url(); ?>/shop/">
					Back to the shop...
				</a>
			</h5> -->

			<div class="clearfix"></div>
		
		</ul>	
				
				 
			
		</div>
	</div> 
</section>





<?php get_footer(); ?>