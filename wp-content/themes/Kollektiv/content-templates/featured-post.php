<?php
/**
 * A listed featured post item
 * Todo: Look at how main site is getting it's featured blog post and integrate that here
 */
?>

<?
$args = array(
    'orderby' => 'date',
    'posts_per_page' => 1
);
$query = new WP_Query( $args );
?>

<section class="row blog-list">


    <? if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <div class="clear">
            <div class="small-12 medium-8 column">
                <a href="<? the_permalink(); ?>"><? the_post_thumbnail('large-blog-post'); ?></a>
            </div>

            <div class="small-12 medium-4 column">
                <h2><a href="<? the_permalink(); ?>" ><? the_title(); ?></a></h2>
                <p class="meta"><? the_date(); ?> | <? the_category(', '); ?></p>

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
                </div>

            </div>
        </div><!-- /.blog-featured -->


        <?php
        foreach((get_the_category()) as $category) {
            $featured_post_cat = $category->cat_ID;
        } ?>

        <?
        // Store the featured post's id to not include in lower posts
        $featured_post_id = get_the_ID();
        ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>