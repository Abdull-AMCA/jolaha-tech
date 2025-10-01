// ================================
// Script.js — Navbar + Carousel
// ================================

document.addEventListener("DOMContentLoaded", () => {
  // Navbar toggle
  const menuToggle = document.getElementById("menu-toggle");
  const menu = document.getElementById("menu");

  menuToggle.addEventListener("click", () => {
    menu.classList.toggle("show");
    menuToggle.classList.toggle("open");
  });

  // Hamburger animation
  menuToggle.addEventListener("click", () => {
    const spans = menuToggle.querySelectorAll("span");
    spans[0].classList.toggle("rotate1");
    spans[1].classList.toggle("fade");
    spans[2].classList.toggle("rotate2");
  });
});

// ================================
// Extra CSS classes for hamburger animation
// ================================
const style = document.createElement("style");
style.textContent = `
  .menu-toggle.open span:nth-child(1){ transform: rotate(45deg) translateY(8px); }
  .menu-toggle.open span:nth-child(2){ opacity:0; }
  .menu-toggle.open span:nth-child(3){ transform: rotate(-45deg) translateY(-8px); }
  .menu-toggle span { transition: all .3s ease; }
`;
document.head.appendChild(style);


 // JS: small enhancements — we will add interactions per your screenshots
    document.getElementById('year').textContent = new Date().getFullYear();

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        const id = a.getAttribute('href');
        if(id.length > 1){
          const el = document.querySelector(id);
          if(el){ e.preventDefault(); el.scrollIntoView({behavior:'smooth', block:'start'}); }
        }
      });
    });

    // Optional: reveal on scroll (basic)
    const observer = new IntersectionObserver((entries)=>{
      entries.forEach(entry=>{
        if(entry.isIntersecting){ entry.target.animate([
          {opacity:0, transform:'translateY(12px)'},
          {opacity:1, transform:'translateY(0)'}
        ], {duration:500, easing:'ease-out', fill:'forwards'}); observer.unobserve(entry.target); }
      })
    }, { threshold: .12 });
    document.querySelectorAll('.service, .stat, .quote, .cta').forEach(el=>observer.observe(el));

// ================================
// Stats Counter
// ================================
  
// ================================
// Satisfaction Card
// ================================

document.addEventListener("DOMContentLoaded", () => {
  const valueEl = document.getElementById("satisfactionValue");
  const barEl = document.getElementById("satisfactionBar");
  let animated = false;

  function animateSatisfaction() {
    if (animated) return; // prevent retrigger
    animated = true;

    let current = 0;
    const target = 89; // final %
    const interval = setInterval(() => {
      current++;
      valueEl.textContent = current;
      barEl.style.width = current + "%";
      if (current >= target) clearInterval(interval);
    }, 30); // speed (30ms per step)
  }

  // Trigger when visible
  const observer = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) animateSatisfaction();
  }, { threshold: 0.5 });

  observer.observe(document.querySelector(".satisfaction-card"));
});
