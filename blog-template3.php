<?php 
/*
Template Name: Blog Template 3
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
			
			<div class="posts_holder3 clearfix">
			<?php $post_count = 0; ?>
			<?php if(have_posts()) : ?>
				<div class="clearfix">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php if ((($post_count%3)==0) && ($post_count > 0)) { ?>
				</div><div class="clearfix">
				<?php } ?>
				<article <?php post_class(); ?>>
					<div class="article_inner">
						<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
							<div class="image">
								<?php echo slider_blog(get_the_ID());?>	
							</div>
						<?php } else {?>
							<?php if ( has_post_thumbnail() ) { ?>
									<div class="image">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										
												<?php	the_post_thumbnail('blog-type-3-big'); ?>
										</a>
									</div>
						<?php } } ?>
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						
						<div class="text">
							<div class="text_inner">
								<span><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
						<div class="info">
							<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></span>
							<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a></span>
						</div>
					</div>
				</article>
				<?php $post_count++; ?>
				<?php endwhile; ?>
				</div>
				<?php if($qode_options['pagination'] != "0") : ?>
				<?php pagination($wp_query->max_num_pages); ?>
				<?php endif; ?>
			<?php else: //If no posts are present ?>
				<div class="entry">                        
						<p><?php _e('No posts were found.', 'qode'); ?></p>    
				</div>
			<?php endif; ?>
			</div>
			
	<?php elseif($sidebar == "1" || $sidebar == "2"): ?>
		<div class="<?php if($sidebar == "1"):?>two_columns_66_33<?php elseif($sidebar == "2") : ?>two_columns_75_25<?php endif; ?> clearfix">
					<div class="column_left">
						<div class="column_inner">
								
							<div class="posts_holder3 clearfix">
							<?php $post_count = 0; ?>
							<?php if(have_posts()) : ?>
								<div class="clearfix">
								<?php while ( have_posts() ) : the_post(); ?>
								<?php if ((($post_count%3)==0) && ($post_count > 0)) { ?>
								</div><div class="clearfix">
								<?php } ?>
								<article <?php post_class(); ?>>
									<div class="article_inner">
									
										<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
									<div class="image">
										<?php echo slider_blog(get_the_ID());?>	
									</div>
								<?php } else {?>
									<?php if ( has_post_thumbnail() ) { ?>
									<div class="image">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<?php if($sidebar == 1) : ?>
											<?php	the_post_thumbnail('blog-type-3-small'); ?>
										<?php elseif($sidebar == 2) : ?>
											<?php	the_post_thumbnail('blog-type-3-medium'); ?>
										<?php endif; ?>
										</a>
									</div>
								
										<?php } } ?>
										<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										
										<div class="text">
											<div class="text_inner">
												<span><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
										<div class="info">
											<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></span>
											<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a></span>
										</div>
									</div>
								</article>
								<?php $post_count++; ?>
								<?php endwhile; ?>
								</div>
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
								<div class="posts_holder3 clearfix">
								<?php $post_count = 0; ?>
								<?php if(have_posts()) : ?>
									<div class="clearfix">
									<?php while ( have_posts() ) : the_post(); ?>
									<?php if ((($post_count%3)==0) && ($post_count > 0)) { ?>
									</div><div class="clearfix">
									<?php } ?>
									<article <?php post_class(); ?>>
										<div class="article_inner">
										
											<?php if(get_post_meta(get_the_ID(), "qode_use-slider-instead-of-image", true) == "yes") { ?>
										<div class="image">
											<?php echo slider_blog(get_the_ID());?>	
										</div>
									<?php } else {?>
										<?php if ( has_post_thumbnail() ) { ?>
										<div class="image">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php if($sidebar == 3) : ?>
												<?php	the_post_thumbnail('blog-type-3-small'); ?>
											<?php elseif($sidebar == 4) : ?>
												<?php	the_post_thumbnail('blog-type-3-medium'); ?>
											<?php endif; ?>
											</a>
										</div>
									
											<?php } } ?>
											<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
											
											<div class="text">
												<div class="text_inner">
													<span><?php _e('Posted by','qode'); ?> <?php the_author(); ?> <?php _e('in','qode'); ?> <?php the_category(', '); ?></span>
													<p><?php the_excerpt(); ?></p>
												</div>
											</div>
											<div class="info">
												<span class="left"><a href="<?php comments_link(); ?>"><?php comments_number( 'no comments', 'one comment', '% comments' ); ?></a></span>
												<span class="right"> <a href="<?php the_permalink(); ?>" class="more" title="<?php the_title_attribute(); ?>"><?php _e('READ MORE', 'qode'); ?></a></span>
											</div>
										</div>
									</article>
									<?php $post_count++; ?>
									<?php endwhile; ?>
									</div>
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