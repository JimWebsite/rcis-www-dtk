<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$sidebar = get_post_meta($id, "qode_show-sidebar", true);  ?>
	<?php get_header(); ?>
		<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
			<div class="container">
				<div class="title">
					<h1><span><?php the_title(); ?></span> <?php if(get_post_meta($id, "qode_page-subtitle", true)) { ?>/ <?php echo get_post_meta($id, "qode_page-subtitle", true) ?><?php } ?></h1>
				</div>
			</div>
		<?php } ?>
		
		<?php
		$revslider = get_post_meta($id, "qode_revolution-slider", true);
		if (!empty($revslider)){
			echo do_shortcode($revslider);
		}
		?>
		<div class="container">
		
		<?php if(($sidebar == "default")||($sidebar == "")) : ?>
			<?php if (have_posts()) : 
					while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>		
					<?php endwhile; ?>
				<?php endif; ?>
		<?php elseif($sidebar == "1" || $sidebar == "2"): ?>		
			
			<?php if($sidebar == "1") : ?>	
				<div class="two_columns_66_33 clearfix">
					<div class="column_left">
			<?php elseif($sidebar == "2") : ?>	
				<div class="two_columns_75_25 clearfix">
					<div class="column_left">
			<?php endif; ?>
					<?php if (have_posts()) : 
						while (have_posts()) : the_post(); ?>
						<div class="column_inner">
						
						<?php the_content(); ?>	
						</div>
				<?php endwhile; ?>
				<?php endif; ?>
			
							
					</div>
					<div class="column_right"><?php get_sidebar();?></div>
				</div>
			<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
				<?php if($sidebar == "3") : ?>	
					<div class="two_columns_33_66 clearfix">
						<div class="column_left"><?php get_sidebar();?></div>
						<div class="column_right">
				<?php elseif($sidebar == "4") : ?>	
					<div class="two_columns_25_75 clearfix">
						<div class="column_left"><?php get_sidebar();?></div>
						<div class="column_right">
				<?php endif; ?>
						<?php if (have_posts()) : 
							while (have_posts()) : the_post(); ?>
							<div class="column_inner">
							<?php the_content(); ?>		
							</div>
					<?php endwhile; ?>
					<?php endif; ?>
				
								
						</div>
						
					</div>
			<?php endif; ?>

	
	<?php get_footer(); ?>			