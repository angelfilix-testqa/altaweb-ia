# Altaweb.ia · Sistema de ilustración

10 ilustraciones geométrico-diagramáticas. Mismo ADN que el logo: triángulos, círculos, nodos, líneas.

## 📁 Archivos

```
illustrations/
├── 01-crecimiento.svg          Escalera de triángulos ascendentes
├── 02-pensamiento-ia.svg       Red de nodos con triángulo central
├── 03-capas.svg                Capas apiladas (sistema / arquitectura)
├── 04-orbita.svg               Anillos orbitales + marca al centro
├── 05-flujo.svg                Nodos conectados con flecha
├── 06-camino.svg               Camino curvo con hitos (journey)
├── 07-conversacion.svg         Burbujas de chat geométricas
├── 08-generativo.svg           Grid generativo de triángulos
├── 09-aprendizaje.svg          Espiral (learning curve)
└── 10-equipo.svg               Triángulos como personas
```

## 🎨 Reglas del sistema

| Atributo | Valor |
|---|---|
| Trazo | **2.5px** (algunos detalles 1.5 o 2) |
| Esquinas | `stroke-linejoin: miter` (vivas) |
| Fill activo | Solo `#7C3AED` (violet) o `#D946EF` (magenta) |
| Acento IA | Dot magenta `#D946EF` |
| Dato / señal | Cyber `#22D3EE` |

## 🚀 Cómo usar

```html
<!-- Como imagen -->
<img src="illustrations/02-pensamiento-ia.svg" alt="" width="200">

<!-- Inline (para colorear con CSS) -->
<div style="color: #7C3AED;">
  <!-- pega el contenido del SVG aquí -->
</div>
```

Para cambiar el color principal: edita los atributos `stroke="#0A0118"` y `fill="#7C3AED"` del SVG, o úsalo inline con `currentColor`.

## 💡 Cuándo usar cada una

| Caso de uso | Ilustración recomendada |
|---|---|
| Sección "Por qué nosotros" en web | 02 Pensamiento IA |
| Slide de visión/misión | 06 Camino |
| Página de servicios | 05 Flujo |
| Sección "Cómo trabajamos" | 04 Órbita o 09 Aprendizaje |
| "Sobre nosotros" / equipo | 10 Equipo |
| Caso de estudio · resultados | 01 Crecimiento |
| Producto · chat / copilot | 07 Conversación |
| Producto · sistema de capas | 03 Capas |
| Marketing · "powered by AI" | 08 Generativo |

---

v1.0 · 2026 · `hola@altaweb.ia`
