			<? if (is_front_page() ): ?>

			<? else: ?>
				<footer>
					<div class="small-12 medium-4 columns contact">
						<small>hello (at) kollektivgallery.com</small>
						<? include 'partials/email-subscribe.php'; ?>
					</div>
					<div class="small-12 medium-4 columns text-center company">
						<small class="copyright">&copy; Kollektiv Gallery&trade;</small>
					</div>
					<div class="small-12 medium-4 columns social">
						<? include 'partials/social-icons.php'; ?>
					</div>

				</footer>
			<? endif; ?>

		</div><!-- /.content-wrap -->
	</div><!-- /.container -->

<!--	TODO:		THIS IS TEMPORARY-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.16.1/TweenMax.min.js"></script>


	<?php wp_footer(); ?>

  </body>
</html>