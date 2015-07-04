<?php
/*
Template Name: Store
*/
?>

<?php get_header(); ?>


<section class="page-container">
	

	<?php while ( have_posts() ) : the_post(); ?>
		<!-- <h1><?php the_title(); ?></h1> -->
		<h2 style="text-align:center; margin-bottom: 25px;">SALE 30% OFF - ADD <span style="color:teal;">WINTERSALE30</span> AT CHECKOUT</h2>
		<div class="line-separator"></div>
		<?php get_template_part( 'content', 'page' ); ?>	
	<?php endwhile; ?>

	<?php

		// if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		// elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		// else { $paged = 1; }

		$args = array(
			'posts_per_page' => 1000,
			'post_type' => 'kollektiv_products',
			//'orderby' => 'date',
			// 'paged'   => $paged,
			//'order' => 'ASC'
			'public' => true
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
	<!-- <?php wp_link_pages(); ?> -->
	<ul class="shop-items">
		<div class="col-xs-6 col-sm-4 shop-item">
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
		</div>
		

		<?php 
			endwhile;
		?>
		<div class="clearfix"></div>
		<!-- <div class="line-separator"></div>
		<div class="page-number-box">
			<?php echo get_pagination($queryProducts); ?>
		</div>
		<div class="line-separator"></div> -->
	</ul>
</section>

<div class="clearfix"></div>

</section>




<?php get_footer(); ?>