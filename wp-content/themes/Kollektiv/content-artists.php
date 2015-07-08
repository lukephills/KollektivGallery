<?php
	
	$num_posts = ( is_front_page() ) ? 4 : -1; //If front page is true only show 4 posts otherwise show all posts

    $args = array(
        'post_type' => 'kollektiv_artists',
        'posts_per_page' => $num_posts
    );
    $query = new WP_Query( $args );
    $i = $query->post_count;
?>

<section class="row content">

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <div class="small-12 small-medium-6 medium-4 large-3 columns image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-artist-image'); ?>
                <div class="background-dark text-light text-center label">

                    <span><?= '#'.get_field('interview_number').' '; ?><?php the_title(); ?></span>
                </div>
            </a>
        </div>

        <? $i--; ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>
