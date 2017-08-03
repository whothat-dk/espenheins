	
	<footer>
		<div class="gc">
			<div class="col12 footer_facebook">
				<div class="vc_fa_iconbox_wrap ">
		            <div class="vc_fa_iconbox_container">
		                <a href="http://www.facebook.com" target="" class="vc_fa_iconbox_link">
		                <i class="fa fa-facebook vc_fa_icon" aria-hidden="true"></i>
		                Følg Espenheins Eftf. på Facebook
		                </a>
		            </div>
		        </div>
			</div>
		</div>
		<div class="fw clearfix">
			<div class="footer_top">
				<div class="col12">
					<div class="footer_logo">
				        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				        	<img src='<?php echo esc_url( get_theme_mod( 'footer_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
				        </a>
					</div>
				</div>
			</div>
			<div class="footer_bottom">
				<div class="col12">
					<img src="<?=get_template_directory_uri().'/assets/footer_curve.png'?>" class="footer_curve">
				</div>
				<div class="boxed clearfix pt80">
					<div class="col2">
						<div class="footer_menu_container">	
							<? $menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-menu-1']);?>
							<span class="footer_menu_title"><?= $menu->name; ?></span>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-1' ) ); ?>
						</div>
					</div>
					<div class="col2">
						<div class="footer_menu_container">	
							<? $menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-menu-2']);?>
							<span class="footer_menu_title"><?= $menu->name; ?></span>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-2' ) ); ?>
						</div>
					</div>
					<div class="col2">
						<div class="footer_menu_container">	
							<? $menu = wp_get_nav_menu_object(get_nav_menu_locations()['footer-menu-3']);?>
							<span class="footer_menu_title"><?= $menu->name; ?></span>
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu-3' ) ); ?>
						</div>
					</div>
					<div class="col3">
						<div class="footer_company_info">	

							<span class="footer_company"><?= get_theme_mod( 'footer_company' ); ?></span>
							<span class="footer_info"><?= get_theme_mod( 'footer_address' ); ?></span>
							<span class="footer_info"><?= get_theme_mod( 'footer_city' ); ?></span>
							<span class="footer_cvr">CVR: <?= get_theme_mod( 'footer_cvr' ); ?></span>
							<a href="tel:<?= get_theme_mod( 'footer_tel' ); ?>" class="footer_tel mt30">Tel. <?= get_theme_mod( 'footer_tel' ); ?></a>
							<a href="mailto:<?= get_theme_mod( 'footer_email' ); ?>" class="footer_mail"><?= get_theme_mod( 'footer_email' ); ?></a>
						</div>
					</div>
					<div class="col3">
						<div class="footer_logo_container">
				        	<img src='<?php echo esc_url( get_theme_mod( 'footer_logo_1' ) ); ?>'>
				        	<img src='<?php echo esc_url( get_theme_mod( 'footer_logo_2' ) ); ?>'>

						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<div class="resp_menu_container">
		<div class="resp_menu_logo anim animated-fast">
		    <div class='site-logo'>
		        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
		        	<img src='<?php echo esc_url( get_theme_mod( 'resp_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
		        </a>
		    </div>
		</div>
		<div class="resp_header_nav anim animated-fast">		
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
		</div>
		<div class="resp_menu_phone anim animated-fast">
			<div class="resp_menu_phone_container">
				<span>Espenheins Døgnvagt</span>
				<a href="tel:<?= get_theme_mod( 'header_phone' ); ?>"><?= get_theme_mod( 'header_phone' ); ?></a>
			</div>
		</div>		
	</div>
	<? wp_footer(); ?>
	</body>
</html>