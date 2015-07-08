<? get_header(); ?>

<div class="text-center page-title">
    <h2 class="underline">
        <?php the_title(); ?>
    </h2>
</div>

<section class="row page">
    <div class="small-12 columns">

        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <? include 'partials/post-meta.php';?>

            <article <? post_class('post'); ?>>

                <? the_content(); ?>

            </article>

	        <? include 'partials/flattr-button.php'; ?>

            <? include 'partials/share-post.php'; ?>

            <? get_template_part( 'content-templates/author', 'single' ); ?>

            <? get_template_part('content-templates/related', 'posts'); ?>

            <? comments_template(); ?>

        <?php endwhile; endif; ?>

<!--        --><?// get_sidebar(); ?>
    </div>

</section>


<? get_footer(); ?>