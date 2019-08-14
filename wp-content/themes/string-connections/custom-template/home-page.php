<?php
/*
Display Template Name: Home
*/
get_header();
?>
<?php while ( have_rows('home_slide_section') ) : the_row(); ?>
<?php $image = get_sub_field('home_header_image'); ?>
<div class="home-page-banner" style="background-image:url(<?php echo $image['url'];?>);">
  <div class="container d-table w-100 m-auto h-100">
    <div id="post-<?php the_ID(); ?>" class="d-table-cell align-middle">
        <div class="max-hiro">
              <ul class="list-inline">
        <?php while ( have_rows('home_header_title') ) : the_row(); ?>
        <li class="list-inline-item">
          <?php the_sub_field('title'); ?>
        </li>
        <?php endwhile;?>
      </ul>
      <div  class="text-home_header_content"><?php the_sub_field('home_header_content');?></div>
      <a class="btn btn-primary mt-3" href="<?php the_sub_field('home_button_url');?>"><?php the_sub_field('home_button_title');?></a>
        </div>
    </div>
  </div>
</div>
<?php endwhile;?>
<section class="newsletter_form_section bg-primary">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 col-md-12">
        <h2 class="mb-lg-0 mb-md-3">Sign Up For <br>My Newsletter</h2>
      </div>
       <div class="col-lg-9 col-md-12">
        <div class="tnp tnp-subscription">
          <form method="post" action="http://www.demosrvr.com/wp/stringconnections/?na=s" class="row" onsubmit="return newsletter_check(this)">
            <input type="hidden" name="nlang" value="">
            <div class="tnp-field col-lg-5 col-md-5 col-sm-4 tnp-field-firstname"><!-- <label>full name</label> --><input class="tnp-firstname w-100" type="text" name="nn" placeholder="Name*"></div>
            <div class="tnp-field col-lg-5 col-md-4 col-sm-4 tnp-field-email"><!-- <label>Email</label> --><input class="tnp-email w-100" type="email" name="ne" required placeholder="Email Address*"></div>
            <div class="tnp-field col-lg-2 col-md-3 col-sm-4 tnp-field-button"><input class="tnp-submit btn btn-secondary" type="submit" value="Sign Up">
          </div>
        </form>
      </div>
      </div>
  </div>
</div>
</section>
<section class="home_service_section  pt-25 clearfix">
<div class="container">
  <div class="top_heading_para text-center">
    <h2 class="block-tittle text-primary"><?php the_field('services_title');?></h2>
  </div>
  
  <div class="row">
    <?php
    while(have_rows('service_section_repeater')): the_row();
    $image = get_sub_field('service_icon');
    ?>
    <div class="col-md-3 col-sm-6 mb-40">
      <div class="service_work_box">
        <div class="service_work_img">
          <a href="<?php the_sub_field('service_url');?>">
            <img src="<?php echo $image['url'];?>" alt="" class="img-fluid d-block m-auto">
          </a>
        </div>
        <div class="service_work_content">
          <h4><a href="<?php the_sub_field('service_url');?>"><?php the_sub_field('service_title');?></a></h4>
        </div>
      </div>
    </div>
    <?php endwhile;?>
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
<section class="client_testimonial_section pt-2">
<div class="container max_width_container">
  <div class="client_testimonial_wrap">
     <div class="top_heading_para text-center">
    <h2 class="block-tittle text-primary"><?php the_field('testimonial_title');?></h2>
  </div>
    <div class="testimonial_slider mb-40">
      <div class="owl-carousel owl-theme">
        <?php
        $args = array(
        'post_type' => 'testimonial',
        'posts_per_page' => 5,
        'order' => 'ASC',
        );
        $query = new WP_Query($args);
        if($query->have_posts()):
        while($query->have_posts()): $query->the_post();
        ?>
        <div class="item">
          <div class="testimonial_owl">
            <div class="testimonial_box">
              <?php the_content();?>
              <h6><?php the_title();?>, <?php the_field('designation');?></h6>
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
  </div>
</div>
</section>
<?php
get_footer();
?>
<script type="text/javascript">
var owl = $('.owl-carousel');
owl.owlCarousel({
items:1,
loop:true,
margin:10,
autoplay:true,
dots:false,
nav: true,
smartSpeed: 900,
navText: ["<img src='<?php bloginfo('template_url');  ?>/assets/images/nav_left.png' alt=''>","<img src='<?php bloginfo('template_url');  ?>/assets/images/nav_right.png' alt=''>"],
autoplayTimeout:5000,
autoplayHoverPause:false
});
$('.play').on('click',function(){
owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
owl.trigger('stop.owl.autoplay')
})
</script>