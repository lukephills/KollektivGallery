<?php

    $args = array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'meta_key' => 'date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC'
    );
    $query = new WP_Query( $args );
	$live_events_num = 0;
?>

<section class="row content events-page">

	<? the_content(); ?>

    <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>

	    <?
	    $event_date = get_field('date');
	    $today_date = date('Ymd');
	    $day = DateTime::createFromFormat('Ymd', $event_date);

	    ?>

	    <? if ($event_date > $today_date): //up-coming events only ?>
		    <div class="small-12 small-medium-6 medium-4 large-3 columns image table">
			    <a href="<?php the_field('booking_link'); ?>" target="_blank">
				    <div class="background-dark text-light text-center abs event-date">
					    <span class="date"><? echo $day->format('jS'); ?>,</span>
					    <span class="time"><? the_field('time'); ?></span>
				    </div>
				    <?php the_post_thumbnail('main-artist-image', array( 'class' => 'width100' )); ?>
				    <div class="background-dark text-light text-center label">
					    <span><?php the_title(); ?></span>
				    </div>
			    </a>
		    </div>

		    <? $live_events_num++; ?>

	    <? endif; ?>

    <?php endwhile; endif; wp_reset_postdata(); ?>

	<? if ($live_events_num === 0): ?>

		<!--		No Events   -->

	<? endif; ?>

</section>



