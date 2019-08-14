<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="blog-sub-page">
   
<div class="container">
<nav class="navigation post-navigation pb-4" role="navigation">
		
		<div class="nav-links"><div class="nav-previous"><a href="<?php echo site_url();?>/blog"> <span class="screen-reader-text">BACK TO BLOG</span> </a></div></div>
	</nav>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

		?>

		
		
		<div class="blog_single_content_deatils">
		<?php $image = get_field('blog_single_image');?>
		<div class="blog_single_image">
        <img src="<?php echo $image['url'];?>">
        </div>
			<div class="details-matter">
						
		     <?php the_title( '<h2 class="entry-title evenheading">', '</h2>' ); ?>
	      
	         <div class="author_date">
	         	<div class="row align-items-center no-gutters">
                  <div class="col">
                     <h6><?php echo get_the_date('M j, Y'); ?></h6>
                   </div>
                    <div class="col">
                     <ul class="list-inline d-flex align-items-center mb-0">
                     	<li class="list-inline-item">Share</li>
                     	<li class="list-inline-item"><?php echo do_shortcode("[social_share_button]"); ?> </li>
                     </ul>
                     
                   </div>
	         	</div>
            
			</div>

			<div class="entry-content">
			<?php the_content();?>
			</div>

		</div>
		</div>

            <?php
			// Include the single post content template.
			//get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.

			
           
			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post', 'twentysixteen' ) . '</span> ',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post', 'twentysixteen' ) . '</span> ',
				) );
			}

			// End of the loop.
		endwhile;
		?>

		
</div>

</div>


<section class="home_blog_section clearfix">
<div class="container max_width_container">
  
      <div class="row">
        <?php
        $args = array(
         'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 2, // Number of related posts that will be shown.
    'caller_get_posts'=>1
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ):
        while ( $query->have_posts() ) : $query->the_post();?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
        <div class="col-lg-4 col-md-4 mb-40">
          <div class="blog_work_box">
            <div class="blog_work_img">
           <a href="<?php the_permalink();?>">   <img src="<?php echo $image[0]; ?>" class="img-fluid" alt=""> </a>
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
                <h2><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h2>
                <?php $content = get_the_content();
              $trimmed_content = wp_trim_words( $content, 20, '...' ); ?>
              <p><?php echo $trimmed_content; ?></p>
              <a class="read_more_icon"href="<?php echo get_permalink() ?>">read more </a>
              </div>
            </div>
           
             </div>
          </div>
        </div>
        
        <?php
        endwhile;
        wp_reset_postdata();
        endif;
        ?>
      </div>
   
</div>

</section>


<?php get_footer(); ?>
