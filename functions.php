<?php
/**
 * Altaweb.ia — functions.php
 */

defined( 'ABSPATH' ) || exit;

/* ---------------------------------------------------------------
   Soporte del tema
--------------------------------------------------------------- */
function aw_setup() {
	load_theme_textdomain( 'altaweb-ia', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ] );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'wp-block-styles' );

	register_nav_menus( [
		'primary' => __( 'Menú principal', 'altaweb-ia' ),
		'footer'  => __( 'Menú footer', 'altaweb-ia' ),
	] );
}
add_action( 'after_setup_theme', 'aw_setup' );

/* ---------------------------------------------------------------
   Scripts y estilos
--------------------------------------------------------------- */
function aw_enqueue_assets() {
	// Google Fonts
	wp_enqueue_style(
		'aw-google-fonts',
		'https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap',
		[],
		null
	);

	// Tokens + estilos del tema
	wp_enqueue_style(
		'aw-tokens',
		get_template_directory_uri() . '/assets/css/tokens.css',
		[],
		'2.0.0'
	);

	wp_enqueue_style(
		'aw-main',
		get_stylesheet_uri(),
		[ 'aw-tokens' ],
		'2.0.0'
	);

	wp_enqueue_style(
		'aw-animations',
		get_template_directory_uri() . '/assets/css/animations.css',
		[ 'aw-tokens' ],
		'2.0.0'
	);

	wp_enqueue_style(
		'aw-patterns',
		get_template_directory_uri() . '/assets/css/patterns.css',
		[ 'aw-tokens' ],
		'2.0.0'
	);

	wp_enqueue_style(
		'aw-theme',
		get_template_directory_uri() . '/assets/css/theme.css',
		[ 'aw-main', 'aw-animations', 'aw-patterns' ],
		'2.0.0'
	);

	// JS principal
	wp_enqueue_script(
		'aw-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		'2.0.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'aw_enqueue_assets' );

/* ---------------------------------------------------------------
   Tamaño de imágenes
--------------------------------------------------------------- */
function aw_add_image_sizes() {
	add_image_size( 'aw-hero',    1920, 1080, true );
	add_image_size( 'aw-card',    800,  600,  true );
	add_image_size( 'aw-thumb',   400,  300,  true );
}
add_action( 'after_setup_theme', 'aw_add_image_sizes' );

/* ---------------------------------------------------------------
   Widgets
--------------------------------------------------------------- */
function aw_widgets_init() {
	register_sidebar( [
		'name'          => __( 'Sidebar', 'altaweb-ia' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	] );
}
add_action( 'widgets_init', 'aw_widgets_init' );

/* ---------------------------------------------------------------
   Excerpt
--------------------------------------------------------------- */
function aw_excerpt_length() { return 20; }
add_filter( 'excerpt_length', 'aw_excerpt_length' );

function aw_excerpt_more() { return '…'; }
add_filter( 'excerpt_more', 'aw_excerpt_more' );

/* ---------------------------------------------------------------
   Helpers
--------------------------------------------------------------- */
function aw_get_logo() {
	return get_template_directory_uri() . '/assets/img/altaweb-primary-dark-bg.svg';
}

function aw_get_logo_light() {
	return get_template_directory_uri() . '/assets/img/altaweb-primary.svg';
}

function aw_get_service_data( $slug ) {
	$services = [
		'diseno-web-ux' => [
			'num'        => '01',
			'title'      => 'Diseño web & UX',
			'tagline'    => 'Interfaces que convierten visitas en clientes.',
			'intro'      => 'Diseñamos experiencias digitales que funcionan porque parten del usuario, no del gusto del cliente. Cada decisión de diseño está respaldada por datos, buenas prácticas de usabilidad y un sistema visual coherente de principio a fin.',
			'illustration' => '03-capas.svg',
			'stats'      => [
				[ 'num' => '2 sem.',  'label' => 'Primer prototipo navegable' ],
				[ 'num' => '+40',     'label' => 'Proyectos diseñados' ],
				[ 'num' => '100%',    'label' => 'Handoff documentado' ],
			],
			'outcomes'   => [
				[ 'title' => 'Más ventas, menos rebote', 'desc' => 'Un diseño basado en datos reduce la fricción y convierte más visitas en clientes. Cada decisión tiene un porqué medible.' ],
				[ 'title' => 'Desarrollo sin interpretaciones', 'desc' => 'Entregamos un sistema de diseño completo. El equipo técnico trabaja sin adivinar ni improvisar. Menos bugs, menos revisiones.' ],
				[ 'title' => 'Identidad que escala sola', 'desc' => 'Un sistema visual coherente crece con tu negocio. Sin rediseñar desde cero cada vez que lanzas un producto nuevo.' ],
			],
			'includes'   => [
				[ 'label' => 'Auditoría UX',               'desc' => 'Análisis completo de tu web actual: heatmaps, flujos de usuario, friction points y oportunidades de mejora con datos reales.' ],
				[ 'label' => 'Arquitectura de información', 'desc' => 'Estructura de navegación basada en cómo piensan tus usuarios, no en cómo está organizada tu empresa internamente.' ],
				[ 'label' => 'Sistema de diseño',          'desc' => 'Librería de componentes en Figma: tipografía, colores, espaciado, botones y todo lo que el equipo de dev necesita.' ],
				[ 'label' => 'Prototipo navegable',        'desc' => 'Maqueta interactiva de alta fidelidad para validar con usuarios reales antes de escribir una sola línea de código.' ],
				[ 'label' => 'Handoff de desarrollo',      'desc' => 'Entrega completa al equipo técnico con especificaciones, assets exportados y documentación de comportamientos.' ],
			],
			'process'    => [
				[ 'step' => '01', 'title' => 'Descubrir', 'desc' => 'Entrevistas con el equipo y análisis de usuarios. Entendemos el contexto antes de abrir Figma.' ],
				[ 'step' => '02', 'title' => 'Mapear',    'desc' => 'Customer journey, arquitectura de información y wireframes de baja fidelidad para alinear antes de invertir en diseño.' ],
				[ 'step' => '03', 'title' => 'Diseñar',   'desc' => 'Sistema visual + prototipo de alta fidelidad. Dos rondas de revisión incluidas sin coste adicional.' ],
				[ 'step' => '04', 'title' => 'Entregar',  'desc' => 'Handoff en Figma con variables, tokens y toda la documentación para que el desarrollo vuele.' ],
			],
			'for_whom'   => 'Empresas que quieren rediseñar su web sin adivinar qué cambia, startups lanzando un producto nuevo y equipos que necesitan un sistema de diseño para escalar sin chaos.',
			'tags'       => [ 'Figma', 'Design Systems', 'UX Research', 'Prototipos', 'Handoff' ],
		],
		'desarrollo-a-medida' => [
			'num'        => '03',
			'title'      => 'Desarrollo a medida',
			'tagline'    => 'Código que escala. Sin dependencias que lastren.',
			'intro'      => 'Desarrollamos webs y aplicaciones con el stack que mejor encaja: WordPress para sitios corporativos y marketing, Next.js para productos y plataformas. Todo el código es limpio, documentado y 100 % tuyo.',
			'illustration' => '05-flujo.svg',
			'stats'      => [
				[ 'num' => '1 sem.',  'label' => 'Primeras demos en producción' ],
				[ 'num' => '30 días', 'label' => 'Soporte post-lanzamiento' ],
				[ 'num' => '100%',    'label' => 'Código tuyo, sin ataduras' ],
			],
			'outcomes'   => [
				[ 'title' => 'Velocidad sin deuda técnica', 'desc' => 'Código limpio desde el día uno. Sin constructores visuales que inflan los tiempos de carga ni dependencias que caducan solas.' ],
				[ 'title' => 'Tu equipo edita sin tocar código', 'desc' => 'Entregamos con formación. Tu equipo puede publicar contenido y crear páginas sin depender de nosotros para cada cambio.' ],
				[ 'title' => 'Google te encuentra antes', 'desc' => 'Core Web Vitals, schema markup y SEO técnico no son un añadido: están en el código desde el inicio.' ],
			],
			'includes'   => [
				[ 'label' => 'Desarrollo frontend',        'desc' => 'HTML, CSS y JavaScript que funciona en todos los navegadores y dispositivos. Rendimiento y accesibilidad incluidos de serie.' ],
				[ 'label' => 'WordPress a medida',         'desc' => 'Temas y plugins personalizados sin constructores visuales. Tu equipo edita el contenido sin romper el diseño.' ],
				[ 'label' => 'Aplicaciones Next.js',       'desc' => 'Productos web con autenticación, API routes, base de datos y deploy en Vercel o tu propia infraestructura.' ],
				[ 'label' => 'Integración de APIs',        'desc' => 'Conexión con CRMs, pasarelas de pago, ERPs, plataformas de email y cualquier servicio externo que uses.' ],
				[ 'label' => 'SEO técnico',                'desc' => 'Core Web Vitals en verde, meta tags, schema markup, sitemap XML y todo lo que Google mira para posicionarte.' ],
			],
			'process'    => [
				[ 'step' => '01', 'title' => 'Planificar',  'desc' => 'Revisamos el diseño, definimos el stack técnico y estimamos el esfuerzo real antes de arrancar.' ],
				[ 'step' => '02', 'title' => 'Desarrollar', 'desc' => 'Sprints semanales con demos en vivo. Ves el avance real cada semana, no al final del proyecto.' ],
				[ 'step' => '03', 'title' => 'Revisar',     'desc' => 'Pruebas en distintos dispositivos y navegadores. Revisión de rendimiento y accesibilidad.' ],
				[ 'step' => '04', 'title' => 'Lanzar',      'desc' => 'Deploy, configuración del servidor, redirecciones y soporte post-lanzamiento de 30 días.' ],
			],
			'for_whom'   => 'Empresas que necesitan una web a medida sin depender de plantillas, startups construyendo su producto digital y negocios con una web anticuada que frena su crecimiento.',
			'tags'       => [ 'WordPress', 'Next.js', 'PHP', 'React', 'TypeScript', 'API REST' ],
		],
		'integracion-ia' => [
			'num'        => '02',
			'title'      => 'Integración de IA',
			'tagline'    => 'La IA en el flujo real de tu negocio.',
			'intro'      => 'No vendemos demos de IA. Construimos soluciones que funcionan en producción: chatbots entrenados con el conocimiento de tu empresa, pipelines que automatizan tareas reales y copilots que multiplican la capacidad de tu equipo.',
			'illustration' => '02-pensamiento-ia.svg',
			'stats'      => [
				[ 'num' => '1-2 sem.', 'label' => 'Prototipo funcional listo' ],
				[ 'num' => '10×',      'label' => 'Más producción de contenido' ],
				[ 'num' => '24/7',     'label' => 'IA disponible sin descanso' ],
			],
			'outcomes'   => [
				[ 'title' => 'Horas de trabajo manual eliminadas', 'desc' => 'Flujos automáticos que conectan tus herramientas y ejecutan tareas repetitivas sin intervención humana cada semana.' ],
				[ 'title' => 'El conocimiento de tu empresa disponible 24/7', 'desc' => 'Un chatbot entrenado con tu documentación responde como un senior de tu equipo, a cualquier hora y sin errores.' ],
				[ 'title' => 'Ventaja competitiva que no se copia fácil', 'desc' => 'La IA integrada en tus procesos es difícil de replicar. Tu competencia tardará años en llegar donde tú estarás en meses.' ],
			],
			'includes'   => [
				[ 'label' => 'Chatbots con conocimiento propio', 'desc' => 'Asistentes entrenados con tu documentación, catálogo o base de conocimiento. Responden como si llevaran años en tu empresa.' ],
				[ 'label' => 'Automatización de procesos',       'desc' => 'Flujos con n8n o Make que conectan tus herramientas y eliminan el trabajo manual repetitivo sin tocar código.' ],
				[ 'label' => 'Generación de contenido asistida', 'desc' => 'Pipelines que producen borradores de posts, emails, fichas de producto o informes con la voz de tu marca.' ],
				[ 'label' => 'Integración con Claude / OpenAI',  'desc' => 'Conexión de los mejores modelos a tus sistemas existentes vía API, con prompt engineering y guardrails de seguridad.' ],
				[ 'label' => 'Formación del equipo',             'desc' => 'Sesiones prácticas para que tu equipo adopte las herramientas y las integre de verdad en su día a día.' ],
			],
			'process'    => [
				[ 'step' => '01', 'title' => 'Auditar',    'desc' => 'Mapeamos tus procesos actuales para identificar dónde la IA aporta más valor con menos fricción.' ],
				[ 'step' => '02', 'title' => 'Prototipiar','desc' => 'Construimos un prototipo funcional en 1-2 semanas para validar que la solución resuelve el problema real.' ],
				[ 'step' => '03', 'title' => 'Construir',  'desc' => 'Desarrollo e integración completa con tus sistemas. Incluye tests de seguridad y rendimiento.' ],
				[ 'step' => '04', 'title' => 'Escalar',    'desc' => 'Monitorización, ajuste del modelo y expansión a nuevos casos de uso según los datos del primer despliegue.' ],
			],
			'for_whom'   => 'Empresas con procesos repetitivos que consumen tiempo de talento valioso, equipos de contenido que necesitan producir más sin sacrificar calidad y negocios que quieren dar a sus clientes una experiencia más inteligente.',
			'tags'       => [ 'OpenAI', 'Claude', 'LangChain', 'n8n', 'Make', 'RAG', 'Prompt Engineering' ],
		],
		'estrategia-digital' => [
			'num'        => '04',
			'title'      => 'Estrategia digital',
			'tagline'    => 'Claridad antes de invertir. Dirección antes de ejecutar.',
			'intro'      => 'Antes de construir algo, hay que saber qué construir y por qué. Te ayudamos a tomar decisiones informadas sobre tu presencia digital: qué herramientas usar, qué priorizar, qué ignorar y cómo medir si funciona.',
			'illustration' => '04-orbita.svg',
			'stats'      => [
				[ 'num' => '1 sem.',  'label' => 'Auditoría completa lista' ],
				[ 'num' => 'ROI+',    'label' => 'Cada iniciativa priorizada' ],
				[ 'num' => '100%',    'label' => 'Orientado a negocio real' ],
			],
			'outcomes'   => [
				[ 'title' => 'Sabes dónde invertir antes de gastar', 'desc' => 'Un roadmap priorizado por impacto real. Sin dispersión, sin apostar a ciegas en herramientas que no van a mover la aguja.' ],
				[ 'title' => 'Marketing y tecnología hablan el mismo idioma', 'desc' => 'Todos con el mismo mapa. Menos reuniones de alineación, más ejecución coordinada hacia los mismos objetivos.' ],
				[ 'title' => 'Métricas que miden negocio, no vanidad', 'desc' => 'Definimos los KPIs ligados a facturación y crecimiento real. No los que quedan bien en un dashboard de presentación.' ],
			],
			'includes'   => [
				[ 'label' => 'Auditoría digital completa',  'desc' => 'Revisión de tu web, redes, SEO, herramientas y procesos digitales. Un mapa claro de dónde estás y dónde tienes margen real.' ],
				[ 'label' => 'Análisis de competencia',     'desc' => 'Qué hacen bien tus competidores, dónde hay huecos de mercado y cómo diferenciarte con lo que ya tienes.' ],
				[ 'label' => 'Roadmap priorizado',          'desc' => 'Plan de acción con iniciativas ordenadas por impacto y esfuerzo. Primero lo que mueve más con menos inversión.' ],
				[ 'label' => 'Definición de KPIs',          'desc' => 'Las métricas que importan para tu negocio, no las que quedan bien en un informe de fin de mes.' ],
				[ 'label' => 'Acompañamiento mensual',      'desc' => 'Sesiones de revisión periódicas para ajustar la estrategia según los datos reales del mercado.' ],
			],
			'process'    => [
				[ 'step' => '01', 'title' => 'Escuchar',   'desc' => 'Sesión de descubrimiento para entender tu negocio, tus objetivos y tus restricciones reales.' ],
				[ 'step' => '02', 'title' => 'Analizar',   'desc' => 'Revisión de datos existentes, benchmarking del sector y mapa de oportunidades.' ],
				[ 'step' => '03', 'title' => 'Proponer',   'desc' => 'Presentación del roadmap con iniciativas concretas, estimaciones y criterios de éxito.' ],
				[ 'step' => '04', 'title' => 'Acompañar',  'desc' => 'Seguimiento mensual para que el plan no quede en un cajón y las iniciativas se ejecuten.' ],
			],
			'for_whom'   => 'Directivos que necesitan claridad antes de invertir en digital, empresas que han probado varias cosas sin resultado consistente y equipos que quieren alinear marketing y tecnología hacia un mismo objetivo.',
			'tags'       => [ 'Auditoría', 'Roadmap', 'SEO', 'Analytics', 'Consultoría', 'KPIs' ],
		],
		'social-media' => [
			'num'        => '05',
			'title'      => 'Social Media',
			'tagline'    => 'Presencia constante. Contenido que conecta. Resultados medibles.',
			'intro'      => 'Gestionamos tu estrategia de redes sociales con IA como copiloto. Calendarios editoriales, producción de contenido, gestión de comunidad y análisis de rendimiento — todo con la voz de tu marca, sin plantillas genéricas.',
			'illustration' => '07-conversacion.svg',
			'stats'      => [
				[ 'num' => '4 sem.',    'label' => 'Al primer post publicado' ],
				[ 'num' => '+30',       'label' => 'Piezas de contenido al mes' ],
				[ 'num' => 'IA+humano', 'label' => 'Todo revisado antes de publicar' ],
			],
			'outcomes'   => [
				[ 'title' => 'Presencia sin consumirte el tiempo', 'desc' => 'Tú gestionas tu negocio. Nosotros gestionamos tus redes. Publicamos, respondemos y optimizamos sin que tengas que estar encima.' ],
				[ 'title' => 'Contenido que suena a ti, no a robot', 'desc' => 'IA entrenada con la voz de tu marca y revisada por nuestro equipo. Cada post tiene tu personalidad, no la de ChatGPT.' ],
				[ 'title' => 'Audiencia que compra y recomienda', 'desc' => 'No acumulamos seguidores vacíos. Construimos una comunidad que interactúa, confía en tu marca y termina siendo cliente.' ],
			],
			'includes'   => [
				[ 'label' => 'Estrategia editorial',       'desc' => 'Pilares de contenido, tono de voz, formatos por plataforma y calendario mensual alineado con tus objetivos de negocio.' ],
				[ 'label' => 'Producción con IA',          'desc' => 'Textos, carruseles y guiones para reels generados con IA entrenada en tu marca y revisados antes de publicar.' ],
				[ 'label' => 'Gestión de publicación',     'desc' => 'Programación y publicación en Instagram, LinkedIn, TikTok y las plataformas que usa tu audiencia.' ],
				[ 'label' => 'Community management',       'desc' => 'Respuesta a comentarios y mensajes directos. Construimos comunidad activa, no solo acumulamos seguidores.' ],
				[ 'label' => 'Informe mensual',            'desc' => 'Análisis de rendimiento real: qué posts funcionaron, qué no, y qué cambiamos el mes siguiente.' ],
			],
			'process'    => [
				[ 'step' => '01', 'title' => 'Entrenar la marca',  'desc' => 'Definimos la voz, el estilo visual y los temas que te representan. La IA aprende a hablar como tú.' ],
				[ 'step' => '02', 'title' => 'Planificar',         'desc' => 'Calendario mensual con temas, formatos y objetivos por publicación. Tú apruebas antes de publicar.' ],
				[ 'step' => '03', 'title' => 'Producir y publicar','desc' => 'Generamos el contenido, lo revisamos y lo publicamos en el momento de mayor alcance de tu audiencia.' ],
				[ 'step' => '04', 'title' => 'Optimizar',          'desc' => 'Cada mes ajustamos la estrategia con datos reales. Lo que funciona se amplifica, lo que no se cambia.' ],
			],
			'for_whom'   => 'Empresas con algo real que contar pero sin tiempo ni equipo para publicar de forma consistente. Negocios que han probado redes sociales sin resultado porque les faltaba estrategia, no contenido.',
			'tags'       => [ 'Instagram', 'LinkedIn', 'TikTok', 'Contenido IA', 'Community', 'Analytics' ],
		],
	];
	return $services[ $slug ] ?? null;
}

function aw_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	return max( 1, (int) ceil( $words / 200 ) );
}
