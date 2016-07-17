<? get_header(); ?>

    <div class="text-center page-title">

        <h2 class="underline uppercase">
            <? echo apply_filters( 'the_title', get_the_title( get_option( 'page_for_posts' ) ) ); ?>
        </h2>
        
    </div>

<!--? include( locate_template( 'content-templates/featured-post.php' ) ); ?-->

<? include( locate_template( 'content-templates/loop-home.php' ) ); ?>

<?// get_sidebar(); ?>

<? get_footer(); ?>