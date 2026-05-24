<?php
/**
 * Plantilla de respaldo — WordPress la usa cuando no hay otra específica.
 * La landing real está en front-page.php
 */
get_header(); ?>

<main class="site-main" id="main">
	<div class="container">

		<?php if ( have_posts() ) : ?>

			<div class="post-grid">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?>>
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>" class="card__thumb">
								<?php the_post_thumbnail( 'aw-card' ); ?>
							</a>
						<?php endif; ?>
						<div class="card__body">
							<span class="eyebrow"><?php echo get_the_date(); ?></span>
							<h2 class="card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="card__excerpt"><?php the_excerpt(); ?></p>
							<a href="<?php the_permalink(); ?>" class="btn btn--ghost">Leer más →</a>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<?php the_posts_pagination( [ 'prev_text' => '← Anterior', 'next_text' => 'Siguiente →' ] ); ?>

		<?php else : ?>

			<div class="not-found">
				<p><?php _e( 'No se encontró contenido.', 'altaweb-ia' ); ?></p>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php get_footer();
