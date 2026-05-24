<?php get_header(); ?>

<main class="site-main page-main" id="main">
	<div class="container">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

				<?php if ( ! is_front_page() ) : ?>
					<header class="page-header">
						<h1 class="page-header__title"><?php the_title(); ?></h1>
					</header>
				<?php endif; ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile; ?>

	</div>
</main>

<?php get_footer();
