<?php
/**
 * List post excerpts for archive page
 */
?>


<? if (  have_posts() ) : ?>

    <div class="text-center page-title">
        <h3 class="underline uppercase">
           <? wp_title( '' ); ?>
        </h3>
    </div>

    <section class="row blog-list">

        <? while ( have_posts() ) : the_post(); ?>

            <? if (++$postCount == 1) {
                // FIRST POST
            } ?>



<!--            --><?// if ($postCount == (post_count)): // LAST POST - add end class to make it float left?>
<!--                <div --><?// post_class('small-12 small-medium-6 medium-4 columns blog-item end'); ?><!-->
<!--            --><?// else: ?>
                <div <? post_class('small-12 small-medium-6 medium-4 columns blog-item'); ?>>
<!--            --><?// endif; ?>

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

<?php endif; ?>