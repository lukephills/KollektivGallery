<? get_header(); ?>

<?
$section1_bg_image = get_field('section1_background_image');
$section2_bg_image = get_field('section2_background_image');
$section3_bg_image = get_field('section3_background_image');
$backup_background_colour = ( get_field('logo_colour') === 'white' ) ? '#000' : '#fff';
?>
<style type="text/css">
    .home .background-panel.main-artist-image {

        background: <?=$backup_background_colour;?> url(<?= $section1_bg_image['url'];?>) no-repeat center center;
        background-size: cover;
    }
    .home .background-panel.main-artist-image .credit a {
        color: <?= get_field('section1_credit_colour');?>;
        <? if (get_field('section1_image_credit_link')) { ?>text-decoration: underline;<?}?>
    }



    .home .background-panel.picture-interview {
        background: #ffffff url(<?= $section2_bg_image['url'];?>) no-repeat center center;
        background-size: cover;
    }
    .home .background-panel.picture-interview .credit a {
        color: <?= get_field('section2_credit_colour');?>;
        <? if (get_field('section2_image_credit_link')) { ?>text-decoration: underline;<?}?>
    }
    .home .background-panel.manual {
        background: #ffffff url(<?= $section3_bg_image['url'];?>) no-repeat center center;
        background-size: cover;
    }
    .home .background-panel.manual .credit a {
        color: <?= get_field('section3_credit_colour');?>;
        <? if (get_field('section3_image_credit_link')) { ?>text-decoration: underline;<?}?>
    }

    .home .background-panel.main-artist-image .credit a:hover,
    .home .background-panel.picture-interview .credit a:hover,
    .home .background-panel.manual .credit a:hover
    {
        color: #ffe746;
    }


    .home .background-panel.manual .social-media-follow a svg path {
        fill: <?= get_field('social_icon_colour');?>;
    }
    .home .background-panel.manual .social-media-follow a:hover svg path {
        fill: <?= get_field('social_icon_colour_hover');?>;
    }
</style>

<section class="background-panel main-artist-image left">

    <div class="circle background-light text-center subscribe-container">
        <div class="text-center subscribe-inner">
            <h4>SUBSCRIBE</h4>
            <p>Never miss another <br>opportunity or exhibition again</p>

            <form id="signup" action="//kollektivgallery.us7.list-manage.com/subscribe/post?u=20e49663c93adc0174c86ea9e&amp;id=746455a945" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate subscribe-form" target="_blank" novalidate>

                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email address" required>
                    <input class="subscribe-btn kollektiv-go-button" type="submit" value="" name="subscribe" id="mc-embedded-subscribe">

            </form>
        </div>
    </div>

    <div class="text-center leader">
        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <p><? the_content(); ?></p>

        <? endwhile; endif; ?>
    </div>

    <div class="credit">
        <? if (get_field('section1_background_image_link')): ?>
            <a href="<? the_field('section1_background_image_link');?>">
                <small><? the_field('section1_image_credit');?></small>
            </a>
        <? else: ?>
            <small><? the_field('section1_image_credit');?></small>
        <? endif; ?>
    </div>

</section>


<section class="background-panel picture-interview left">
    <div class="text-center leader">
        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <p><? the_field('section2_content'); ?></p>

        <? endwhile; endif; ?>
    </div>
    <div class="credit">
        <? if (get_field('section2_image_credit_link')): ?>
            <a href="<? the_field('section2_image_credit_link');?>">
                <small><? the_field('section2_image_credit');?></small>
            </a>
        <? else: ?>
            <small><? the_field('section2_image_credit');?></small>
        <? endif; ?>
    </div>
</section>

<section class="background-panel manual left">
    <div class="text-center leader">
        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <p><? the_field('section3_content'); ?></p>

        <? endwhile; endif; ?>
    </div>
    <div class="credit">
        <? if (get_field('section3_image_credit_link')): ?>
        <a href="<? the_field('section3_image_credit_link');?>">
            <small><? the_field('section3_image_credit');?></small>
        </a>
        <? else: ?>
            <small><? the_field('section3_image_credit');?></small>
        <? endif; ?>
    </div>

    <? include 'partials/social-icons.php'; ?>
</section>


<?php get_footer(); ?>