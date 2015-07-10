<?php
/**
 * Author info - displays avatar and biography
 */
?>

<div class="blog-author">
    <div class="contents">
        <?
        $author_nicename = get_the_author_meta('user_nicename');
        $display_name = get_the_author_meta('display_name');
        $user = get_user_by('slug', $author_nicename);

        if(function_exists('has_wp_user_avatar')){
            if (has_wp_user_avatar($user->ID)){
                echo get_wp_user_avatar($user->ID, 'avatar');
            }
        }
        ?>

        <h4><? the_author_posts_link(); ?></h4>


        <? if (get_the_author_meta('description')): ?>
            <p><? the_author_meta( 'description' ); ?></p>
        <? endif; ?>

        <? if (!is_author()): ?>
            <p>
                <a href="<?= get_author_posts_url( $user->ID ); ?>"
                   alt="See more posts by <?= get_the_author_meta('display_name') ;?>"> See more posts by <?=$display_name; ?></a>
            </p>
        <? endif; ?>
    </div>
</div>