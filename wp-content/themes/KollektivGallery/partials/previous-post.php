<?
$prevPost = get_previous_post();

if ($prevPost) {

    $args = array(
        'posts_per_page' => 1,
        'post_type' => 'kollektiv_artists',
        'include' => $prevPost->ID
    );

    $prevPost = get_posts($args);

    foreach ($prevPost as $post) {
        setup_postdata($post);
        ?>
        <div class="small-12 small-medium-6 medium-6 columns image prev">
            <a href="<? the_permalink(); ?>">
                <? the_post_thumbnail('main-artist-image'); ?>
            </a>

            <div class="background-dark text-light text-center label">
                <span><? the_title(); ?></span>
            </div>
        </div>

        <?
        wp_reset_postdata();
    } //end foreach
} // end if
?>