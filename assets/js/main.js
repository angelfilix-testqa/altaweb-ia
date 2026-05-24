/* Altaweb.ia · main.js */

(function () {
  'use strict';

  // ── Menú mobile ─────────────────────────────────────────
  const toggle = document.getElementById('nav-toggle');
  const nav    = document.getElementById('site-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const isOpen = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });

    // Cerrar al hacer clic en un enlace
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  // ── Header: añade clase al hacer scroll ─────────────────
  const header = document.getElementById('site-header');
  if (header) {
    window.addEventListener('scroll', function () {
      header.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
  }

  // ── Scroll suave a anchors con offset del header ─────────
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const id = this.getAttribute('href').slice(1);
      if (!id) return;
      const target = document.getElementById(id);
      if (!target) return;
      e.preventDefault();
      const offset = header ? header.offsetHeight : 0;
      const top = target.getBoundingClientRect().top + window.scrollY - offset - 16;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });

  // ── Animación de entrada con IntersectionObserver ────────
  const observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var delay = entry.target.dataset.delay ? parseInt(entry.target.dataset.delay) : 0;
          setTimeout(function () {
            entry.target.classList.add('is-visible');
          }, delay);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.08 }
  );

  // Bento cards — ya tienen opacity:0 en CSS, solo observar
  document.querySelectorAll('.bento-shell').forEach(function (el) {
    observer.observe(el);
  });

  // Añade fade-in a elementos estándar y los observa
  document.querySelectorAll(
    '.work-card, .process__step, .stat, .lab-card'
  ).forEach(function (el) {
    el.classList.add('fade-in');
    observer.observe(el);
  });

  // Observa elementos que ya tienen fade-in desde PHP (ej: inc-card, outcome-card)
  document.querySelectorAll('.fade-in:not(.is-visible)').forEach(function (el) {
    observer.observe(el);
  });

})();
