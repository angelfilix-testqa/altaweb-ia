<footer class="site-footer" id="site-footer">
	<div class="container site-footer__inner">

		<!-- Col 1: Logo + tagline -->
		<div class="site-footer__brand">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
				<img
					src="<?php echo esc_url( aw_get_logo() ); ?>"
					alt="<?php bloginfo( 'name' ); ?>"
					width="140"
					height="35"
					loading="lazy"
				>
			</a>
			<p class="site-footer__tagline">Productos digitales que piensan contigo.</p>
		</div>

		<!-- Col 2: Nav footer -->
		<nav class="site-footer__nav" aria-label="<?php _e( 'Navegación footer', 'altaweb-ia' ); ?>">
			<?php
			wp_nav_menu( [
				'theme_location' => 'footer',
				'menu_class'     => 'site-footer__nav-list',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => function() {
					echo '<ul class="site-footer__nav-list">';
					echo '<li><a href="' . esc_url( home_url( '/#servicios' ) ) . '">Servicios</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/#trabajo' ) ) . '">Trabajo</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/lab/' ) ) . '">Lab</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/#contacto' ) ) . '">Contacto</a></li>';
					echo '</ul>';
				},
			] );
			?>
		</nav>

		<!-- Col 3: Contacto -->
		<div class="site-footer__contact">
			<p class="eyebrow">Contacto</p>
			<a href="mailto:hola@altaweb.ia" class="site-footer__email">hola@altaweb.ia</a>
		</div>

	</div>

	<!-- Bottom bar -->
	<div class="site-footer__bottom">
		<div class="container">
			<span class="site-footer__copy">
				&copy; <?php echo date( 'Y' ); ?> Altaweb.ia — Todos los derechos reservados.
			</span>
			<span class="site-footer__legal">
				<a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacidad</a>
			</span>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
