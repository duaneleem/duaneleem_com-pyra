<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package DuaneLeem.com_Pyra
 */

get_header();
?>

<div id="wrapper">
	<!-- PAGE TITLE / BREADCRUMB -->
	<header id="page-title">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<h1><?php echo (is_home() && !is_front_page() ? single_post_title() : get_bloginfo( 'description', 'display' )); ?></h1>

				<ul class="breadcrumb">
					<li><a href="https://duaneleem.com"><i class="fa fa-home" aria-hidden="true"></i></a></li>
					<li <?php echo (is_home() && !is_front_page() ? "href='/'" : "class='active'" ) ?>><i class="fab fa-wordpress margin-right-5p"></i> Blog</li>
					<?php if (is_home() && !is_front_page() ) { ?><li class="active"><?php single_post_title(); ?></li><?php } ?>
				</ul>
				</div><!-- /.col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</header>



	<section id="primary" class="container">
		<div class="row">
			<main id="main" class="<?php (is_home() ? "col-md-12" : "col-md-9"); ?>">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					$intCount = 1;
					while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-4" style="margin-bottom: 20px;">
							<?php
								/*
								* Include the Post-Format-specific template for the content.
								* If you want to override this in a child theme, then include a file
								* called content-___.php (where ___ is the Post Format name) and that will be used instead.
								*/
								if (is_home()) {
									get_template_part( 'template-parts/content', "hp" );
								} else {
									get_template_part( 'template-parts/content', get_post_format() );
								} // if
							?>
						</div><!-- /col -->
						<?php if ($intCount % 3 == 0) { ?><div class="clearfix"></div><?php } $intCount++; ?>
					<?php endwhile;

					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</main><!-- #main -->

			<!-- Show sidebar if not homepage. -->
			<?php if (!is_home()) { ?>
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
			<?php } ?>
		</div><!-- .row -->
	</section><!-- #primary -->
</div><!-- #wrapper -->

<?php
get_footer();
