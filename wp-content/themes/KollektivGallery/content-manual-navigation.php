<?php

    $args = array(
        'post_type' => 'manual',
        'posts_per_page' => -1
    );
    $query = new WP_Query( $args );
?>

<nav id="nav-manual" class="show-for-large-up nav-manual">
    <a class="arrow-up"></a>

    <ul class="no-bullet">
        <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
            <? $letter = strtolower(get_field('letter')); ?>
            <a href="#<?=$letter;?>" class="manual-id-<?=$letter;?>">
                <li>
                    <span class="letter uppercase"><?if (strlen($letter) < 2){echo $letter;};?></span>

                    <span class="title"><? the_field('title') ?></span>
                </li>
            </a>

        <?php endwhile; endif; wp_reset_postdata(); ?>
    </ul>

    <a class="arrow-down"></a>
</nav>