<?php
/*Template Name: Checkout*/
?>


<?php get_header(); ?>

<section id="home-container" class="whitebk checkout-page">
	<div class="page-text">
		<div class="line-separator"></div>
		<div class="artist-post">
			
			<?php 
				if (have_posts()) : while (have_posts()) : the_post();
		    the_content();
				endwhile; endif; 
			?>

			<div class="clearfix line-separator"></div>
		</div>
	
		<section class="artist-images">
			

				<?php
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }

				$args = array(
					'posts_per_page' => 9,
					'post_type' => 'kollektiv_products',
					'orderby' => 'date',
					'paged'   => $paged
					//'order' => 'ASC' 
					//
					);
				$queryProducts = new WP_Query( $args );
				while ($queryProducts->have_posts()) : $queryProducts->the_post();
				?>
				<?php
					// Get the fields
					$title = get_field('product_title');
					$artist = get_field('artist');
	  			$price = get_field('price');
	  			$size = get_field('size'); 
				?>
				<?php wp_link_pages(); ?>

				<div class="col-xs-6 col-sm-4 shop-item">
					<li>
						<a href="<?php the_permalink(); ?>">
							
							<div class="artist-thumb">
								<?php the_post_thumbnail( 'main-artist-image' ); ?>
							</div>
							
							<div class="item-details">
								<h6 class="artist-name"><?php echo $title; ?> - <?php echo $artist; ?></h6>
								<span class="price">
									<?php
									$price = str_replace("£","", $price); // remove £ sign if exists
									echo '£'.$price; // add £ sign to price
									?>
								</span>
							</div>
						</a>	
					</li>
				</div>
				

				<?php 
					endwhile;
				?>
			
			<div class="clearfix"></div>
			<div class="line-separator"></div>

			
		</section>
	</div>
</section>


<?php get_footer(); ?>