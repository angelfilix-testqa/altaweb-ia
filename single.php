<?php get_header(); ?>

<main class="site-main" id="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>

			<!-- Header del artículo -->
			<header class="article-hero section--dark">
				<div class="container article-hero__inner">
					<div class="article-hero__meta">
						<a href="<?php echo esc_url( get_post_type_archive_link( 'post' ) ); ?>" class="article-hero__back">
							← Lab
						</a>
						<span class="article-hero__sep" aria-hidden="true">·</span>
						<span class="article-hero__date"><?php echo get_the_date( 'd M Y' ); ?></span>
						<span class="article-hero__sep" aria-hidden="true">·</span>
						<span class="article-hero__read"><?php echo aw_reading_time(); ?> min de lectura</span>
					</div>

					<h1 class="article-hero__title"><?php the_title(); ?></h1>

					<?php if ( has_excerpt() ) : ?>
						<p class="article-hero__intro"><?php the_excerpt(); ?></p>
					<?php endif; ?>

					<div class="article-hero__author">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 40, '', '', [ 'class' => 'article-hero__avatar' ] ); ?>
						<span><?php the_author(); ?></span>
					</div>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="article-thumb container">
					<?php the_post_thumbnail( 'aw-hero', [ 'loading' => 'eager', 'class' => 'article-thumb__img' ] ); ?>
				</div>
			<?php endif; ?>

			<!-- Contenido -->
			<div class="container article-layout">
				<div class="article-content entry-content">
					<?php the_content(); ?>
				</div>

				<!-- Sidebar -->
				<aside class="article-sidebar">
					<div class="article-sidebar__sticky">
						<div class="article-cta-box">
							<span class="eyebrow">¿Tienes un proyecto?</span>
							<p>Cuéntanos de qué va y te respondemos en menos de 24&nbsp;h.</p>
							<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--primary btn--full">
								Hablemos →
							</a>
						</div>
					</div>
				</aside>
			</div>

			<!-- Navegación entre artículos -->
			<div class="container article-nav">
				<?php
				$prev = get_previous_post();
				$next = get_next_post();
				?>
				<?php if ( $prev ) : ?>
					<a href="<?php echo get_permalink( $prev ); ?>" class="article-nav__item article-nav__item--prev">
						<span class="article-nav__label eyebrow">← Anterior</span>
						<span class="article-nav__title"><?php echo get_the_title( $prev ); ?></span>
					</a>
				<?php endif; ?>
				<?php if ( $next ) : ?>
					<a href="<?php echo get_permalink( $next ); ?>" class="article-nav__item article-nav__item--next">
						<span class="article-nav__label eyebrow">Siguiente →</span>
						<span class="article-nav__title"><?php echo get_the_title( $next ); ?></span>
					</a>
				<?php endif; ?>
			</div>

		</article>

	<?php endwhile; ?>

</main>

<?php get_footer();
