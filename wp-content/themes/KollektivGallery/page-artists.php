<?php
/*
	Template Name: Artist Interviews
*/
?>
<?php get_header(); ?>

    <div class="text-center page-title">
        <h1><? the_title(); ?></h1>
    </div>

    <?php get_template_part('content', 'artists'); ?>

<?php get_footer(); ?>