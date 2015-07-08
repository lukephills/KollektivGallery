<?php
/*
	Template Name: Manual
*/
?>
<?php get_header(); ?>
    <div class="text-center page-title">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="underline uppercase"><? the_title(); ?></h2>

        <?php endwhile; endif; ?>

    </div>
    <section class="row content">

        <?php get_template_part('content', 'manual'); ?>
    </section>

<?php get_template_part('content', 'manual-navigation'); ?>

<?php get_footer(); ?>