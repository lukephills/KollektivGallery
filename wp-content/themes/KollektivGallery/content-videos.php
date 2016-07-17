<?php

    $args = array(
        'post_type' => 'video',
        'posts_per_page' => -1
    );
    $query = new WP_Query( $args );
    $postCount;
?>

<section class="row video-list">

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <? $youtube_url = get_field('youtube_url'); ?>

    <? if (++$postCount == 1) {
        // FIRST POST
    } ?>

    <? if ($postCount == ($wp_query->post_count - 1)): // LAST POST - add end class to make it float left ?>
        <div class="small-12 medium-4 columns video-item video-play-overlay end">
    <? else: ?>
        <div class="small-12 medium-4 columns video-item video-play-overlay">
    <? endif; ?>

            <? if ( has_post_thumbnail() ): ?>
                <a href="#" class="video-placeholder" data-url="<?=$youtube_url;?>" title="Play video: <?php the_title_attribute();?>">
                    <? the_post_thumbnail('small-blog-post'); ?>
                </a>
            <?php endif; ?>
            <h5>
                <a href="#" class="video-placeholder" data-url="<?=$youtube_url;?>" title="Play video: <?php the_title_attribute();?>">
                    <?php the_title(); ?>
                </a>
            </h5>

            <div class="excerpt">
                <p>
                    <?
                    /**
                     * Get special excerpt if it exists
                     */
                    if (get_field('excerpt')) {
                        the_field('excerpt');
                    } else {
                        the_excerpt();
                    }
                    ?>
                </p>
                <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?> - Kollektiv Gallery Blog"><small class="continue-readling-link">More information about the video.</small></a>
            </div>
        </div><!-- /.column -->

    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>

<div class="overlay overlay-video background-dark"></div>
<div class="video-container">
    <div class="flex-video"></div>
</div>

