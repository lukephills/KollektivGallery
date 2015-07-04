<!DOCTYPE html>
<html>
<head>

	<title>
		<?php 
			wp_title( '|', true, 'right' ); 
			bloginfo( 'name' );
		?>
	</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>

	<?php wp_head(); ?>

	<link rel="shortcut icon" href="<?php bloginfo( 'template_url' );?>/assets/favicon.ico">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' );?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' );?>/style.css">


	
</head>
<body <?php body_class(); ?>>
	
	<header>
		<a href="#" class="menu-btn">
		  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="50 98.5 412 315">
		    <path d="M462 163.5H50v-65h412V163.5z M462 223.5H50v65h412V223.5z M462 348.5H50v65h412V348.5z"/>
		  </svg>
		</a>
    <div class="logo">
      <a href="<?php echo get_option ('home');?>">
        <div class="logo_k letter"></div>
        <div class="logo_o letter"></div>
        <div class="logo_g letter"></div>
        <div class="logo_a letter"></div>
	    </a>
    </div>

		<nav role="navigation" id="navigation">      	
      	<?php 
      		wp_nav_menu( array( 
	      		'container' => false,
	      		'menu_class' => 'navlinks',
	      		'theme_location' => 'primary'
	      	) ); 	
	    	?>
	  </nav>

    <?php get_search_form(); ?>

    <?php $cart_qty = eStore_get_total_cart_item_qty();
    			$current_url = get_bloginfo( 'template_url' ); // this needs to store not echo!!!
    			$home_url = get_home_url();
	    		if ($cart_qty) {
	    			echo '
	    				<div class="shopping-cart-icon">
	    					<a href="'.$home_url.'/shop/checkout/">
	    						<img src="'.$current_url.'/images/icons/trolley.png">
	    						<span>'. $cart_qty . '</span>
	    					</a>
	    				</div>	
	    				';
	    		}	 
	   ?>   	
	</header>
	
