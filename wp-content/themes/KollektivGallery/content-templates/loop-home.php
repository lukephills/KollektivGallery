<?php
/**
 * A listed post excerpt item
 */
?>

<?
$args = array(
    'posts_per_page' => 24,
    'category_name' => 'blog'
    // 'post__not_in' => array($featured_post_id)
);
$query = new WP_Query( $args );
$postCount = 0;
?>

<section class="row blog-list">

    <? if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

        <? if (++$postCount == 1) {
        // FIRST POST
        } ?>

        <? if ($postCount == ($wp_query->post_count - 1)): // LAST POST - add end class to make it float left?>
            <div class="small-12 medium-4 columns blog-item end">
        <? else: ?>
            <div class="small-12 medium-4 columns blog-item">
        <? endif; ?>

            <? if ( has_post_thumbnail() ): ?>
                <a href="<? the_permalink(); ?>">
                    <? the_post_thumbnail('small-blog-post'); ?>
                </a>
            <?php endif; ?>
           
            <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?>">
                <h5 class="blog-title"><?php the_title(); ?></h5>
                <div class="excerpt">
                    <p>
                        <?
                        /**
                        * Get special excerpt if it exists
                        */
                        if (get_field('excerpt')) {

                            echo substr(get_field('excerpt'), 0, 120) . "...";
                        } else {
                            the_excerpt();
                        }
                        ?>
                    </p>
                </div>
            </a>
        </div><!-- /.column -->

    <? endwhile; endif; wp_reset_postdata(); ?>

</section>
