<?
/*
	Template Name: Manual
*/
?>
<? get_header(); ?>

    <div class="text-center page-title">

        <? if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h2 class="underline uppercase">Manual</h2>

            <?$letter = get_field('letter');?>

            <? if ($letter): ?>
                <div id="dom-target-letter" style="display:none"><? echo htmlspecialchars(strtolower($letter));?></div>
                <script>
                    var domTargetLetter = document.getElementById("dom-target-letter");
                    var $scrollPoint = '#manual-id-' + domTargetLetter.textContent;
                    console.log($scrollPoint);
                    jQuery(document).ready(function ($) {
                        $.scrollTo(
                            $($scrollPoint),
                            {
                                duration: 100,
                                offset: {'left': 0, 'top': -80}
                            }
                        );
                    });
                </script>
            <? endif; ?>
        <? endwhile; endif; ?>

    </div>
    <section class="row content">
        <? get_template_part('content', 'manual'); ?>
    </section>

    <? get_template_part('content', 'manual-navigation'); ?>

<? get_footer(); ?>