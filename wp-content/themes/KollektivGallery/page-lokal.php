<?php
/*
	Template Name: Lokal Stories
*/
?>
<?php get_header(); ?>
    <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="row blog-list page-title">
            <div class="small-12 column">
                <? the_post_thumbnail('full'); ?>   
            </div> 
        </div>
        <div class="row blog-list">
            <div class="small-12 column">
                <? the_content(); ?>
            </div> 
        </div>
    <? endwhile; endif; ?> 
    <?php get_template_part('content', 'lokal'); ?>
<?php get_footer(); ?>