<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
		<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

	<body>
		<header class="clearfix">
			<div class="gc">
				<div class="col12 clearfix">
					<?php if ( get_theme_mod( 'header_logo' ) ) : ?>
					    <div class='site-logo'>
					        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
					        	<img src='<?php echo esc_url( get_theme_mod( 'header_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
					        </a>
					    </div>
					<?php else : ?>
					    <hgroup>
					        <h1 class='site-title'>
					        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
					        	<?php bloginfo( 'name' ); ?></a>
				        	</h1>
					    </hgroup>
					<?php endif; ?>
					<div class="header_nav">		
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
					</div>	
					<div class="header_nav_resp">
						<div class="burger_menu">
							<div class="burger-bar"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="header_bottom clearfix">
				<div class="gc">
					<div class="col5">
					<?if(!is_front_page()) {  ?>
						<div class="breadcrumb_container">
						<?=woocommerce_breadcrumb();?>
						</div>
						<? } ?>
							&nbsp;
					</div>
					<div class="col3">
						<div class="cart_header_container">
							<a class="cart-contents " href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'Vis din kurv' ); ?>"> 
							<img src="<?=get_template_directory_uri().'/assets/cart.png'?>" />
							<span><?php echo sprintf ( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> 
							Varer i kurven</span>
							</a>
						</div>		
					</div>
					<div class="col4">
						<div class="search_container">
							<img src="<?=get_template_directory_uri().'/assets/search_curve.png'?>" class="search_curve">
							<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
						</div>
					</div>		
				</div>
			</div>	
		</header>