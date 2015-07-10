<?php
/**
 * List post excerpts for search page
 */
?>
<?

    global $query_string;

    $query_args = explode("&", $query_string);

    global $wp_query;
    $total_results = $wp_query->found_posts; // variable to store total results

    $search_query = array(
        'posts_per_page' => 12
    );

    foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
    } // foreach

    $search = new WP_Query($search_query);
    $postCount = 0;
?>


<? if (  $search->have_posts() ) : ?>

    <div class="text-center page-title">
        <h3 class="underline uppercase">
            <? echo '<b>'.get_search_query().'</b>'.' - Here&#8217;s what we&#8217;ve found:'; ?>
        </h3>
    </div>

    <section class="row blog-list">

        <? while ( $search->have_posts() ) : $search->the_post(); ?>

            <? if (++$postCount == 1) {
                // FIRST POST
            } ?>



            <? if ($postCount == ($search->post_count)): // LAST POST - add end class to make it float left?>
                <div <? post_class('small-12 small-medium-6 medium-4 columns blog-item end'); ?>>
            <? else: ?>
                <div <? post_class('small-12 small-medium-6 medium-4 columns blog-item'); ?>>
            <? endif; ?>

                <? if ( has_post_thumbnail() ): ?>
                    <a href="<? the_permalink(); ?>">
                        <? the_post_thumbnail('small-blog-post'); ?>
                    </a>
                <?php endif; ?>
                <h5>
                    <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h5>

                <p class="meta"><? the_date(); ?> | <?php the_category(', '); ?></p>

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
                    <a href="<?php the_permalink() ?>"  title="<?php the_title_attribute(); ?> - Kollektiv Gallery Blog"><small class="continue-readling-link">Continue reading</small></a>
                </div>

            </div>

        <? endwhile; ?>
    </section>

<? else : ?>

    <div class="text-center page-title">
        <h3 class="underline uppercase">Sorry, we didn't find anything</h3>
    </div>

    <section class="row page text-center">
        <p>We have no idea what you are searching for. Are you even on the right website?</p>
        <p>Kidding!</p>
        <p>Check the spelling or take a look through the menu to find what you were looking for.</p>
        <p>In the meantime...</p>
    </section>

    <? get_template_part('content-templates/loop', 'home');?>

<?php endif; wp_reset_postdata(); ?>