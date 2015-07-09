<?
/*
 * Loop template for related posts
 */
$related_posts = kollektiv_get_related_posts('kollektiv_artists');
$related_posts_amount = 2;

function displayAdjacentPost($side, $amount) {
    $post = ( $side === 'previous' ) ? get_previous_post() : get_next_post();
    $number_of_posts = ( is_numeric( $amount ) )?  $amount : 1;
    $postclass = ( $side === 'previous' ) ? 'prev': 'next';

    if ($post) {

        $args = array(
            'posts_per_page' => $number_of_posts,
            'post_type' => 'kollektiv_artists',
            'include' => $post->ID
        );

        $post = get_posts($args);

        foreach ($post as $p) {
            setup_postdata($p);
            ?>
            <div class="small-12 small-medium-6 medium-6 columns image <?= $postclass; ?>">
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
    } else {
        // we might be missing a post so do something
    }
}
?>

<section class="small-12 medium-8 large-6 small-centered columns text-center related-posts">
    <h4 class="section-strip"><a href="<?= get_site_url().'/artists'; ?>">View More Interviews</a></h4>

    <? if ($related_posts): ?>

        <?
        $i = 0;
        foreach ($related_posts as $related) {
            ?>

            <div class="small-12 small-medium-6 medium-6 columns image">
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
            displayAdjacentPost('previous', 1);
        }
        ?>

    <? else: // Display 2 other posts


        displayAdjacentPost('previous', 1);

        displayAdjacentPost('next', 1);

    endif;
    ?>

</section>
