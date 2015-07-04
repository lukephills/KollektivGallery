<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>


<?php

	global $query_string;

	$query_args = explode("&", $query_string);


	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

	global $wp_query;
	$total_results = $wp_query->found_posts; // variable to store total results

	$search_query = array(
			'paged' => $paged,
			'posts_per_page' => 16
		);

	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach

	$search = new WP_Query($search_query);

	
?>


<section class="page-text">
	
				<div class="line-separator"></div>
	  			<div class="search-title">
		  			
		  			<?php
		  			
		  			// $search_args = array(
		  			// 	'posts_per_page' => 16, 
		  			// 	'post_type' => array('post','page', 'kollektiv_artists', 'kollektiv_workshops', 'kollektiv_products')
		  			// );

		  			// query_posts($search_args);

		  			if ( $search->have_posts() ) : 
		  			?>
							
						
						<?php 
							printf( __( '<h3 class="searching-for">'.'Search Results for: %s'.'</h3>', 'migration' ), '<br>'.'<h1>' . get_search_query() . '</h1>' ); 
						?>
						
							
					</div>

					<div class="clearfix"></div>
					<div class="line-separator"></div>

							<?php while ( $search->have_posts() ) : $search->the_post(); ?>
								
								<? //php get_template_part( 'content' ); ?>
	
	
					
						<li class="row search-result-list">
							<div class="col-xs-4 .col-sm-3 col-md-3">
								<a href="<?php echo get_permalink(); ?>">
									<div class="artist-thumb-side">
										<?php the_post_thumbnail( 'main-artist-image' ); ?>
									</div>
								</a>
							</div>
							
							<a href="<?php echo get_permalink(); ?>">
								<div class="col-xs-8 .col-sm-9 col-md-9">	
									<h3 class="search-result-title"><?php the_title(); ?></h3>
									
										<?php

											$post_type = get_post_type_object( get_post_type($post) );

											if ($post_type->label == 'Products'){
												$price = get_field('price');
												$price = str_replace("£","", $price); // remove £ sign if exists
												echo '<span class="price">£'.$price.'</span>'; // add £ sign to price
											}
											

										?>
									
									<p>
										<?php 
											the_excerpt(); 
											if ($post_type->label == 'Artists') {
												echo '<a href="'.get_permalink().'">View Picture Interview</a>';
											}
											elseif ($post_type->label == 'Products') {
												echo '<a href="'.get_permalink().'">View / Buy</a>';
											}
											elseif ($post_type->label == 'Kin') {
												echo '<a href="'.get_permalink().'">View Kollektiv Artist</a>';
											}
										?>
									</p>
								</div>
							</a>
						</li>
					
				<?php endwhile;?>
				
				<?php else : ?>
					<header>
						<h1><?php _e( 'Nothing Found', 'migration' ); ?></h1>
					</header>
					<div class="line-separator"></div>
					<div class="gap">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'migration' ); ?></p>
					</div>
						
				<?php endif; ?>

			</div>
		

</section>

<?php get_footer(); ?>