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
	<?php if (is_home() && !is_front_page()) : ?>
		<!-- PAGE TITLE / BREADCRUMB -->
		<header id="page-title">
			<div class="container">
				<div class="col-lg-12">
					<h1><?php single_post_title(); ?></h1>

					<ul class="breadcrumb">
						<li><a href="https://duaneleem.com"><i class="fa fa-home" aria-hidden="true"></i></a></li>
						<li><a href="/"><i class="fab fa-wordpress margin-right-5p"></i> Blog</li>
						<li class="active"><?php single_post_title(); ?></li>
					</ul>
				</div>
			</div><!-- /.container -->
		</header>
	<?php else : ?>
		<!-- PAGE TITLE / BREADCRUMB -->
		<header id="page-title">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
					<h1><?php echo get_bloginfo( 'description', 'display' ); ?></h1>

					<ul class="breadcrumb">
					<li><a href="https://duaneleem.com"><i class="fa fa-home" aria-hidden="true"></i></a></li>
						<li class="active"><i class="fab fa-wordpress margin-right-5p"></i> Blog</li>
					</ul>
					</div><!-- /.col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</header>
	<?php endif; ?>

	<section id="primary" class="container">
		<div class="row">
			<main id="main" class="col-md-9">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					$intCount = 1;
					while ( have_posts() ) : the_post(); ?>
						<div class="col-sm-6" style="margin-bottom: 20px;">
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
						<?php if ($intCount % 2 == 0) { ?><div class="clearfix"></div><?php } $intCount++; ?>
					<?php endwhile;

					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</main><!-- #main -->

			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div><!-- .row -->
	</section><!-- #primary -->
</div><!-- #wrapper -->

<?php
get_footer();
