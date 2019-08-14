<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<section class="page_section py-100-60 error-404 not-found bg-primary h-80vh">
  <div class="container d-table h-100 max_wrap w-100">
    <div class="about_sharrie_wrap  mb-40 d-table-cell align-middle h-100 w-100">
			    <h2 class="page-title text-white"><?php _e( 'Oops, something went wrong.', 'twentysixteen' ); ?></h2>
				<div class="page-content">
					<h1 class="text-white">404<small>Error</small></h1>
				</div><!-- .page-content -->
				<div class="learn_more"><a class="btn btn-outline-white" href="<?php echo get_home_url(); ?>">Go Back Home </a></div>
          
    </div>
  </div>
</section>

			

<?php get_footer(); ?>
