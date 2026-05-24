<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main">
	<?php _e( 'Saltar al contenido', 'altaweb-ia' ); ?>
</a>

<header class="site-header" id="site-header">
	<div class="container site-header__inner">

		<!-- Logo -->
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo" aria-label="<?php bloginfo( 'name' ); ?>">
			<img
				src="<?php echo esc_url( aw_get_logo() ); ?>"
				alt="<?php bloginfo( 'name' ); ?>"
				width="160"
				height="40"
				loading="eager"
			>
		</a>

		<!-- Nav principal -->
		<nav class="site-nav" id="site-nav" aria-label="<?php _e( 'Navegación principal', 'altaweb-ia' ); ?>">
			<?php
			wp_nav_menu( [
				'theme_location' => 'primary',
				'menu_class'     => 'site-nav__list',
				'container'      => false,
				'fallback_cb'    => 'aw_fallback_menu',
			] );
			?>
		</nav>

		<!-- CTA -->
		<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--primary site-header__cta">
			Hablemos <span aria-hidden="true">→</span>
		</a>

		<!-- Hamburger (mobile) -->
		<button class="site-header__toggle" id="nav-toggle" aria-expanded="false" aria-controls="site-nav" aria-label="<?php _e( 'Abrir menú', 'altaweb-ia' ); ?>">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</button>

	</div>
</header>
<?php

function aw_fallback_menu() {
	echo '<ul class="site-nav__list">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Inicio</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#servicios' ) ) . '">Servicios</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#trabajo' ) ) . '">Trabajo</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/lab/' ) ) . '">Lab</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#contacto' ) ) . '">Contacto</a></li>';
	echo '</ul>';
}
