<?php if( get_the_post_thumbnail() ): ?>
    <div class="img-container">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
    </div>
<?php endif; ?>
