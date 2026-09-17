/**
 * White Label Agency Landing Page Interactive Scripts
 * NGD Technolab
 */

document.addEventListener('DOMContentLoaded', () => {
  initHeroParallax();
  initScrollAnimations();
  initMarginCalculator();
  initFaqAccordion();
  initMenuClickGuard();
});

/**
 * 1. HERO SECTION INTERACTIVE MOUSE PARALLAX
 */
function initHeroParallax() {
  const stage = document.querySelector('.wl-hero-interactive-stage');
  const hero = document.querySelector('.wl-hero-section');
  const mainCard = document.querySelector('.wl-parallax-card-main');
  const badge1 = document.querySelector('.wl-float-badge-1');
  const badge2 = document.querySelector('.wl-float-badge-2');
  const badge3 = document.querySelector('.wl-float-badge-3');

  if (!stage || !mainCard) return;

  let mouseX = 0;
  let mouseY = 0;
  let currentX = 0;
  let currentY = 0;
  let isHovering = false;
  let rafId = null;

  const handleMouseMove = (e) => {
    const rect = stage.getBoundingClientRect();
    const x = e.clientX - rect.left - rect.width / 2;
    const y = e.clientY - rect.top - rect.height / 2;
    mouseX = x / (rect.width / 2);
    mouseY = y / (rect.height / 2);
  };

  const updateParallax = () => {
    // Lerp smooth interpolation
    currentX += (mouseX - currentX) * 0.08;
    currentY += (mouseY - currentY) * 0.08;

    const tiltX = -currentY * 12; // deg
    const tiltY = currentX * 12;  // deg

    if (mainCard) {
      mainCard.style.transform = `rotateX(${tiltX.toFixed(2)}deg) rotateY(${tiltY.toFixed(2)}deg) translateZ(10px)`;
    }

    if (badge1) {
      const b1X = -currentX * 22;
      const b1Y = -currentY * 20;
      badge1.style.transform = `translate3d(${b1X.toFixed(2)}px, ${b1Y.toFixed(2)}px, 40px)`;
    }

    if (badge2) {
      const b2X = currentX * 26;
      const b2Y = currentY * 24;
      badge2.style.transform = `translate3d(${b2X.toFixed(2)}px, ${b2Y.toFixed(2)}px, 50px)`;
    }

    if (badge3) {
      const b3X = -currentX * 18;
      const b3Y = currentY * 16;
      badge3.style.transform = `translate3d(${b3X.toFixed(2)}px, ${b3Y.toFixed(2)}px, 35px)`;
    }

    if (isHovering || Math.abs(mouseX - currentX) > 0.001 || Math.abs(mouseY - currentY) > 0.001) {
      rafId = requestAnimationFrame(updateParallax);
    }
  };

  const container = hero || stage;

  container.addEventListener('mouseenter', () => {
    isHovering = true;
    cancelAnimationFrame(rafId);
    rafId = requestAnimationFrame(updateParallax);
  });

  container.addEventListener('mousemove', handleMouseMove);

  container.addEventListener('mouseleave', () => {
    isHovering = false;
    mouseX = 0;
    mouseY = 0;
  });
}

/**
 * 2. LIGHTWEIGHT SCROLL REVEAL (INTERSECTION OBSERVER)
 */
function initScrollAnimations() {
  const elements = document.querySelectorAll('.wl-reveal');
  if (!elements.length) return;

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.12,
      rootMargin: '0px 0px -40px 0px',
    }
  );

  elements.forEach((el) => observer.observe(el));
}

/**
 * 3. INTERACTIVE MARGIN CALCULATOR
 */
function initMarginCalculator() {
  const rateSlider = document.getElementById('wl-rate-slider') || document.getElementById('wlRateSlider');
  const hoursSlider = document.getElementById('wl-hours-slider') || document.getElementById('wlHoursSlider');
  const rateLabel = document.getElementById('wl-calc-billed-rate') || document.getElementById('wlRateLabel');
  const hoursLabel = document.getElementById('wl-calc-hours') || document.getElementById('wlHoursLabel');
  const annualProfitElem = document.getElementById('wl-calc-annual-profit') || document.getElementById('wlAnnualProfit');
  const monthlyProfitElem = document.getElementById('wl-calc-monthly-profit') || document.getElementById('wlMonthlyProfit');
  const marginPctElem = document.getElementById('wl-calc-margin-pct') || document.getElementById('wlMarginPct');

  if (!rateSlider || !hoursSlider) return;

  const PARTNER_WHOLESALE_RATE = 35; // $35/hr partner wholesale rate

  function recalculate() {
    const billedRate = parseInt(rateSlider.value, 10);
    const hours = parseInt(hoursSlider.value, 10);

    if (rateLabel) rateLabel.textContent = `$${billedRate} / hr`;
    if (hoursLabel) {
      const pods = (hours / 160).toFixed(1).replace('.0', '');
      hoursLabel.textContent = `${hours} hrs (${pods} Pod${pods == 1 ? '' : 's'})`;
    }

    const monthlyRevenue = billedRate * hours;
    const monthlyCost = PARTNER_WHOLESALE_RATE * hours;
    const monthlyMargin = Math.max(0, monthlyRevenue - monthlyCost);
    const annualMargin = monthlyMargin * 12;
    const marginPct = Math.round((monthlyMargin / monthlyRevenue) * 100);

    if (annualProfitElem) {
      annualProfitElem.textContent = `$${annualMargin.toLocaleString()}`;
    }
    if (monthlyProfitElem) {
      monthlyProfitElem.textContent = `$${monthlyMargin.toLocaleString()}`;
    }
    if (marginPctElem) {
      marginPctElem.textContent = `${marginPct}% Margin`;
    }
  }

  rateSlider.addEventListener('input', recalculate);
  hoursSlider.addEventListener('input', recalculate);
  recalculate();
}

/**
 * 4. FAQ ACCORDION
 */
function initFaqAccordion() {
  const items = document.querySelectorAll('.wl-faq-item');
  if (!items.length) return;

  items.forEach((item) => {
    const question = item.querySelector('.wl-faq-question');
    const answer = item.querySelector('.wl-faq-answer');

    if (!question || !answer) return;

    question.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      // Close all other items
      items.forEach((other) => {
        if (other !== item && other.classList.contains('active')) {
          other.classList.remove('active');
          const otherAns = other.querySelector('.wl-faq-answer');
          if (otherAns) otherAns.style.maxHeight = null;
        }
      });

      if (!isActive) {
        item.classList.add('active');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      } else {
        item.classList.remove('active');
        answer.style.maxHeight = null;
      }
    });
  });
}

/**
 * 5. MENU PARENT CLICK GUARD
 * Ensures parent "White Label Agency" only reveals submenu on hover and does not trigger page jump on click
 */
function initMenuClickGuard() {
  const parentTargets = document.querySelectorAll(
    '#menu-item-315308 > .ubermenu-target, #menu-item-315309 > a, .ubermenu-item-315308 > .ubermenu-target'
  );
  parentTargets.forEach((target) => {
    target.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
    });
  });
}

