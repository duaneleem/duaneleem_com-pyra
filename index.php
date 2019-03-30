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
      <h1>Portfolio</h1>

      <ul class="breadcrumb">
        <li><a href="/"><i class="fa fa-home" aria-hidden="true"></i></a></li>
        <li class="active">Portfolio</li>
      </ul>
    </div>
	</header>
	
	<section id="primary" class="container">
		<div class="row">
			<main id="main" class="site-main">

				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

				</main><!-- #main -->
		</div><!-- .row -->
	</section><!-- #primary -->
</div><!-- #wrapper -->

<?php
get_sidebar();
get_footer();
