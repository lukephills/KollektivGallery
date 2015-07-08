<?php

    $args = array(
        'post_type' => 'lokal',
        'posts_per_page' => -1
    );
    $query = new WP_Query( $args );
    $i = $query->post_count;
?>

<section class="row content">

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <div class="small-12 small-medium-6 medium-4 large-3 columns image">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('main-artist-image'); ?>
                <div class="background-dark text-light text-center label">
                    <span><?='#'.$i.' ';?><?php the_title(); ?></span>
                </div>
            </a>
        </div>

        <? $i--; ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>
