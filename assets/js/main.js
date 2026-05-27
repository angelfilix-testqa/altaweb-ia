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

  // ── 02 · Stat counters con IntersectionObserver ─────────────
  var statNums = document.querySelectorAll('.stat__num[data-count]');
  if (statNums.length) {
    var counterObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        var el = entry.target;
        var target = parseInt(el.dataset.count, 10);
        var prefix = el.dataset.prefix || '';
        var suffix = el.dataset.suffix || '';
        var duration = 1400;
        var startTime = null;
        function step(ts) {
          if (!startTime) startTime = ts;
          var progress = Math.min((ts - startTime) / duration, 1);
          var eased = 1 - Math.pow(1 - progress, 3);
          el.textContent = prefix + Math.round(eased * target) + suffix;
          if (progress < 1) requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
        counterObs.unobserve(el);
      });
    }, { threshold: 0.5 });
    statNums.forEach(function (el) { counterObs.observe(el); });
  }

  // ── 02 · Terminal typing animation ──────────────────────────
  var termBody = document.querySelector('.terminal__body');
  if (termBody) {
    var lines = [
      { cls: '',     html: '<span class="t-mute">$</span> <span class="t-cmd">init</span> altaweb.ia' },
      { cls: '',     html: '<span class="t-mute">→</span> Analizando contexto de marca<span class="t-blink">_</span>' },
      { cls: 't-ok', html: '✓ Identidad cargada' },
      { cls: 't-ok', html: '✓ Stack definido' },
      { cls: 't-ok', html: '✓ IA integrada' },
      { cls: '',     html: '<span class="t-mute">→</span> Lanzando producto <span class="aw-cursor" aria-hidden="true"></span>' },
    ];
    termBody.innerHTML = '';
    var li = 0;
    function typeLine() {
      if (li >= lines.length) return;
      var p = document.createElement('p');
      if (lines[li].cls) p.className = lines[li].cls;
      p.innerHTML = lines[li].html;
      p.style.opacity = '0';
      termBody.appendChild(p);
      setTimeout(function (el) { el.style.transition = 'opacity 0.3s'; el.style.opacity = '1'; }, 30, p);
      li++;
      if (li < lines.length) setTimeout(typeLine, 380);
    }
    setTimeout(typeLine, 800);
  }

  // ── 08 · Scroll progress bar ─────────────────────────────────
  var progressBar = document.getElementById('scroll-progress');
  if (progressBar) {
    window.addEventListener('scroll', function () {
      var total = document.documentElement.scrollHeight - window.innerHeight;
      progressBar.style.width = (total > 0 ? (window.scrollY / total) * 100 : 0) + '%';
    }, { passive: true });
  }

  // ── 08 · Back to top ─────────────────────────────────────────
  var backToTop = document.getElementById('back-to-top');
  if (backToTop) {
    window.addEventListener('scroll', function () {
      backToTop.classList.toggle('is-visible', window.scrollY > 400);
    }, { passive: true });
    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ── 06 · Form — submit + toast ───────────────────────────────
  function showToast(msg) {
    var toast = document.getElementById('site-toast');
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('is-visible');
    setTimeout(function () { toast.classList.remove('is-visible'); }, 3500);
  }

  var contactForm = document.querySelector('.contact-form');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn = document.getElementById('cf-submit');
      if (!btn) return;
      btn.classList.add('is-loading');
      btn.disabled = true;
      setTimeout(function () {
        btn.classList.remove('is-loading');
        btn.disabled = false;
        contactForm.reset();
        showToast('¡Mensaje enviado! Te respondemos hoy mismo.');
      }, 1800);
    });
  }

})();
