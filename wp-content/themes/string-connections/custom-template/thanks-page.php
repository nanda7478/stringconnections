<?php
/*
 Display Template Name: Thanks
*/
get_header();
?>

<section class="contact_page_section">
	<div class="container">
		<div class="row align-items-top">
			<div class="col-lg-6 col-md-6 mb-40">
				<div class="contact_page">
                  <h2 class="text-primary"><img src="<?php bloginfo('template_url');  ?>/assets/images/Contact.png" alt="" class="h-icon"><?php the_field('contact_title');?></h2>
				  <p>Thank you for contacting us. We will respond as soon as possible.</p>
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6">
				<?php $image = get_field('contact_right_image');?>
				<img src="<?php echo $image['url'];?>" class="img-fluid" alt="<?php the_field('contact_title');?>">
			</div>
		</div>
	</div>
</section>


<?php
get_footer();
?>