/* Altaweb.ia · main.js */

(function () {
  'use strict';

  // ── Menú mobile con slide-down + overlay ────────────────
  const toggle  = document.getElementById('nav-toggle');
  const nav     = document.getElementById('site-nav');
  const overlay = document.createElement('div');
  overlay.className = 'nav-overlay';
  document.body.appendChild(overlay);

  function openMenu() {
    nav.classList.add('is-open');
    overlay.classList.add('is-visible');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }
  function closeMenu() {
    nav.classList.remove('is-open');
    overlay.classList.remove('is-visible');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      nav.classList.contains('is-open') ? closeMenu() : openMenu();
    });
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });
    overlay.addEventListener('click', closeMenu);
  }

  // ── Nav activo con IntersectionObserver ──────────────────
  var navLinks = document.querySelectorAll('.site-nav__list a');
  var sections = document.querySelectorAll('main section[id]');

  if (sections.length && navLinks.length) {
    var activeObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var id = entry.target.id;
        navLinks.forEach(function (link) {
          var href = link.getAttribute('href') || '';
          link.classList.toggle('is-active', href === '#' + id || href.endsWith('/#' + id) || href.endsWith('/' + id));
        });
      });
    }, { rootMargin: '-20% 0px -70% 0px', threshold: 0 });

    sections.forEach(function (s) { activeObserver.observe(s); });
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
    '.work-card, .process-prop__step, .stat, .lab-card'
  ).forEach(function (el) {
    el.classList.add('fade-in');
    observer.observe(el);
  });

  // Observa elementos que ya tienen fade-in desde PHP (ej: inc-card, outcome-card)
  document.querySelectorAll('.fade-in:not(.is-visible)').forEach(function (el) {
    observer.observe(el);
  });

})();
