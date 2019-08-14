<?php
/*
 Display Template Name: Coaching Service
*/
get_header();
?>
<section class="sub_service_section page_section  ">
	<div class="container">
		<div class="row">
			<div class="col-lg-7  py-50-30">
			<?php $image = get_field('sub_service_icon');?>
				<div class="sub_service_icon">
					
					<h2 class="text-primary"><img src="<?php echo $image['url'];?>" class="icon" alt="<?php the_field('sub_service_title');?>"><?php the_field('sub_service_title');?></h2>
				</div>
				<?php the_field('sub_service_content');?>
				<div class="learn_more"><a class="btn btn-primary" href="<?php the_field('connect_with_button_url');?>"><?php the_field('connect_with_button_title');?></a></div>
			</div>
			<?php $image1 = get_field('sub_service_image');?>
			<div class="col-lg-5">
				<div class="mb-md"><img src="<?php echo $image1['url'];?>" class="img-fluid" alt-="<?php the_field('sub_service_title');?>"></div>
			</div>
		</div>
	</div>
</section>

<section class="home_blog_section clearfix">
<div class="container max_width_container">
  
      <div class="row">
        <?php
        $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'order' => 'ASC',
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


<?php
get_footer();
?>