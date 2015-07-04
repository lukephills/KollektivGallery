<?php get_header(); ?>

<section id="home-container" class="whitebk">
	<div class="container">
		<div class="row top-row">
			<div class="col-xs-12 .col-sm-9 col-md-9">
				<div class="line-separator"></div>
	  			<div class="artist-title">
						<h1><?php the_title(); ?></h1>
		    			<small class="date-published">Published on <?php echo get_the_date(); ?></small>
					</div>
					<div class="artist-links">
						<?php 
							//echo get_the_tag_list('<div class="tags">',' ','</div>');
			    			$twitter = get_field('twitter');
			    			$website = get_field('website');
			    			$other = get_field('other_link');    			
				    	?>
				    	
				    	<?php if ($twitter): ?>
		    			<p>
		    				<a href='http://www.twitter.com/<?php echo str_replace("@","", $twitter); ?>'>
		    					<?php 
		    						echo "@";
		    						echo str_replace("@","", $twitter); 
		    					?>
		    				</a>	
		    			</p>
		    			<?php endif; ?>

		    			<?php if ($website): ?>
		    			<p>
		    				<a href='http://<?php echo str_replace("http://","", $website); ?>'>
		    					<?php echo str_replace("http://","", $website);	?>
		    				</a>	
		    			</p>
		    			<?php endif; ?>

		    			<?php if ($other): ?>
		    			<p>
		    				<a href='http://<?php echo str_replace("http://","", $other); ?>'>
		    					<?php echo str_replace("http://","", $other); ?>
		    				</a>	
		    			</p>
		    			<?php endif; ?>

		    			
					</div>

				<div class="clearfix"></div>
				<div class="line-separator"></div>

				
				<div class="col-xs-12 .col-sm-12 col-md-12 artist-post">
						<?php if (have_posts()) : while (have_posts()) : the_post();
						    the_content();
						    echo setPostViews(get_the_ID());  /* SET UP THE POST VIEWS FUNCTION */
						endwhile; endif; ?>
						<p></p>
						<small>Read <?php echo getPostViews(get_the_ID()); ?> times</small>
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


				</div>
			</div>	


			
			
				<?php
				$args = array('posts_per_page' => 4, 'post_type' => 'kollektiv_artists', 'orderby' => 'rand');
				$query = new WP_Query( $args );
				while ($query->have_posts()) : $query->the_post();
				?>
				<div class="col-xs-6 .col-sm-3 col-md-3">
				<li>
					<a href="<?php the_permalink(); ?>">
						<div class="artist-thumb-side">
							<?php the_post_thumbnail( 'main-artist-image' ); ?>
						</div>	
						<div class="artist-name">
							<p><?php the_title(); ?></p>
						</div>
					</a>	
				</li>
				</div>
				
				<?php 
					endwhile;
				?>	
				<!-- <small>
					<a href="<?php echo get_site_url(); ?>/artists/">
						more...
					</a>
				</small> -->
				
				 <!--?php dynamic_sidebar( 'sidebar-widgets' ); ?-->
			</div>
		</div>
	</div> 
</section>


<?php get_footer(); ?>