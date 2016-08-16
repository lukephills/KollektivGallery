<?php
/**
 * A listed post excerpt item
 */
?>

<?
$args = array(
    'post_type' => 'lokal-post',
    'posts_per_page' => -1
    // 'post__not_in' => array($featured_post_id)
);
$query = new WP_Query( $args );
$postCount = 0;
?>

<section class="row blog-list">

    <? if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>


        <? if ($postCount % 4 == 3): // every 4th item should be featured and every 8th item is featured-right ?>
            <div class="small-12 medium-4 columns blog-item featured <?= ($postCount % 8 == 7) ? 'featured-right' : ''; ?>">

                <? if (get_field('lokal_post_type') == 'video'): ?>
                    <span class="video-inline-embed" data-url="<?= get_field('video_link'); ?>">
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                    </span>
                <? elseif (get_field('lokal_post_type') == 'podcast'): ?>
                    <a href="#" class="podcast-placeholder" data-url="<?= get_field('podcast_link'); ?>">
                        <? if ( has_post_thumbnail() ): ?><? the_post_thumbnail('large-blog-post'); ?><? endif; ?>
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                    </a>
                <? else: ?>
                    <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?>">
                        <? if ( has_post_thumbnail() ): ?><? the_post_thumbnail('large-blog-post'); ?><?php endif; ?>
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                    </a>
                <? endif; ?>
            </div><!-- /.column -->

            <? else: ?>

            <div class="small-12 medium-4 columns blog-item">

                <? if (get_field('lokal_post_type') == 'video'): ?>
                    <span class="video-inline-embed" data-url="<?= get_field('video_link'); ?>">
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                    </span>
                <? elseif (get_field('lokal_post_type') == 'podcast'): ?>
                        <!--iframe width="100%" height="300" style="background-color:transparent; display:block; max-width: 700px;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/4925939-invisible-histories-lokal-stories-artists-meet-elijah-winter/embed/v4?eid=AQAAAPEPrVfzKUsA" title="audioBoom player"></iframe-->

                        
                    <!--span class="video-inline-embed" data-url="<?= get_field('podcast_link'); ?>">
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                   </span-->
                <? else: ?>
                    <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?>">
                        <? if ( has_post_thumbnail() ): ?><? the_post_thumbnail('small-blog-post'); ?><?php endif; ?>
                        <h5 class="blog-title"><?php the_title(); ?></h5>
                    </a>
                <? endif; ?>
            </div><!-- /.column -->
             
        <? endif; ?>
        <? $postCount++; ?>
    <? endwhile; endif; wp_reset_postdata(); ?>




</section>
