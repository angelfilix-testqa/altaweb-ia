# CLAUDE.md — Contexto del proyecto Altaweb.ia

## Qué es este proyecto

Tema WordPress custom para **Altaweb.ia**, agencia digital IA-native española. El tema es 100 % hecho a medida, sin page builders ni plantillas. Todo el código vive en este directorio.

---

## Entorno de desarrollo

| Variable | Valor |
|---|---|
| Local by Flywheel | Site: `altawebia` |
| URL local | `http://localhost:10004` |
| WP Admin | `http://localhost:10004/wp-admin` |
| Usuario WP | `admin-27` |
| Contraseña WP | `u5C^g9KSm4%w` |
| MySQL port | `10005` |
| MySQL user/pass | `root / root` |
| MySQL DB | `local` |
| MySQL binary | `C:\Users\angel\AppData\Roaming\Local\lightning-services\mysql-8.4.0\bin\win64\bin\mysql.exe` |
| mysqldump | `C:\Users\angel\AppData\Roaming\Local\lightning-services\mysql-8.4.0\bin\win64\bin\mysqldump.exe` |

**Rutas importantes:**
- Tema en Local: `C:\Users\angel\Local Sites\altawebia\app\public\wp-content\themes\altaweb-ia\`
- Fuente desktop: `C:\Users\angel\Desktop\web-altaweb.ia\` ← aquí se edita
- Repositorio GitHub: `https://github.com/angelfilix-testqa/altaweb-ia`

**Flujo de trabajo:** editar en desktop → sincronizar a Local → verificar en browser.

**Sync rápido a Local:**
```powershell
$src = "C:\Users\angel\Desktop\web-altaweb.ia"
$dst = "C:\Users\angel\Local Sites\altawebia\app\public\wp-content\themes\altaweb-ia"
Copy-Item "$src\archivo.php" "$dst\archivo.php" -Force
```

**Exportar DB:**
```powershell
$mysqldump = "C:\Users\angel\AppData\Roaming\Local\lightning-services\mysql-8.4.0\bin\win64\bin\mysqldump.exe"
& $mysqldump --user=root --password=root --port=10005 --host=127.0.0.1 --default-character-set=utf8mb4 --single-transaction local > "database\altaweb-dump.sql"
```

**Query MySQL directo:**
```powershell
$mysql = "C:\Users\angel\AppData\Roaming\Local\lightning-services\mysql-8.4.0\bin\win64\bin\mysql.exe"
& $mysql --user=root --password=root --port=10005 --host=127.0.0.1 --default-character-set=utf8mb4 local -e "SELECT * FROM wp_options LIMIT 5;"
```

---

## Estructura de archivos del tema

```
altaweb-ia/
├── CLAUDE.md                   ← este archivo
├── README.md                   ← guía de despliegue
├── .gitignore
├── wp-config.sample.php        ← plantilla para hosting
├── style.css                   ← metadata WP (no estilos reales)
├── functions.php               ← setup tema + aw_get_service_data()
├── front-page.php              ← portada principal
├── page-servicio.php           ← template páginas de servicio (Template Name)
├── header.php
├── footer.php
├── home.php                    ← blog / Lab
├── single.php                  ← artículo individual
├── page.php                    ← página genérica
├── 404.php
├── database/
│   └── altaweb-dump.sql        ← dump MySQL (actualizar al hacer cambios de BD)
└── assets/
    ├── css/
    │   ├── tokens.css          ← variables CSS de marca (--aw-*)
    │   ├── theme.css           ← todos los estilos (1600+ líneas)
    │   ├── animations.css      ← animaciones de marca oficiales
    │   └── patterns.css        ← patrones de fondo (mesh, dot-grid, etc.)
    ├── js/
    │   └── main.js             ← menú mobile, scroll suave, IntersectionObserver
    └── img/
        ├── altaweb-primary.svg
        ├── altaweb-primary-dark-bg.svg
        ├── altaweb-mark.svg
        ├── altaweb-wordmark.svg
        ├── favicon.svg
        └── illustrations/      ← 10 SVGs de marca (01 al 10)
```

---

## Design tokens principales (tokens.css)

```css
--aw-ink-950:    #0A0118   /* fondo oscuro principal */
--aw-ink-900:    #150528
--aw-paper-50:   #F6F4FF   /* fondo claro principal */
--aw-paper-100:  #ECE7FF
--aw-violet-500: #7C3AED   /* color primario / acento */
--aw-violet-300: #C4B5FD   /* violeta claro (textos sobre oscuro) */
--aw-magenta:    #D946EF
--aw-cyber:      #22D3EE

--aw-font-display: "Space Grotesk"
--aw-font-mono:    "JetBrains Mono"
--aw-ease:         cubic-bezier(0.16, 1, 0.3, 1)
```

**Tokens que NO existen** (errores frecuentes — usar alternativas):
- ❌ `--aw-primary-300` → ✅ `var(--aw-violet-300)`
- ❌ `--aw-fg-muted` → ✅ `color-mix(in oklch, var(--aw-ink-950) 55%, transparent)`
- ❌ `--aw-header-h` → ✅ `80px`

---

## Secciones de theme.css (orientación rápida)

| Línea aprox. | Sección |
|---|---|
| 1–50 | Reset & Base |
| 50–180 | Skip link, Layout, Container |
| 180–280 | Header & Nav |
| 280–400 | Botones, Eyebrow, Secciones |
| 400–600 | Hero portada |
| 500–650 | Bento grid servicios |
| 650–720 | Proceso, Work, CTA Band |
| 720–850 | Contacto, Formulario |
| 850–1000 | Footer |
| 1000–1100 | Lab / Blog |
| 1100–1300 | Article single |
| 1300–1340 | Responsive global |
| 1340+ | Páginas de servicio (svc-hero, inc-bento, outcomes, etc.) |

---

## Páginas WordPress en la BD

| ID | Slug | Template |
|---|---|---|
| 4 | `inicio` | front-page.php (portada) |
| 5 | `lab` | home.php (blog) |
| 9 | `diseno-web-ux` | page-servicio.php |
| 10 | `integracion-ia` | page-servicio.php |
| 11 | `desarrollo-a-medida` | page-servicio.php |
| 12 | `estrategia-digital` | page-servicio.php |
| 13 | `social-media` | page-servicio.php |

**Posts del Lab (blog):**
- ID 6: "Cómo la IA está transformando el proceso de crear webs en 2026"
- ID 7: "5 errores que cometen las PYMEs al crear su web"
- ID 8: "Gestión de redes sociales con IA: cómo lo hacemos en Altaweb.ia"

---

## Función clave: aw_get_service_data($slug)

Definida en `functions.php`. Devuelve un array con:
```php
[
  'num'         => '01',
  'title'       => 'Diseño web & UX',
  'tagline'     => '...',
  'intro'       => '...',
  'illustration'=> '03-capas.svg',
  'stats'       => [ ['num'=>'2 sem.', 'label'=>'...'], ... ],   // 3 items
  'outcomes'    => [ ['title'=>'...', 'desc'=>'...'], ... ],     // 3 items
  'includes'    => [ ['label'=>'...', 'desc'=>'...'], ... ],     // 5 items
  'process'     => [ ['step'=>'01', 'title'=>'...', 'desc'=>'...'], ... ], // 4 items
  'for_whom'    => '...',
  'tags'        => ['Figma', 'Design Systems', ...],
]
```

Slugs disponibles: `diseno-web-ux`, `integracion-ia`, `desarrollo-a-medida`, `estrategia-digital`, `social-media`

---

## Identidad de marca

- **Nombre:** Altaweb.ia
- **Concepto:** Agencia digital IA-native para PYMEs españolas
- **Servicios:** Diseño web & UX · Integración IA · Desarrollo a medida · Estrategia digital · Social Media
- **Target:** PYMEs y startups en España que quieren digitalización con IA
- **Tono:** Directo, técnico pero accesible, orientado a resultados. Sin buzzwords vacíos.
- **Email:** hola@altaweb.ia

---

## Patrones de diseño usados

- **Secciones oscuras:** `class="section section--dark"` → fondo ink-950, textos paper-50
- **Secciones claras:** `class="section"` → fondo paper-50
- **Secciones violeta:** `class="section section--violet"` → CTA bands
- **Bento cards:** `.bento-shell` (outer) + `.bento-core` (inner) — double-bezel
- **Animación scroll:** IntersectionObserver en main.js. Clases: `fade-in` → `is-visible`
- **Stagger:** `data-delay="80"` (ms) en `.bento-shell`
- **Ilustraciones:** `get_template_directory_uri() . '/assets/img/illustrations/' . $filename`

---

## Git

```bash
# Ver estado
git status

# Commit de cambios
git add .
git commit -m "descripción"
git push

# Ver historial
git log --oneline
```

Remote: `https://github.com/angelfilix-testqa/altaweb-ia`

---

## Problemas conocidos y soluciones

| Problema | Solución |
|---|---|
| CSS no se actualiza en browser | Ctrl+Shift+R (hard reload) |
| CSS no carga tras editar theme.css | Bumpar versión en functions.php (`'2.0.0'` → `'2.1.0'`) |
| 404 en páginas nuevas | WP Admin → Ajustes → Permalinks → Guardar |
| MySQL no conecta | Verificar que Local by Flywheel esté corriendo |
| Caracteres rotos en SQL | Usar `--default-character-set=utf8mb4` en mysql/mysqldump |
| page-servicio.php no carga template | Verificar `_wp_page_template = page-servicio.php` en wp_postmeta |
| Hero invisible (texto blanco sobre blanco) | Verificar que la sección tenga `section--dark` |
