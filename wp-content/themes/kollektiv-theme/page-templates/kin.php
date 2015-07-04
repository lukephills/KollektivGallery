<?php
/*
** Template Name: Kollektiv Kin
**
*/
?>

<?php get_header(); ?>

<section class="page-container">	

	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
		<h3 class="subheading"><?php get_template_part( 'content', 'page' ); ?></h3>
		<div class="line-separator"></div>
			
	<?php endwhile; ?>
	

	<ul class="artist-images">

		<?php

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }
    
    $query_artists = new WP_Query(array(
        'post_type'      => 'kollektiv_kin',
        'posts_per_page' => 50,
        'paged'          => $paged,
        'public'         => true
       
    ));

    while ( $query_artists->have_posts() ) : $query_artists->the_post();
    ?>

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
	<div class="line-separator"></div>

	<!-- NEED TO FIX PAGINATION >
	<div class="page-number-box">
	UNCOMMENT THIS -> 	<?php //echo get_pagination($query_artists); ?>
	</div>
	<div class="line-separator-margin"></div> 
	-->

</section>		

<div class="clearfix"></div>


<?php get_footer(); ?>