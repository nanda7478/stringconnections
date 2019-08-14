<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<section class="blog_page_section home_blog_section">
<div class="container max_width_container">
		<div class="top_heading_para text-center">
		<?php if ( have_posts() ) : ?>
        <?php
		the_archive_title( '<h2 class="block-tittle text-primary text-capitalize">', '</h2>' );
		?>
	<?php endif;?>
	  </div>
	<div class="row">

		<?php if ( have_posts() ) : ?>
			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
              ?>
			<div class="col-lg-4 col-md-4 mb-40">
				<div class="blog_work_box">
				<div class="blog_img">
					<?php
			if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    if ( ! empty( $large_image_url[0] ) ) {
       
       // echo get_the_post_thumbnail( $post->ID, 'full' ); 
		 echo '<img src="' . esc_url( $large_image_url[0] ) . '" />';
        
    }
}
?>
				</div>
				<div class="blog_inner">
					<div class="blog_per_details bg-primary">
              <span class="text-white"><span class="author_name">By: <?php echo get_the_author_meta( 'first_name' );?></span>
              <span class="date"><?php echo get_the_date('M j, Y'); ?></span>
              </span>
              <div class="post_category_name text-white float-right"><?php the_category() ?></div>
            </div>
				 <div class="blog_work_content">
              <div class="home_post_date_tag">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
			
			<?php $content = get_the_content();
            $trimmed_content = wp_trim_words( $content, 30, '...<a class="read_more_icon" href="'. get_permalink() .'">read more </a>' ); ?>
              <p><?php echo $trimmed_content; ?></p>
				</div>
			</div>
			</div></div>
			
           </div>
			<?php
			endwhile;
            ?>
            </div>
            
            <div class="row">
            <div class="col-lg-12">
            <?php
			// Previous/next page navigation.
			the_posts_pagination(
				array(
					'prev_text'          => __( 'Previous page', 'twentysixteen' ),
					'next_text'          => __( 'Next page', 'twentysixteen' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
				)
			);

			// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
      </div>
	<!-- .content-area -->
	</div>
</section>
<?php get_footer(); ?>
