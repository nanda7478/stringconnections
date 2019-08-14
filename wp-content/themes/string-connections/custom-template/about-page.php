<?php
/*
Display Template Name: About Us
*/
get_header();
?>
<section class="page_section py-50-30">
  <div class="container">
    <div class="about_sharrie_wrap max_wrap">
      <h2 class="text-primary"><?php the_field('about_title');?></h2>
      <div class="row">
        <div class="col-lg-12 mb-40">
          <div class="about_sharrie_content">
            <div class="about_sharrie_image float-right">
              <?php $image = get_field('about_sherrie_image');?>
              <img src="<?php echo $image['url'];?>" class="img-fluid" alt="<?php the_field('about_title');?>">
            </div>
            
            <div class="left_con"><?php the_field('about_content');?></div>
            
          </div>
          <div class="learn_more"><a class="btn btn-primary" href="<?php the_field('connect_sherrie_button_url');?>"><?php the_field('connect_sherrie_button_title');?></a></div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<section class="client_testimonial_section pt-2">
  <div class="container max_width_container">
    <div class="client_testimonial_wrap">
      <div class="top_heading_para text-center">
        <h2 class="block-tittle text-primary mb-4">Testimonials</h2>
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