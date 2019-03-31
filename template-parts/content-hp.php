<?php
/**
 * Template part for displaying posts on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DuaneLeem.com_Pyra
 */

?>

<!-- blogpost start -->
<article id="post-<?php the_ID(); ?>" <?php post_class("blogpost"); ?> style="border: solid .5px lightgray;">
	<div class="overlay-container">
		<!-- ======================================================================
			Thumbnail
		====================================================================== -->
		<?php if(has_post_thumbnail()) { ?>
			<?php the_post_thumbnail('post-thumbnail', array( 'class' => "img-responsive")); ?>
		<?php } else { ?>
			<!-- Display the default image if didn't choose one. -->
			<img src="<?php echo esc_url( wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ) , 'full' ) ); ?>" 
        class="img-responsive" 
        alt="Duane Leem" />
		<?php } ?>
		
		<?php 
			if ( is_single() ) :
				// Do nothing.
			else :
				echo '<a class="overlay-link" href="' . esc_url( get_permalink() ) . '"><i class="fa fa-link"></i></a>';
			endif; 
		?>
	</div>
	
	<header style="padding: 0 20px 0 20px;">
		<!-- ======================================================================
			Title
		====================================================================== -->
		<?php 
			if ( is_single() ) :
				the_title( '<h2 style="margin: 0;">', '</h2>' );
			else :
				the_title( '<h2 style="margin: 0;"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif; 
		?>
		
		<div class="post-info">
			<span class="post-date">
				<i class="icon-calendar"></i>
				<span><?php the_date("M j, Y"); ?></span>
			</span>
			<span class="submitted"><i class="icon-user-1"></i> by <?php the_author(); ?></span>
		</div>
	</header>
	
	<div class="blogpost-content" style="margin: 0 20px 0 20px;">
		<!-- ======================================================================
			Content
		====================================================================== -->
		<p><?php the_excerpt(); ?></p>
	</div>
	<?php if (!is_single()) : ?>
		<footer class="clearfix" style="padding: 10px 20px 10px 20px; background-color: #595959;">
			<div class="tags pull-left"><i class="icon-tags"></i> <?php the_category(', '); ?></div>
			<?php echo '<div class="link pull-right"><i class="icon-link"></i><a href="' . esc_url( get_permalink() ) . '">Read More</a></div>'; ?>
		</footer>
	<?php else : ?>
		<!-- Do nothing. -->
	<?php endif; ?>
</article>
<!-- blogpost end -->