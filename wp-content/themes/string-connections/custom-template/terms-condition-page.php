<?php
/*
 Display Template Name: Terms & Condition
*/
get_header();
?>
<?php
while(have_posts()): the_post();
?>

<section class="page_section  py-50-30">
  <div class="container">
    <div class="about_sharrie_wrap max_wrap">
      <h2 class="text-primary"><?php the_title();?></h2>
      <div class="row">
        <div class="col-lg-12 mb-40">
          <div class="about_sharrie_content">
            <div class="left_con"><?php the_field('privacy_policy_content');?></div>
            
          </div>
         
        </div>
      </div>
    </div>
  </div>
</section>

<?php endwhile;?>

<?php
get_footer();
?>