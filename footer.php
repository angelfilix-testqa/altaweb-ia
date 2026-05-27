<footer class="site-footer" id="site-footer">
	<div class="container site-footer__inner">

		<!-- Col 1: Brand + Newsletter + Social -->
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

			<form class="footer-newsletter" aria-label="<?php _e( 'Newsletter', 'altaweb-ia' ); ?>">
				<input type="email" placeholder="tu@email.com" aria-label="<?php _e( 'Tu email', 'altaweb-ia' ); ?>">
				<button type="submit" aria-label="<?php _e( 'Suscribirse', 'altaweb-ia' ); ?>">→</button>
			</form>

			<div class="footer-social">
				<a href="https://linkedin.com" target="_blank" rel="noopener" aria-label="LinkedIn" class="footer-social__link">
					<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
				</a>
				<a href="https://instagram.com" target="_blank" rel="noopener" aria-label="Instagram" class="footer-social__link">
					<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
				</a>
				<a href="https://twitter.com" target="_blank" rel="noopener" aria-label="X / Twitter" class="footer-social__link">
					<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L1.254 2.25H8.08l4.259 5.631 5.905-5.631zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
				</a>
				<a href="https://github.com" target="_blank" rel="noopener" aria-label="GitHub" class="footer-social__link">
					<svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18"><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
				</a>
			</div>
		</div>

		<!-- Col 2: Navegación -->
		<nav class="site-footer__nav" aria-label="<?php _e( 'Navegación footer', 'altaweb-ia' ); ?>">
			<p class="site-footer__nav-title"><?php _e( 'Navegación', 'altaweb-ia' ); ?></p>
			<ul class="site-footer__nav-list">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicio</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>">Servicios</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#trabajo' ) ); ?>">Trabajo</a></li>
				<li><a href="<?php echo esc_url( home_url( '/lab/' ) ); ?>">Lab</a></li>
				<li><a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>">Contacto</a></li>
			</ul>
		</nav>

		<!-- Col 3: Servicios -->
		<div class="site-footer__services">
			<p class="site-footer__nav-title"><?php _e( 'Servicios', 'altaweb-ia' ); ?></p>
			<ul class="site-footer__nav-list">
				<li><a href="<?php echo esc_url( home_url( '/diseno-web-ux/' ) ); ?>">Diseño web & UX</a></li>
				<li><a href="<?php echo esc_url( home_url( '/integracion-ia/' ) ); ?>">Integración IA</a></li>
				<li><a href="<?php echo esc_url( home_url( '/desarrollo-a-medida/' ) ); ?>">Desarrollo</a></li>
				<li><a href="<?php echo esc_url( home_url( '/estrategia-digital/' ) ); ?>">Estrategia digital</a></li>
				<li><a href="<?php echo esc_url( home_url( '/social-media/' ) ); ?>">Social Media</a></li>
			</ul>
		</div>

		<!-- Col 4: Legal -->
		<div class="site-footer__legal-col">
			<p class="site-footer__nav-title"><?php _e( 'Legal', 'altaweb-ia' ); ?></p>
			<ul class="site-footer__nav-list">
				<li><a href="<?php echo esc_url( get_privacy_policy_url() ); ?>">Privacidad</a></li>
				<li><a href="<?php echo esc_url( home_url( '/cookies/' ) ); ?>">Cookies</a></li>
				<li><a href="<?php echo esc_url( home_url( '/terminos/' ) ); ?>">Términos</a></li>
			</ul>
		</div>

	</div>

	<!-- Bottom bar -->
	<div class="site-footer__bottom">
		<div class="container">
			<span class="site-footer__copy">
				&copy; <?php echo date( 'Y' ); ?> Altaweb.ia — Todos los derechos reservados.
			</span>
			<span class="site-footer__contact-link">
				<a href="mailto:hola@altaweb.ia">hola@altaweb.ia</a>
			</span>
		</div>
	</div>
</footer>

<!-- Back to top -->
<button class="back-to-top" id="back-to-top" aria-label="<?php _e( 'Volver arriba', 'altaweb-ia' ); ?>">
	<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="20" height="20"><polyline points="18 15 12 9 6 15"></polyline></svg>
</button>

<!-- Toast global -->
<div class="toast" id="site-toast" role="status" aria-live="polite"></div>

<!-- Scroll progress -->
<div class="scroll-progress" id="scroll-progress" aria-hidden="true"></div>

<?php wp_footer(); ?>
</body>
</html>
