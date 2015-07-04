<?php
/*
** Template Name: Artists 
**
*/
?>


<?php get_header(); ?>



<section class="page-container">	

	<h1>Interviews</h1>
	<div class="line-separator"></div>

	<ul class="artist-images">


		<?php

		// if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		// elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		// else { $paged = 1; }
    
    $query_artists = new WP_Query(array(
        'post_type'      => 'kollektiv_artists',
        'posts_per_page' => 1000,
        'orderby'        => 'date',
        'order'          => 'desc',
        // 'paged'          => $paged,
        'public'         => true
        // 'tax_query'      => array(
        //     array(
        //         //'taxonomy' => 'categorias',
        //         'field'    => 'slug',
        //         'terms'    => ACTIVE
        //     )
        // )
    ));

    while ( $query_artists->have_posts() ) : $query_artists->the_post();
    ?>
    <?php wp_link_pages(); ?>
		<div class="col-xs-6 col-sm-4 col-md-3">
		<li>
			<a href="<?php the_permalink(); ?>">
				<div class="artist-thumb">
					<?php the_post_thumbnail( 'main-artist-image' ); ?>
				</div>	
				<div class="artist-name">
					<p><?php the_title(); ?></p>
				</div>
			</a>	
		</li>
		</div>
		<?php endwhile; ?>
	</ul>
	<div class="clearfix"></div>
	<!-- <div class="line-separator-margin"></div>

	<div class="page-number-box">
		<?php echo get_pagination($query_artists); ?>
	</div>
	<div class="line-separator-margin"></div>  -->
	

</section>		

<div class="clearfix"></div>


<?php get_footer(); ?>