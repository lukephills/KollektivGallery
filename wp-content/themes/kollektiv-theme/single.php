<?php get_header(); ?>

<section class="page-text">
	<div class="artist-title" style="padding: 0 40px 0 0;">
		<h1 style="line-height: 51px; text-transform: uppercase; color: black; margin-bottom: 41px;">
		<?php the_title(); ?></h1>
			<small class="date-published">By Sophie Giblin, <?php echo get_the_date(); ?></small><br>
	</div>
	
	<div class="clearfix"></div>

	<div class="col-xs-12 .col-sm-12 col-md-12 artist-post">
			<?php if (have_posts()) : while (have_posts()) : the_post();
			    the_content();
			    echo setPostViews(get_the_ID());  /* SET UP THE POST VIEWS FUNCTION */
			endwhile; endif; ?>
			<p></p>
	</div>

	<div class="line-separator"></div>

	<div id="disqus_thread"></div>
  <script type="text/javascript">
      /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
      var disqus_shortname = 'kollektivgallery101'; // required: replace example with your forum shortname

      /* * * DON'T EDIT BELOW THIS LINE * * */
      (function() {
          var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
          dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
          (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
      })();
  </script>
  <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</section>


 <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'kollektivgallery101'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>

<?php get_footer(); ?>