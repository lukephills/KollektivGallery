<?php
/*
	Template Name: Videos
*/
?>
<?php get_header(); ?>

<div class="text-center page-title">

    <h2 class="underline uppercase">
        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <? the_title(); ?>
            <? the_content(); ?>
        <? endwhile; endif; ?>
    </h2>

</div>

<?php get_template_part('content', 'videos'); ?>

<?php get_footer(); ?>