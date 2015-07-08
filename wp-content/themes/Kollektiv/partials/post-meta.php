<ul class="post-meta no-bullet">
    <li class="author">
        <? if(!is_search()): ?>
            by <?php the_author_posts_link(); ?>
            on
        <? endif;?>
        <?php the_time( 'j F, Y' ); ?>
    </li>

    <? if (get_field(read_time)): ?>
        <li class="read-time">
            <? the_field(read_time); ?>
        </li>
    <? endif; ?>
</ul>