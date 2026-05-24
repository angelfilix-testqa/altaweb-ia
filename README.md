# Altaweb.ia — WordPress Theme

Tema personalizado para **Altaweb.ia**, agencia digital IA-native.

---

## Estructura del repositorio

```
altaweb-ia/
├── wp-content/
│   └── themes/
│       └── altaweb-ia/       ← Tema principal (todo el código custom)
├── database/
│   └── altaweb-dump.sql      ← Dump de la base de datos
├── wp-config.sample.php      ← Plantilla de configuración
└── .gitignore
```

---

## Despliegue en hosting

### 1. Subir WordPress

1. Descarga WordPress desde [wordpress.org/download](https://wordpress.org/download/)
2. Sube todos los archivos al servidor vía FTP o el panel de hosting
3. Sube la carpeta `wp-content/themes/altaweb-ia/` a `wp-content/themes/`

### 2. Importar la base de datos

1. Crea una base de datos MySQL en tu hosting
2. Importa el archivo `database/altaweb-dump.sql` desde phpMyAdmin o por terminal:
   ```bash
   mysql -u USUARIO -p NOMBRE_BD < database/altaweb-dump.sql
   ```
3. Actualiza las URLs en la BD (cambia `localhost:10004` por tu dominio):
   ```sql
   UPDATE wp_options SET option_value = 'https://tudominio.com' WHERE option_name IN ('siteurl', 'home');
   ```

### 3. Configurar wp-config.php

1. Copia `wp-config.sample.php` como `wp-config.php`
2. Rellena los datos de tu base de datos
3. Genera nuevas claves de seguridad en: https://api.wordpress.org/secret-key/1.1/salt/

### 4. Activar el tema

El tema `altaweb-ia` debería activarse automáticamente al importar la BD.
Si no, ve a **Apariencia → Temas** y actívalo manualmente.

---

## Desarrollo local

El proyecto usa **Local by Flywheel** para desarrollo local.

```
URL local:  http://localhost:10004
Admin:      http://localhost:10004/wp-admin
```

---

## Stack técnico

- **WordPress** — CMS
- **PHP** — Backend / templates
- **CSS custom** con design tokens (`assets/css/tokens.css`)
- **Space Grotesk + JetBrains Mono** — Tipografía
- **SVG illustrations** — Identidad visual de marca
- **Vanilla JS** — Animaciones e interacciones

---

## Estructura del tema

```
altaweb-ia/
├── assets/
│   ├── css/
│   │   ├── tokens.css        ← Variables de marca (colores, fuentes, espaciado)
│   │   ├── theme.css         ← Estilos principales
│   │   ├── animations.css    ← Animaciones de marca
│   │   └── patterns.css      ← Patrones de fondo
│   ├── js/
│   │   └── main.js           ← Menú mobile, scroll, animaciones
│   └── img/
│       ├── illustrations/    ← SVGs de marca (10 ilustraciones)
│       └── *.svg             ← Logos
├── front-page.php            ← Portada (hero, servicios, proceso, contacto)
├── page-servicio.php         ← Template páginas de servicio individuales
├── home.php                  ← Blog / Lab
├── single.php                ← Artículo individual
├── header.php
├── footer.php
├── functions.php             ← Setup del tema, datos de servicios
├── style.css                 ← Metadata del tema (requerido por WP)
└── 404.php
```
