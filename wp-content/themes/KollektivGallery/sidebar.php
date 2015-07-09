<!-- Secondary Column -->

<a href="#" id="entries-sidebar-button" class="menu-text show-for-large-up entries-sidebar-button">
	<h4>ENTRIES</h4>
	<div class="close-icon"><h4>CLOSE</h4></div>
</a>
<div id="entries-sidebar" class="entries-sidebar background-color">

	<?php if( !dynamic_sidebar( 'blog' ) ): ?>

		<h2 class="module-heading">Sidebar Setup</h2>
		<p>Please add widgets via the admin area!</p>

	<?php endif; ?>

</div>
