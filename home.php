<?php get_header(); ?>

<main class="site-main" id="main">

	<!-- Hero del Lab -->
	<section class="lab-hero section--dark aw-pattern-mesh">
		<div class="container lab-hero__inner">
			<span class="eyebrow">— Lab</span>
			<h1 class="lab-hero__title">Ideas, casos y recursos<br>para el siguiente capítulo.</h1>
			<p class="lab-hero__sub">Reflexiones sobre IA, diseño web y estrategia digital para equipos que quieren ir más rápido.</p>
		</div>
	</section>

	<section class="section lab-posts">
		<div class="container">

			<?php if ( have_posts() ) : ?>
				<div class="lab-grid">
					<?php $i = 0; while ( have_posts() ) : the_post(); $i++;
						$illustration = get_post_meta( get_the_ID(), '_aw_illustration', true );
						$illus_url    = $illustration ? get_template_directory_uri() . '/assets/img/illustrations/' . $illustration : '';
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'lab-card' . ( $i === 1 ? ' lab-card--featured' : '' ) ); ?>>

						<a href="<?php the_permalink(); ?>" class="lab-card__thumb" tabindex="-1" aria-hidden="true">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'aw-card', [ 'loading' => 'lazy' ] ); ?>
							<?php else : ?>
								<div class="lab-card__thumb-bg aw-pattern-mesh">
									<?php if ( $illus_url ) : ?>
										<img class="lab-card__illus" src="<?php echo esc_url( $illus_url ); ?>" alt="" aria-hidden="true" loading="lazy">
									<?php endif; ?>
								</div>
							<?php endif; ?>
						</a>

						<div class="lab-card__body">
							<div class="lab-card__meta">
								<span class="eyebrow"><?php the_category( ' · ' ); ?></span>
								<span class="lab-card__date"><?php echo get_the_date( 'd M Y' ); ?></span>
							</div>
							<h2 class="lab-card__title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="lab-card__excerpt"><?php the_excerpt(); ?></p>
							<span class="lab-card__link">Leer artículo <span aria-hidden="true">→</span></span>
						</div>

					</article>
					<?php endwhile; ?>
				</div>

				<div class="lab-pagination">
					<?php the_posts_pagination( [ 'prev_text' => '← Anteriores', 'next_text' => 'Siguientes →', 'mid_size' => 2 ] ); ?>
				</div>

			<?php else : ?>
				<div class="lab-empty">
					<span class="eyebrow">— Próximamente</span>
					<h2>El primer artículo está en camino.</h2>
					<p>Escríbenos a <a href="mailto:hola@altaweb.ia">hola@altaweb.ia</a>.</p>
				</div>
			<?php endif; ?>

		</div>
	</section>

</main>

<?php get_footer();
