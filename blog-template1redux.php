<?php 
/*
Template Name: Blog Template 1redux
*/ 
?>
<?php get_header(); ?>
<?php 
global $wp_query;
$id = $wp_query->get_queried_object_id();
$category = get_post_meta($id, "qode_choose-blog-category", true);
$post_number = get_post_meta($id, "qode_show-posts-per-page", true);
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
query_posts('post_type=post&paged='. $paged . '&cat=' . $category .'&posts_per_page=' . $post_number );
$sidebar = get_post_meta($id, "qode_show-sidebar", true); 
?>
			
	<?php if(!get_post_meta($id, "qode_show-page-title", true)) { ?>
	<div class="container">
		<div class="title">	
			<h1><span><?php echo get_the_title($id); ?></span> <?php if(get_post_meta($id, "qode_page-subtitle", true)) { ?>/ <?php echo get_post_meta($id, "qode_page-subtitle", true) ?><?php } ?></h1>
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
			<div class="posts_holder">
			
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
				<article <?php post_class(); ?>>
					<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
						<div class="image">
						
						<?php echo slider_blog(get_the_ID());?>	
						</div>
						<?php } else {?>
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="image">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							
									<?php the_post_thumbnail('blog-type-1-small'); ?>
							</a>
						</div>
						<?php } } ?>
					<div class="text">
						<div class="text_inner">
							
							<p><div class="peach-text"><?php the_time('M Y'); ?></div></p>							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a>
							
						</div>
					</div>
				</article>
					<?php endwhile; ?>
					<?php if($qode_options['pagination'] != "0") : ?>
					<?php pagination($wp_query->max_num_pages); ?>
					<?php endif; ?>
				<?php else: //If no posts are present ?>
					<div class="entry">                        
							<p><?php _e('No posts were found.', 'qode'); ?></p>    
					</div>
				<?php endif; ?>
				<?php wp_reset_query(); ?>
			</div>			
	<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
		<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> clearfix">
					<div class="column_left">
						<div class="column_inner">
							<div class="posts_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
										<div class="image">
											<?php echo slider_blog(get_the_ID());?>	
										</div>
									<?php } else {?>
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php if($sidebar == 1) : ?>
												<?php	the_post_thumbnail('blog-type-1-small'); ?>
											<?php elseif($sidebar == 2) : ?>
												<?php	the_post_thumbnail('blog-type-1-medium'); ?>
											<?php endif; ?>
											</a>
										</div>
									
											<?php } } ?>
									<div class="text">
										<div class="text_inner">
											
											<p>Jaa lower</p>											<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>Jaa lower</a></h2>
											<p><?php the_excerpt(); ?></p>
											<a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a>
											<div class="info">
												<span class="left"><?php the_time('d M Y'); ?> <?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
												<!--<span class="right"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></span>blog 1 # 2-->
											</div>
										</div>
									</div>
								</article>
									<?php endwhile; ?>
									<?php if($qode_options['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages); ?>
									<?php endif; ?>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
					<div class="column_right">
					<?php get_sidebar(); ?>	
					</div>
				</div>
	<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
		<div class="<?php if($sidebar == "3"):?>two_columns_33_66<?php elseif($sidebar == "4") : ?>two_columns_25_75<?php endif; ?> clearfix">
					<div class="column_left">
					<?php get_sidebar(); ?>	
					</div>
					<div class="column_right">
						<div class="column_inner">
								
							<div class="posts_holder">
								<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article <?php post_class(); ?>>
									<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
										<div class="image">
											<?php echo slider_blog(get_the_ID());?>	
										</div>
									<?php } else {?>
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php if($sidebar == 3) : ?>
												<?php	the_post_thumbnail('blog-type-1-small'); ?>
											<?php elseif($sidebar == 4) : ?>
												<?php	the_post_thumbnail('blog-type-1-medium'); ?>
											<?php endif; ?>
											</a>
										</div>
									
											<?php } } ?>
									<div class="text">
										<div class="text_inner">
											
											<p>JAA #3 this might work</p>											<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?>JAA 3</a></h2>
											<p><?php the_excerpt(); ?></p>
											<a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a>
											<div class="info">
												<span class="left"><?php the_time('d M Y'); ?> <?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
												<!--<span class="right"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></span>blog1 #3-->
											</div>
										</div>
									</div>
								</article>
									<?php endwhile; ?>
									<?php if($qode_options['pagination'] != "0") : ?>
									<?php pagination($wp_query->max_num_pages); ?>
									<?php endif; ?>
								<?php else: //If no posts are present ?>
									<div class="entry">                        
											<p><?php _e('No posts were found.', 'qode'); ?></p>    
									</div>
								<?php endif; ?>
							</div>
							
						</div>
					</div>
					
				</div>
	<?php endif; ?>
	
				
			</div>
<?php get_footer(); ?>