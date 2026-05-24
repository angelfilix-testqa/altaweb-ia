<?php
/**
 * wp-config.sample.php — Plantilla de configuración para despliegue
 *
 * Copia este archivo como wp-config.php y rellena los valores
 * con los datos de tu hosting antes de subir.
 */

// ── Base de datos ──────────────────────────────────────────────
define( 'DB_NAME',     'NOMBRE_BASE_DE_DATOS' );
define( 'DB_USER',     'USUARIO_BD' );
define( 'DB_PASSWORD', 'CONTRASEÑA_BD' );
define( 'DB_HOST',     'localhost' );
define( 'DB_CHARSET',  'utf8mb4' );
define( 'DB_COLLATE',  '' );

// ── Claves de seguridad ────────────────────────────────────────
// Genera nuevas en: https://api.wordpress.org/secret-key/1.1/salt/
define( 'AUTH_KEY',         'pon-aqui-tu-clave-unica' );
define( 'SECURE_AUTH_KEY',  'pon-aqui-tu-clave-unica' );
define( 'LOGGED_IN_KEY',    'pon-aqui-tu-clave-unica' );
define( 'NONCE_KEY',        'pon-aqui-tu-clave-unica' );
define( 'AUTH_SALT',        'pon-aqui-tu-clave-unica' );
define( 'SECURE_AUTH_SALT', 'pon-aqui-tu-clave-unica' );
define( 'LOGGED_IN_SALT',   'pon-aqui-tu-clave-unica' );
define( 'NONCE_SALT',       'pon-aqui-tu-clave-unica' );

// ── Prefijo de tablas ──────────────────────────────────────────
$table_prefix = 'wp_';

// ── Entorno ────────────────────────────────────────────────────
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );

// ── URL del sitio (actualizar tras importar la BD) ─────────────
// define( 'WP_HOME',    'https://tudominio.com' );
// define( 'WP_SITEURL', 'https://tudominio.com' );

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}
require_once ABSPATH . 'wp-settings.php';
