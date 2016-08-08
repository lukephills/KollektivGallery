<? get_header(); ?>

<div class="row page page-title">
    <div class="small-12 columns">
        <h1><?php the_title(); ?></h1>
    </div>
</div>

<section class="row page">
    <div class="small-12 columns">

        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article <? post_class('post'); ?>>

                <? the_content(); ?>

            </article>

            <? include 'partials/share-post.php'; ?>

            <? get_template_part('content-templates/related', 'lokal'); ?>

            <? comments_template(); ?>

        <?php endwhile; endif; ?>

    </div>

</section>


<? get_footer(); ?>