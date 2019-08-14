<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<?php $image = get_field('blog_header_image', get_option('page_for_posts')); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table text-center blog_center_heading">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell">
 <h1>
<?php the_field('blog_header_title', get_option('page_for_posts'));?>
 </h1>
 <?php the_field('blog_header_content', get_option('page_for_posts'));?>
</div>
</div>
</div>

<section class="categories_tags_section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="category_list">
			<h2>Sort By Category Tag:</h2>	<?php
  $cat_collection = array(
        'taxonomy'               => 'category',
        'orderby'                => 'name',
        'order'                  => 'ASC',
        'hide_empty'             => false,
        'include'                => array(),
        'exclude'                => array(1),
        'exclude_tree'           => array(),
        'number'                 => '',
        'offset'                 => '',
        'fields'                 => 'all',
        'name'                   => '',
        'slug'                   => '',
        'hierarchical'           => true,
        'search'                 => '',
        'name__like'             => '',
        'description__like'      => '',
        'pad_counts'             => false,
        'get'                    => '',
        'child_of'               => 0,
        'parent'                 => '',
        'childless'              => false,
        'cache_domain'           => 'core',
        'update_term_meta_cache' => true,
        'meta_query'             => ''
    );
 
  $collection_terms = get_terms( $cat_collection );
  ?>

   <ul class="list-inline">
 <?php
  foreach($collection_terms as $collection_terms_data){
 ?>
   	<li class="list-inline-item"><a href="<?php echo get_category_link($collection_terms_data->term_id);?>"><?php echo $collection_terms_data->name; ?></a></li>
  <?php } ?>
   </ul>
    </div>
			</div>
		</div>
	</div>
</section>

<section class="blog_page_section home_blog_section">
<div class="container max_width_container">
	<div class="row">

		<?php if ( have_posts() ) : ?>
			<?php
			// Start the loop.
			while ( have_posts() ) :
				the_post();
              ?>
			<div class="col-lg-4 col-md-4 mb-40">
				<div class="blog_work_box">
				<div class="blog_img"><a href="<?php the_permalink();?>">
					<?php
			if ( has_post_thumbnail() ) {
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
    if ( ! empty( $large_image_url[0] ) ) {
       
       // echo get_the_post_thumbnail( $post->ID, 'full' ); 
		 echo '<img src="' . esc_url( $large_image_url[0] ) . '" />';
        
    }
}
?> </a>
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
				</div></div>
			</div>
		</div></div>
			

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
