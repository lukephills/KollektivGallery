<?php
/*
Template Name: Search Form
*/
?>
<form method="get" class="search-form" id="searchform" action="<?php bloginfo('home'); ?>/">
	<div>
    <input class="search-box" type="text" name="s" id="s" value="Search..." onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
		<input class="search-button" type="image" id="submitbtn" value="Search" src="<?php bloginfo( 'template_url' );?>/images/svg/search-icon.svg" alt="Search"  />
	</div>
</form>