<?php get_header(); ?>

<main class="site-main" id="main">
	<div class="container not-found-page">
		<span class="not-found__code" aria-hidden="true">404</span>
		<span class="eyebrow">Página no encontrada</span>
		<h1 class="section__title">Este nodo no existe en la red.</h1>
		<p style="color: color-mix(in oklch, currentColor 60%, transparent); max-width: 400px; text-align:center;">
			<?php _e( 'La página que buscas se ha movido, eliminado o nunca existió.', 'altaweb-ia' ); ?>
		</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn--primary">
			← Volver al inicio
		</a>
	</div>
</main>

<?php get_footer();
