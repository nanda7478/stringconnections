<?php
/*
 Display Template Name: Services
*/
get_header();
?>
<?php while(have_posts()): the_post();?>
<?php $image = get_field('service_header_image'); ?>
<div class="inner-pages-banner" style="background-image:url(<?php echo $image['url'];?>);">
 <div class="container inner-pages-content-table">
 <div id="post-<?php the_ID(); ?>" class="inner-pages-content-table-cell">
 <h1>
<?php the_title();?>
 </h1>
 <?php the_content();?>
</div>
</div>
</div>
<?php endwhile;?>

<section class="services_page_section">
	<div class="container max_wrap">
		<?php
		while(have_rows('services_repeater')): the_row();
		$image = get_sub_field('service_type_image');
		?>
		  <div class="item">
             <div class="row">
			<div class="col-lg-3 col-md-4">
				<img src="<?php echo $image['url'];?>" class="img-fluid" alt="<?php the_sub_field('service_type_title');?>">
			</div>
			<div class="col-lg-9 col-md-8">
				<h2 class="text-primary"><a  class="text-primary" href="<?php the_sub_field('learn_more_button_url');?>"><?php the_sub_field('service_type_title');?></a></h2>
				<?php the_sub_field('service_type_content');?>
				<div class="learn_more"><a class="btn btn-primary" href="<?php the_sub_field('learn_more_button_url');?>"><?php the_sub_field('learn_more_button_title');?></a></div>
			</div>
		</div>
		  </div>
		<?php endwhile;?>
	</div>
</section>

<?php
get_footer();
?>