<?php get_header(); ?>

<main class="site-main" id="main">

	<!-- ============================================================
	     HERO
	============================================================ -->
	<section class="hero aw-pattern-mesh" aria-labelledby="hero-title">
		<div class="hero__bg-grid" aria-hidden="true"></div>
		<div class="hero__glow" aria-hidden="true"></div>

		<div class="container hero__inner">
			<div class="hero__content">
				<span class="eyebrow">— Agencia digital · IA-native</span>
				<h1 class="hero__title" id="hero-title">
					Productos digitales<br>
					que <em>piensan</em> contigo.
				</h1>
				<p class="hero__sub">
					Diseñamos, construimos e integramos IA para negocios que quieren crecer más rápido de lo que su competencia espera.
				</p>
				<div class="hero__actions">
					<a href="#servicios" class="btn btn--primary">Ver servicios <span aria-hidden="true">↓</span></a>
					<a href="#contacto" class="btn btn--ghost">Hablemos →</a>
				</div>
			</div>

			<!-- Terminal decorativo -->
			<div class="hero__terminal" aria-hidden="true">
				<div class="terminal">
					<div class="terminal__bar">
						<span class="terminal__dot terminal__dot--red"></span>
						<span class="terminal__dot terminal__dot--yellow"></span>
						<span class="terminal__dot terminal__dot--green"></span>
						<span class="terminal__file">altaweb.ia</span>
					</div>
					<div class="terminal__body">
						<p><span class="t-mute">$</span> <span class="t-cmd">init</span> altaweb.ia</p>
						<p><span class="t-mute">→</span> Analizando contexto de marca<span class="t-blink">_</span></p>
						<p class="t-ok">✓ Identidad cargada</p>
						<p class="t-ok">✓ Stack definido</p>
						<p class="t-ok">✓ IA integrada</p>
						<p><span class="t-mute">→</span> Lanzando producto <span class="aw-cursor" aria-hidden="true"></span></p>
						<div class="aw-thinking" style="margin-top:12px;" aria-hidden="true">
							<div class="aw-thinking__dot"></div>
							<div class="aw-thinking__dot"></div>
							<div class="aw-thinking__dot"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="container">
			<div class="hero__stats">
				<div class="stat">
					<span class="stat__num">+40</span>
					<span class="stat__label">Negocios que ya crecen con nosotros</span>
				</div>
				<div class="stat">
					<span class="stat__num">100%</span>
					<span class="stat__label">IA nativa en cada proyecto — no es un extra</span>
				</div>
				<div class="stat">
					<span class="stat__num">3×</span>
					<span class="stat__label">Más rápido de entrega que la media del sector</span>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================
	     SERVICIOS — Bento Glass
	============================================================ -->
	<section class="services-bento" id="servicios" aria-labelledby="services-title">

		<!-- Glow de fondo -->
		<div class="services-bento__glow" aria-hidden="true"></div>

		<div class="container">

			<div class="services-bento__header">
				<span class="svc-eyebrow">Lo que hacemos</span>
				<h2 class="services-bento__title" id="services-title">
					Cinco servicios.<br>Un equipo que los ejecuta todos.
				</h2>
			</div>

			<!-- BENTO GRID -->
			<div class="bento-grid">

				<?php
				$svc_pages = [
					'diseno-web-ux'       => get_page_by_path( 'diseno-web-ux' ),
					'integracion-ia'      => get_page_by_path( 'integracion-ia' ),
					'desarrollo-a-medida' => get_page_by_path( 'desarrollo-a-medida' ),
					'estrategia-digital'  => get_page_by_path( 'estrategia-digital' ),
					'social-media'        => get_page_by_path( 'social-media' ),
				];
				function aw_svc_url( $slug, $pages ) {
					return $pages[ $slug ] ? esc_url( get_permalink( $pages[ $slug ]->ID ) ) : esc_url( home_url( '/#servicios' ) );
				}
				?>

				<!-- CARD FEATURED: Diseño web & UX -->
				<article class="bento-shell bento-shell--featured bento-shell--link" data-delay="0">
					<a href="<?php echo aw_svc_url( 'diseno-web-ux', $svc_pages ); ?>" class="bento-link-overlay" aria-label="Ver servicio: Diseño web &amp; UX"></a>
					<div class="bento-core">
						<div class="bento-core__content">
							<span class="bento-tag">01</span>
							<h3 class="bento-title">Diseño web & UX</h3>
							<p class="bento-desc">Interfaces que convierten visitas en clientes. Sistemas de diseño que escalan, no píxeles sueltos que se rompen al primer cambio.</p>
							<span class="bento-stack">Figma · Design Systems · UX Research</span>
							<span class="bento-cta" aria-hidden="true">Ver más →</span>
						</div>
						<div class="bento-core__illus" aria-hidden="true">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/03-capas.svg" alt="" loading="lazy">
						</div>
					</div>
				</article>

				<!-- CARD: Integración de IA -->
				<article class="bento-shell bento-shell--accent bento-shell--link" data-delay="80">
					<a href="<?php echo aw_svc_url( 'integracion-ia', $svc_pages ); ?>" class="bento-link-overlay" aria-label="Ver servicio: Integración de IA"></a>
					<div class="bento-core">
						<div class="bento-core__illus bento-core__illus--top" aria-hidden="true">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/02-pensamiento-ia.svg" alt="" loading="lazy">
						</div>
						<span class="bento-tag">02</span>
						<h3 class="bento-title">Integración de IA</h3>
						<p class="bento-desc">Chatbots, automatizaciones y pipelines de contenido. IA que trabaja en tu negocio mientras tú haces lo que importa.</p>
						<span class="bento-stack">OpenAI · Claude · LangChain · n8n</span>
						<span class="bento-cta" aria-hidden="true">Ver más →</span>
					</div>
				</article>

				<!-- CARD: Desarrollo a medida -->
				<article class="bento-shell bento-shell--link" data-delay="140">
					<a href="<?php echo aw_svc_url( 'desarrollo-a-medida', $svc_pages ); ?>" class="bento-link-overlay" aria-label="Ver servicio: Desarrollo a medida"></a>
					<div class="bento-core">
						<span class="bento-tag">03</span>
						<h3 class="bento-title">Desarrollo a medida</h3>
						<p class="bento-desc">WordPress, Next.js o lo que necesites. Sin page builders que ralentizan tu web ni código que solo el proveedor puede tocar.</p>
						<span class="bento-stack">WordPress · Next.js · PHP · React</span>
						<span class="bento-cta" aria-hidden="true">Ver más →</span>
						<div class="bento-core__illus bento-core__illus--bottom" aria-hidden="true">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/05-flujo.svg" alt="" loading="lazy">
						</div>
					</div>
				</article>

				<!-- CARD: Estrategia digital -->
				<article class="bento-shell bento-shell--link" data-delay="200">
					<a href="<?php echo aw_svc_url( 'estrategia-digital', $svc_pages ); ?>" class="bento-link-overlay" aria-label="Ver servicio: Estrategia digital"></a>
					<div class="bento-core">
						<span class="bento-tag">04</span>
						<h3 class="bento-title">Estrategia digital</h3>
						<p class="bento-desc">Auditoría, roadmap y acompañamiento. Para no volver a invertir en digital sin saber si va a funcionar.</p>
						<span class="bento-stack">Auditoría · Roadmap · Consultoría</span>
						<span class="bento-cta" aria-hidden="true">Ver más →</span>
						<div class="bento-core__illus bento-core__illus--bottom" aria-hidden="true">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/04-orbita.svg" alt="" loading="lazy">
						</div>
					</div>
				</article>

				<!-- CARD: Social Media -->
				<article class="bento-shell bento-shell--link" data-delay="260">
					<a href="<?php echo aw_svc_url( 'social-media', $svc_pages ); ?>" class="bento-link-overlay" aria-label="Ver servicio: Social Media"></a>
					<div class="bento-core">
						<span class="bento-tag">05</span>
						<h3 class="bento-title">Social Media</h3>
						<p class="bento-desc">Gestión con IA en el proceso. Publicamos, respondemos y optimizamos sin que tengas que mirar el móvil cada hora.</p>
						<span class="bento-stack">Instagram · LinkedIn · TikTok · IA</span>
						<span class="bento-cta" aria-hidden="true">Ver más →</span>
						<div class="bento-core__illus bento-core__illus--bottom" aria-hidden="true">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/illustrations/07-conversacion.svg" alt="" loading="lazy">
						</div>
					</div>
				</article>

			</div><!-- .bento-grid -->
		</div>
	</section>

	<!-- ============================================================
	     PROCESO
	============================================================ -->
	<section class="section process section--dark" id="proceso" aria-labelledby="process-title">
		<div class="container">
			<div class="process-prop">
				<div class="process-prop__bg" aria-hidden="true"></div>
				<div class="process-prop__glow" aria-hidden="true"></div>
				<div class="process-prop__mark" aria-hidden="true">
					<svg viewBox="0 0 140 140" xmlns="http://www.w3.org/2000/svg">
						<circle cx="70" cy="70" r="66" fill="none" stroke="var(--aw-violet-500)" stroke-width="6"/>
						<path d="M 70 30 L 110 100 L 30 100 Z" fill="none" stroke="var(--aw-violet-500)" stroke-width="8"/>
						<path d="M 70 56 L 96 96 L 44 96 Z" fill="var(--aw-violet-500)"/>
					</svg>
				</div>
				<div class="process-prop__inner">
					<div class="process-prop__header">
						<div class="process-prop__header-left">
							<span class="process-prop__eyebrow">Cómo trabajamos</span>
							<h2 class="process-prop__title" id="process-title">Cuatro pasos. <em>Sin vueltas.</em></h2>
							<p class="process-prop__header-sub">De la idea al lanzamiento, con visibilidad total en cada etapa.</p>
						</div>
					</div>

					<ol class="process-prop__steps">
						<li class="process-prop__step">
							<div class="process-prop__num-wrap">
								<span class="process-prop__num">01</span>
							</div>
							<h3 class="process-prop__step-title">Descubrir</h3>
							<p class="process-prop__step-desc">Entendemos tu negocio, tus usuarios y tus objetivos. Una semana de investigación que ahorra meses de iteración.</p>
							<div class="process-prop__time">≈ 1 semana</div>
						</li>
						<li class="process-prop__step">
							<div class="process-prop__num-wrap">
								<span class="process-prop__num">02</span>
							</div>
							<h3 class="process-prop__step-title">Diseñar</h3>
							<p class="process-prop__step-desc">Wireframes, sistema de componentes y prototipo navegable antes de escribir una línea de código.</p>
							<div class="process-prop__time">≈ 2 semanas</div>
						</li>
						<li class="process-prop__step">
							<div class="process-prop__num-wrap">
								<span class="process-prop__num">03</span>
							</div>
							<h3 class="process-prop__step-title">Construir</h3>
							<p class="process-prop__step-desc">Sprints cortos, entregas frecuentes, demos cada semana. Ves el avance en tiempo real.</p>
							<div class="process-prop__time">≈ 4–8 semanas</div>
						</li>
						<li class="process-prop__step">
							<div class="process-prop__num-wrap">
								<span class="process-prop__num">04</span>
							</div>
							<h3 class="process-prop__step-title">Lanzar &amp; escalar</h3>
							<p class="process-prop__step-desc">Deploy, formación del equipo y soporte post-lanzamiento. No desaparecemos cuando se publica.</p>
							<div class="process-prop__time">Continuo</div>
						</li>
					</ol>

					<div class="process-prop__connector" aria-hidden="true">
						<div class="process-prop__connector-fill"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ============================================================
	     TRABAJO (portfolio)
	============================================================ -->
	<section class="section work" id="trabajo" aria-labelledby="work-title">
		<div class="container">
			<div class="section__header">
				<span class="eyebrow">— Trabajo seleccionado</span>
				<h2 class="section__title" id="work-title">Proyectos que<br>hablan por sí solos.</h2>
			</div>

			<?php
			$work_query = new WP_Query( [
				'post_type'      => 'proyecto',
				'posts_per_page' => 4,
				'post_status'    => 'publish',
			] );

			if ( $work_query->have_posts() ) : ?>
				<div class="work__grid">
					<?php while ( $work_query->have_posts() ) : $work_query->the_post(); ?>
						<article class="work-card">
							<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="work-card__thumb" tabindex="-1" aria-hidden="true">
									<?php the_post_thumbnail( 'aw-card', [ 'loading' => 'lazy' ] ); ?>
								</a>
							<?php endif; ?>
							<div class="work-card__body">
								<span class="eyebrow"><?php the_terms( get_the_ID(), 'categoria_proyecto', '', ' · ' ); ?></span>
								<h3 class="work-card__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p><?php the_excerpt(); ?></p>
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			<?php else : ?>
				<!-- Placeholder cuando no hay proyectos aún -->
				<div class="work__grid">
					<?php foreach ( [ 'Proyecto ejemplo 1', 'Proyecto ejemplo 2', 'Proyecto ejemplo 3' ] as $i => $title ) : ?>
						<article class="work-card work-card--placeholder">
							<div class="work-card__thumb work-card__thumb--empty"></div>
							<div class="work-card__body">
								<span class="eyebrow">Web · IA</span>
								<h3 class="work-card__title"><?php echo esc_html( $title ); ?></h3>
								<p>Descripción del proyecto en una línea.</p>
							</div>
						</article>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		</div>
	</section>

	<!-- ============================================================
	     CTA INTERMEDIO
	============================================================ -->
	<section class="section cta-band section--violet" aria-labelledby="cta-title">
		<div class="container cta-band__inner">
			<div>
				<h2 class="cta-band__title" id="cta-title">¿Tienes algo en mente pero no sabes por dónde empezar?</h2>
				<p class="cta-band__sub">Cuéntanos tu proyecto y te respondemos antes de que acabe el día.</p>
			</div>
			<a href="#contacto" class="btn btn--white">Cuéntanos tu proyecto →</a>
		</div>
	</section>

	<!-- ============================================================
	     CONTACTO
	============================================================ -->
	<section class="section contact" id="contacto" aria-labelledby="contact-title">
		<div class="container contact__inner">

			<div class="contact__info">
				<span class="eyebrow">— Hablemos</span>
				<h2 class="contact__title" id="contact-title">Cuéntanos.<br>Sin formularios eternos.</h2>
				<p>Estamos disponibles para nuevos proyectos, colaboraciones y preguntas raras.</p>
				<a href="mailto:hola@altaweb.ia" class="contact__email">hola@altaweb.ia</a>
			</div>

			<div class="contact__form-wrap">
				<?php
				if ( function_exists( 'get_page_by_path' ) ) {
					// Si tienes Contact Form 7 instalado, pon aquí el shortcode:
					// echo do_shortcode( '[contact-form-7 id="XXXX" title="Contacto"]' );
				}
				?>
				<form class="contact-form" method="post" action="#contacto" novalidate>
					<?php wp_nonce_field( 'aw_contact', 'aw_nonce' ); ?>

					<div class="form-row">
						<label for="cf-name"><?php _e( 'Nombre', 'altaweb-ia' ); ?></label>
						<input type="text" id="cf-name" name="cf_name" required autocomplete="name" placeholder="Tu nombre">
					</div>

					<div class="form-row">
						<label for="cf-email"><?php _e( 'Email', 'altaweb-ia' ); ?></label>
						<input type="email" id="cf-email" name="cf_email" required autocomplete="email" placeholder="tu@email.com">
					</div>

					<div class="form-row">
						<label for="cf-message"><?php _e( 'Mensaje', 'altaweb-ia' ); ?></label>
						<textarea id="cf-message" name="cf_message" rows="5" required placeholder="Cuéntame sobre tu proyecto..."></textarea>
					</div>

					<button type="submit" class="btn btn--primary btn--full">
						Enviar mensaje →
					</button>
				</form>
			</div>

		</div>
	</section>

</main>

<?php get_footer();
