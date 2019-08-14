<?php
/**
* The template for displaying the header
*
* Displays all of the head element and everything up until the "site-content" div.
*
* @package WordPress
* @subpackage Twenty_Sixteen
* @since Twenty Sixteen 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif; ?>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url');  ?>/assets/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url');  ?>/css/custom.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://use.typekit.net/kzf5msv.css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="header">
			<nav class="navbar navbar-expand-md navbar-light bg-light">
				<div class="container">
				<?php $image = get_field('logo_section', 'option');?>
					<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo $image['url'];?>" alt="logo"></a>
					<button class="navbar-toggler border-0" onclick="openNav()" type="button">
					  <span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse " id="navbar-content">
						<?php
						wp_nav_menu( array(
						'theme_location' => 'primary', // Defined when registering the menu
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'depth'          => 2,
						'menu_class'     => 'navbar-nav ml-auto',
						'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
						) );
						?>
					</div>
					<ul class="list-inline string_header_social mb-0 ml-md-2">
						<li class="list-inline-item"><a href="<?php the_field('facebook_links', 'option');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="<?php the_field('twitter_link', 'option');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li class="list-inline-item"><a href="<?php the_field('linkedin_link', 'option');?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					</ul>
				</div>
			</nav>
			
		</div>
		<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		 <?php
						wp_nav_menu( array(
						'theme_location' => 'primary', // Defined when registering the menu
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'depth'          => 2,
						'menu_class'     => 'navbar-mob list-unstyled m-0',
						'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
						'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
						) );
						?>
		</div>