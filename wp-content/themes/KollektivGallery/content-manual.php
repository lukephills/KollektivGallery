<?php

	$num_posts = ( is_front_page() ) ? 4 : -1; //If front page is true only show 4 posts otherwise show all posts

    $args = array(
        'post_type' => 'manual',
        'posts_per_page' => $num_posts
    );
    $query = new WP_Query( $args );
?>

<section class="row page manual-content">

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

        <? $letter = strtolower(get_field('letter')); ?>

        <?if (strlen($letter) === 1):?>
<!--            <div id="manual-image---><?//=$letter;?><!--" class="manual-image manual-image---><?//=$letter;?><!-- manual-id---><?//=$letter;?><!--">-->
<!--                --><?// get_template_part("assets/images/manual-blocks/".get_field('letter'), 'block.svg' ) ?>
<!--            </div>-->
        <?endif;?>

        <a name="<?=$letter;?>" id="<?=$letter;?>"></a>

        <?php include 'manual-blocks.php'; ?>

        <section id="manual-id-<?=$letter;?>" class="background-color manual-item">
            <?if (strlen($letter) < 2):?>
                <h1 class="uppercase letter"><?=$letter;?></h1>
            <?endif;?>
            <h3 class="uppercase"><? the_field('title'); ?></h3>
            <? the_content(); ?>
        </section>



    <?php endwhile; endif; wp_reset_postdata(); ?>

</section>