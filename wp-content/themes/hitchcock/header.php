<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6192870371125666",
    enable_page_level_ads: true
  });
</script>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>
		
		<div class="navigation">
			
			<div class="section-inner">
				
				<ul class="main-menu">
																		
					<?php 
					if ( has_nav_menu( 'primary' ) ) {

						$nav_args = array( 
							'container' 		=> '',
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary',
						);
																		
						wp_nav_menu( $nav_args );

					} else {

						$list_pages_args = array(
							'container' => '',
							'title_li' 	=> ''
						);

						wp_list_pages( $list_pages_args );

					} 
                                        
					?>
					
					<li class="header-search">
						<form method="get" class="search-form" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
							<input type="search" class="search-field" name="s" placeholder="<?php _e( 'Search Form', 'hitchcock' ); ?>" /> 
							<a class="search-button" onclick="document.getElementById( 'search-form' ).submit(); return false;"><div class="fa fw fa-search"></div></a>
						</form>
					</li>
					
				</ul>
				
				<div class="clear"></div>
				
			</div><!-- .section-inner -->
			
			<div class="nav-toggle">
					
				<div class="bars">
					<div class="bar"></div>
					<div class="bar"></div>
					<div class="bar"></div>
				</div>
				
			</div><!-- .nav-toggle -->
			
			<div class="mobile-navigation">
			
				<ul class="mobile-menu">
																			
					<?php 
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( $nav_args );
					} else {
						wp_list_pages( $list_pages_args );
					}
					?>
					
				</ul>
				
				<?php get_search_form(); ?>
			
			</div><!-- .mobile-navigation -->
			
		</div><!-- .navigation -->
                

		<?php $image_image_url = get_header_image() ? get_header_image() : get_template_directory_uri() . '/images/bg.jpg'; ?>
		
		<div class="header-image" style="background-image: url( <?php echo $image_image_url; ?> );"></div>
	
		<div class="header section-inner">
		
              <?php if (is_home ()) {
           echo   '<div  class="custom-logo-link"><a href="http://www.unlimited-assembly.fr/"> <img src="wp-content/themes/hitchcock/images/pict_title.png" title="Ton titre" alt="Image"/></a> </div>'?>
                  <?php   }
                  
                   
                     
                     
                     else{
                         echo '<div  class="custom-logo-link"><a href="http://www.unlimited-assembly.fr/">  <img src="wp-content/themes/hitchcock/images/pict_title.png" title="Ton titre" alt="Image"/></a> </div>'?>
                    <?php }?>
                     
			<?php 
			
			if ( get_theme_mod( 'custom_logo' ) ) :

				hitchcock_custom_logo();
				
			else : 
				
				$title_type = is_singular() ? '2' : '1'; ?>
		
				
				
			<?php endif;
			
			if ( get_bloginfo( 'description' ) ) : ?>
			
				<p class="blog-description"><?php echo bloginfo( 'description' ); ?></p>
			
			<?php endif;
			
			if ( has_nav_menu( 'social' ) ) : ?>
			
				<ul class="social-menu">
							
					<?php 
					wp_nav_menu( array(
						'theme_location'	=>	'social',
						'container'			=>	'',
						'container_class'	=>	'menu-social',
						'items_wrap'		=>	'%3$s',
						'menu_id'			=>	'menu-social-items',
						'menu_class'		=>	'menu-items',
						'depth'				=>	1,
						'link_before'		=>	'<span class="screen-reader-text">',
						'link_after'		=>	'</span>',
						'fallback_cb'		=>	'',
					) );
					?>
					
				</ul><!-- .social-menu -->
			
			<?php endif; ?>
			
		</div><!-- .header -->