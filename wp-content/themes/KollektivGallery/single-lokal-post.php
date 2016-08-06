<? get_header(); ?>

<div class="text-center page-title">
    <h2 class="underline">
        <?php the_title(); ?>
    </h2>
</div>

<section class="row page">
    <div class="small-12 columns">

        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article <? post_class('post'); ?>>

                <? the_content(); ?>

            </article>

            <? include 'partials/share-post.php'; ?>

            <? get_template_part('content-templates/related', 'posts'); ?>

            <? comments_template(); ?>

        <?php endwhile; endif; ?>

    </div>

</section>


<? get_footer(); ?>