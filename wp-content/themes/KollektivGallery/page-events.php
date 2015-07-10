<?php
/*
	Template Name: Events
*/
?>
<?php get_header(); ?>

    <div class="text-center page-title">

        <h2 class="underline uppercase">
            <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <? the_title(); ?>
            <? endwhile; endif; ?>
        </h2>
        
    </div>

	<div class="row page">
		<? the_content(); ?>
	</div>

    <?php get_template_part('content', 'events'); ?>

<?php get_footer(); ?>