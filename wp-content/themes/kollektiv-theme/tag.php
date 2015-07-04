<?php get_header(); ?>


<section class="page-text">
	

				<div class="line-separator"></div>
  			<div class="search-title">
					<h1><?php single_tag_title(); ?></h1>	
				</div>
				
				<div class="clearfix"></div>
				<div class="line-separator"></div>
				<div class="search-result-list">
						
					
					
					<?php
					
						$current_tag = get_query_var('tag_id');
						
						$args = array(
							'posts_per_page' => 12,
							'post_type' => array( 'kollektiv_workshops','kollektiv_artists','kollektiv_products','kollektiv_kin'),
							'tag_id' => $current_tag,
							'orderby' => 'rand'
							);
						$query = new WP_Query( $args );
						while ($query->have_posts()) : $query->the_post();
					?>
					<a href="<?php echo get_permalink(); ?>">
						<li class="row">
							<div class="col-xs-4 .col-sm-3 col-md-3">
								<div class="artist-thumb-side">
									<?php the_post_thumbnail( 'main-artist-image' ); ?>
								</div>
							</div>
						
							<div class="col-xs-8 .col-sm-9 col-md-9">	
								<div>
									<h3 style="margin-top:0px;"><?php the_title(); ?></h3>
									
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
										?>
									</p>
								</div>
							</div>
						</li>
					</a>
				<?php endwhile;?>
				</div>
	
	
</section>

<?php get_footer(); ?>