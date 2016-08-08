<?
/*
 * Loop template for related posts
 */
$related_posts = kollektiv_get_related_posts('lokal-post');
$related_posts_amount = 2;
?>

<section class="small-12 medium-8 large-6 small-centered text-center related-posts full-width">
    <h4 class="section-strip"><a href="<?= get_site_url().'/blog'; ?>">View Related Posts</a></h4>

    <? if ($related_posts): ?>

        <?
        $i = 0;
        foreach ($related_posts as $related) {
            ?>

            <div class="small-12 medium-6 columns image
                <? if ($i == 0) {
                    echo 'no-padding-left';
                } else echo 'no-padding-right';
            ?> ">
                <a href="<?php echo $related['permalink'] ?>">
                    <?php echo $related['thumb'] ?>
                    <div class="background-dark text-light text-center label">
                        <span><?php echo $related['title'] ?></span>
                    </div>
                </a>
            </div>

            <?
            if (++$i == $related_posts_amount) break;
        }

        if ($i === 1){ // display one other post
            $prevPost = get_previous_post();

            if ($prevPost) {

                $args = array(
                    'posts_per_page' => 1,
                    'include' => $prevPost->ID
                );

                $prevPost = get_posts($args);

                foreach ($prevPost as $post) {
                    setup_postdata($post);
                    ?>
                    <div class="small-12 medium-6 columns image no-padding-right">
                        <a href="<? the_permalink(); ?>">
                            <? the_post_thumbnail('main-artist-image'); ?>
                            <div class="background-dark text-light text-center label">
                                <span><? the_title(); ?></span>
                            </div>
                        </a>
                    </div>

                    <?
                    wp_reset_postdata();
                } //end foreach
            } // end if
        }
        ?>

    <? else: // Display 2 other posts ?>

        <?
        $prevPost = get_previous_post();

        if ($prevPost) {

            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );

            $prevPost = get_posts($args);

            foreach ($prevPost as $post) {
                setup_postdata($post);
        ?>
                <div class="small-12 medium-6 columns image no-padding-left">
                    <a href="<? the_permalink(); ?>">
                        <? the_post_thumbnail('main-artist-image'); ?>
                        <div class="background-dark text-light text-center label">
                            <span><? the_title(); ?></span>
                        </div>
                    </a>
                </div>

                <?
                wp_reset_postdata();
            } //end foreach
        } // end if

        $nextPost = get_next_post();

        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
        ?>
                <div class="small-12 medium-6 columns image no-padding-right">
                    <a href="<? the_permalink(); ?>">
                        <? the_post_thumbnail('main-artist-image'); ?>
                        <div class="background-dark text-light text-center label">
                            <span><? the_title(); ?></span>
                        </div>
                    </a>
                </div>
        <?
                wp_reset_postdata();
            } //end foreach
        } // end if ?>

    <? endif; ?>

</section>
