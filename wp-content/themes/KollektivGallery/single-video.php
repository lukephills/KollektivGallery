<? get_header(); ?>

    <div class="text-center page-title">
        <h2 class="underline uppercase">
            <?php the_title(); ?>
        </h2>
    </div>

<section class="row page">
    <div class="small-12 columns">
        <div class="single-video video-play-overlay">
            <? $youtube_url = get_field('youtube_url'); ?>

             <? if ( has_post_thumbnail() ): ?>
                <a href="#" class="video-placeholder  video-play-overlay" data-url="<?= $youtube_url;?>" title="Play video: <? the_title_attribute();?>">
                    <? the_post_thumbnail(); ?>
                </a>
            <? endif; ?>
        </div>

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <? post_class('post'); ?>>
            <? the_content(); ?>
        </article>
        <? endwhile; endif; ?>
    </div>
</section>


<div class="overlay overlay-video background-dark"></div>
<div class="video-container">
    <div class="flex-video"></div>
</div>

<? get_footer(); ?>