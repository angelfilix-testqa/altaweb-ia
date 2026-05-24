<?php
/*
 * Template Name: Página de Servicio
 */

get_header();

$slug = get_post_field( 'post_name', get_the_ID() );
$svc  = aw_get_service_data( $slug );

if ( ! $svc ) {
	wp_redirect( home_url( '/#servicios' ) );
	exit;
}

$illus_url = get_template_directory_uri() . '/assets/img/illustrations/' . $svc['illustration'];
?>

<main class="site-main" id="main">

<!-- ══════════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════════ -->
<section class="svc-hero aw-pattern-mesh">
	<div class="svc-hero__radial" aria-hidden="true"></div>

	<div class="container">
		<a href="<?php echo esc_url( home_url( '/#servicios' ) ); ?>" class="svc-back">
			<svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M9 2.5L4.5 7 9 11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
			Servicios
		</a>

		<div class="svc-hero__split">

			<!-- LEFT: copy -->
			<div class="svc-hero__left">
				<div class="svc-hero__eyebrow">
					<span class="svc-hero__num"><?php echo esc_html( $svc['num'] ); ?></span>
					<span><?php echo esc_html( $svc['title'] ); ?></span>
				</div>

				<h1 class="svc-hero__h1"><?php echo esc_html( $svc['tagline'] ); ?></h1>

				<p class="svc-hero__intro"><?php echo esc_html( $svc['intro'] ); ?></p>

				<div class="svc-hero__tags">
					<?php foreach ( $svc['tags'] as $tag ) : ?>
						<span class="svc-tag"><?php echo esc_html( $tag ); ?></span>
					<?php endforeach; ?>
				</div>

				<div class="svc-hero__ctas">
					<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--primary">
						Empezar proyecto <span aria-hidden="true">→</span>
					</a>
					<a href="#proceso" class="btn btn--ghost-light">
						Ver proceso <span aria-hidden="true">↓</span>
					</a>
				</div>
			</div>

			<!-- RIGHT: illustration double-bezel -->
			<div class="svc-hero__right" aria-hidden="true">
				<div class="svc-illus-outer">
					<div class="svc-illus-inner">
						<img src="<?php echo esc_url( $illus_url ); ?>" alt="" loading="eager" width="400" height="400">
					</div>
				</div>
			</div>

		</div><!-- .svc-hero__split -->

		<!-- Stats bar -->
		<?php if ( ! empty( $svc['stats'] ) ) : ?>
		<div class="svc-stats-bar">
			<?php foreach ( $svc['stats'] as $stat ) : ?>
				<div class="svc-stat">
					<span class="svc-stat__num"><?php echo esc_html( $stat['num'] ); ?></span>
					<span class="svc-stat__label"><?php echo esc_html( $stat['label'] ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

	</div>
</section>

<!-- ══════════════════════════════════════════════════════════
     QUÉ INCLUYE
══════════════════════════════════════════════════════════ -->
<section class="section svc-includes" aria-labelledby="includes-title">
	<div class="container">

		<div class="svc-section-header">
			<div>
				<span class="eyebrow">— Qué incluye</span>
				<h2 class="section__title" id="includes-title">
					Todo lo que necesitas.<br>Nada de lo que no.
				</h2>
			</div>
			<p class="svc-section-header__sub">
				Sin paquetes genéricos. Cada entrega está diseñada para resolver el problema real, no para parecer completa en un PDF.
			</p>
		</div>

		<div class="inc-bento">
			<?php foreach ( $svc['includes'] as $i => $item ) : ?>
			<div class="inc-card inc-card--<?php echo $i < 2 ? 'wide' : 'reg'; ?>">
				<span class="inc-card__num"><?php echo str_pad( $i + 1, 2, '0', STR_PAD_LEFT ); ?></span>
				<h3 class="inc-card__title"><?php echo esc_html( $item['label'] ); ?></h3>
				<p class="inc-card__desc"><?php echo esc_html( $item['desc'] ); ?></p>
				<span class="inc-card__arrow" aria-hidden="true">→</span>
			</div>
			<?php endforeach; ?>
		</div>

	</div>
</section>

<!-- ══════════════════════════════════════════════════════════
     RESULTADOS
══════════════════════════════════════════════════════════ -->
<?php if ( ! empty( $svc['outcomes'] ) ) : ?>
<section class="section svc-outcomes section--dark" aria-labelledby="outcomes-title">
	<div class="container">

		<div class="section__header section__header--light">
			<span class="eyebrow">— Por qué vale cada euro</span>
			<h2 class="section__title" id="outcomes-title">
				Resultados concretos,<br>no promesas de agencia.
			</h2>
		</div>

		<div class="outcomes-grid">
			<?php foreach ( $svc['outcomes'] as $i => $out ) : ?>
			<div class="outcome-card">
				<div class="outcome-card__check" aria-hidden="true">
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none"><path d="M3.5 9.5l4 4 7-8" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/></svg>
				</div>
				<div>
					<h3 class="outcome-card__title"><?php echo esc_html( $out['title'] ); ?></h3>
					<p class="outcome-card__desc"><?php echo esc_html( $out['desc'] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

		<div class="outcomes-cta">
			<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--primary">
				Hablemos de tu proyecto <span aria-hidden="true">→</span>
			</a>
		</div>

	</div>
</section>
<?php endif; ?>

<!-- ══════════════════════════════════════════════════════════
     PROCESO
══════════════════════════════════════════════════════════ -->
<section class="section process section--dark" id="proceso" aria-labelledby="svc-process-title">
	<div class="container">
		<div class="section__header">
			<span class="eyebrow">— Cómo trabajamos</span>
			<h2 class="section__title" id="svc-process-title">
				Del primer mensaje<br>al resultado final.
			</h2>
		</div>

		<ol class="process__steps">
			<?php foreach ( $svc['process'] as $step ) : ?>
				<li class="process__step">
					<span class="process__num"><?php echo esc_html( $step['step'] ); ?></span>
					<div>
						<h3 class="process__step-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<p><?php echo esc_html( $step['desc'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>

<!-- ══════════════════════════════════════════════════════════
     PARA QUIÉN ES
══════════════════════════════════════════════════════════ -->
<section class="section svc-forwhom" aria-labelledby="forwhom-title">
	<div class="container">
		<div class="svc-forwhom__card">
			<div class="svc-forwhom__label">
				<span class="eyebrow" style="color:var(--aw-violet-300);">— Para quién es</span>
				<p class="svc-forwhom__meta">Este servicio es para ti si…</p>
			</div>
			<div class="svc-forwhom__body">
				<blockquote class="svc-forwhom__quote">
					"<?php echo esc_html( $svc['for_whom'] ); ?>"
				</blockquote>
				<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--primary">
					Cuéntanos tu proyecto <span aria-hidden="true">→</span>
				</a>
			</div>
		</div>
	</div>
</section>

<!-- ══════════════════════════════════════════════════════════
     OTROS SERVICIOS
══════════════════════════════════════════════════════════ -->
<section class="section svc-more" aria-labelledby="more-title">
	<div class="container">
		<div class="section__header">
			<span class="eyebrow">— También hacemos</span>
			<h2 class="section__title" id="more-title">Más servicios.</h2>
		</div>

		<div class="svc-more__grid">
			<?php
			$all = [
				'diseno-web-ux'       => [ 'num' => '01', 'title' => 'Diseño web & UX',     'stack' => 'Figma · Design Systems · UX' ],
				'integracion-ia'      => [ 'num' => '02', 'title' => 'Integración de IA',   'stack' => 'OpenAI · Claude · n8n' ],
				'desarrollo-a-medida' => [ 'num' => '03', 'title' => 'Desarrollo a medida', 'stack' => 'WordPress · Next.js · React' ],
				'estrategia-digital'  => [ 'num' => '04', 'title' => 'Estrategia digital',  'stack' => 'Auditoría · Roadmap · KPIs' ],
				'social-media'        => [ 'num' => '05', 'title' => 'Social Media',         'stack' => 'Instagram · LinkedIn · TikTok' ],
			];
			foreach ( $all as $s => $info ) :
				if ( $s === $slug ) continue;
				$page = get_page_by_path( $s );
				$href = $page ? get_permalink( $page->ID ) : home_url( '/#servicios' );
			?>
				<a href="<?php echo esc_url( $href ); ?>" class="svc-pill">
					<span class="svc-pill__num"><?php echo esc_html( $info['num'] ); ?></span>
					<span class="svc-pill__title"><?php echo esc_html( $info['title'] ); ?></span>
					<span class="svc-pill__stack"><?php echo esc_html( $info['stack'] ); ?></span>
					<span class="svc-pill__arrow" aria-hidden="true">→</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ══════════════════════════════════════════════════════════
     CTA FINAL
══════════════════════════════════════════════════════════ -->
<section class="section cta-band section--violet" aria-labelledby="svc-cta-title">
	<div class="container cta-band__inner">
		<div>
			<h2 class="cta-band__title" id="svc-cta-title">¿Listo para empezar?</h2>
			<p class="cta-band__sub">Cuéntanos de qué va y te respondemos en menos de 24 h.</p>
		</div>
		<a href="<?php echo esc_url( home_url( '/#contacto' ) ); ?>" class="btn btn--white">
			Hablemos →
		</a>
	</div>
</section>

</main>

<?php get_footer(); ?>
