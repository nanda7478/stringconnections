<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer  class="site-footer">
		<div class="container max_width_container">
		<div class="row">
		<div class="col-lg-4 col-xl-4 col-md-4">
			<?php dynamic_sidebar('sidebar-2');?>
		</div>

		  <div class="col-lg-6 col-xl-6 col-md-6 text-md-right">
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="main-navigation mr-lg-n5" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'twentysixteen' ); ?>">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_class'     => 'list-inline',
								'container'      => false,
							)
						);
					?>
				</nav><!-- .main-navigation -->
			<?php endif; ?>
		
			</div>
			<div class="col-lg-2 col-xl-2 col-md-2 text-md-right">
				 	<ul class="list-inline string_footer_social">
				 		<li class="list-inline-item"><a href="<?php the_field('facebook_links', 'option');?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				 		<li class="list-inline-item"><a href="<?php the_field('twitter_link', 'option');?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				 		<li class="list-inline-item"><a href="<?php the_field('linkedin_link', 'option');?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				 	</ul>
			</div>
           </div>
		 </div>	
		</footer><!-- .site-footer -->
	
<script src="<?php bloginfo('template_url');?>/js/jquery.min.js"></script>
<script src="<?php bloginfo('template_url');  ?>/assets/bootstrap/js/bootstrap.js"></script>
<script src="<?php bloginfo('template_url');?>/js/owl.carousel.js"></script>
<script type="text/javascript">
	function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
<?php wp_footer(); ?>
</body>
</html>
