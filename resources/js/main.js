/* =======================================================
   main.js — Jolaha Tech Website Scripts
   ======================================================= */

/* ===============================================
   Navbar Toggle + Hamburger Animation
   =============================================== */
const menuToggle = document.getElementById("menu-toggle");
const menu = document.getElementById("menu");

if (menuToggle && menu) {
  menuToggle.addEventListener("click", () => {
    menu.classList.toggle("show");
    menuToggle.classList.toggle("open");

    // Animate hamburger bars
    const spans = menuToggle.querySelectorAll("span");
    spans[0].classList.toggle("rotate1");
    spans[1].classList.toggle("fade");
    spans[2].classList.toggle("rotate2");
  });
}

// Add extra CSS for hamburger animation
const style = document.createElement("style");
style.textContent = `
  .menu-toggle.open span:nth-child(1){ transform: rotate(45deg) translateY(8px); }
  .menu-toggle.open span:nth-child(2){ opacity:0; }
  .menu-toggle.open span:nth-child(3){ transform: rotate(-45deg) translateY(-8px); }
  .menu-toggle span { transition: all .3s ease; }
`;
document.head.appendChild(style);

/* ===============================================
   Dynamic Year
   =============================================== */
const yearEl = document.getElementById("year");
if (yearEl) yearEl.textContent = new Date().getFullYear();

/* ===============================================
   Smooth Scroll for Internal Anchors
   =============================================== */
document.querySelectorAll('a[href^="#"]').forEach((a) => {
  a.addEventListener("click", (e) => {
    const id = a.getAttribute("href");
    if (id && id.length > 1) {
      const el = document.querySelector(id);
      if (el) {
        e.preventDefault();
        el.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    }
  });
});

/* ===============================================
   Reveal on Scroll (Basic Fade/Slide Animation)
   =============================================== */
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.animate(
          [
            { opacity: 0, transform: "translateY(12px)" },
            { opacity: 1, transform: "translateY(0)" },
          ],
          { duration: 500, easing: "ease-out", fill: "forwards" }
        );
        revealObserver.unobserve(entry.target);
      }
    });
  },
  { threshold: 0.12 }
);

document
  .querySelectorAll(".service, .stat, .quote, .cta")
  .forEach((el) => revealObserver.observe(el));

/* ===============================================
   Stats Counter
   =============================================== */

  const counters = document.querySelectorAll(".num");
  let counterStarted = false;

  function animateCount(counter) {
    const target = counter.getAttribute("data-target");
    const isPercentage = target.includes("%");
    const isPlus = target.includes("+");
    const isGrade = target.toUpperCase().includes("A+");

    if (isGrade) {
      let count = 0;
      const duration = 2000;
      const stepTime = 20;
      const increment = Math.ceil(100 / (duration / stepTime));

      const timer = setInterval(() => {
        count += increment;
        if (count >= 100) {
          clearInterval(timer);
          counter.textContent = "A+";
        } else {
          counter.textContent = count;
        }
      }, stepTime);
    } else {
      const numericTarget = parseInt(target.replace(/\D/g, ""), 10);
      let count = 0;
      const duration = 2000;
      const stepTime = Math.max(Math.floor(duration / numericTarget), 20);

      const timer = setInterval(() => {
        count++;
        if (count >= numericTarget) {
          clearInterval(timer);
          counter.textContent = isPercentage
            ? numericTarget + "%"
            : numericTarget + (isPlus ? "+" : "");
        } else {
          counter.textContent = isPercentage
            ? count + "%"
            : count + (isPlus ? "+" : "");
        }
      }, stepTime);
    }
  }

  function checkScroll() {
    const section = document.querySelector("#stats");
    if (!section) return;
    const rect = section.getBoundingClientRect();
    if (!counterStarted && rect.top < window.innerHeight && rect.bottom > 0) {
      counters.forEach(animateCount);
      counterStarted = true;
    }
  }

  // Initialize on load and scroll
  window.addEventListener("load", checkScroll);
  window.addEventListener("scroll", checkScroll);

  // Also check immediately in case the section is already in view
  setTimeout(checkScroll, 100);


/* ===============================================
   Satisfaction Progress Card
   =============================================== */
const satisfactionCard = document.querySelector(".satisfaction-card");
if (satisfactionCard) {
  const valueEl = document.getElementById("satisfactionValue");
  const barEl = document.getElementById("satisfactionBar");
  let animated = false;

  function animateSatisfaction() {
    if (animated) return;
    animated = true;
    let current = 0;
    const target = 89;
    const interval = setInterval(() => {
      current++;
      valueEl.textContent = current;
      barEl.style.width = current + "%";
      if (current >= target) clearInterval(interval);
    }, 30);
  }

  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) animateSatisfaction();
    },
    { threshold: 0.5 }
  );
  observer.observe(satisfactionCard);
}

/* ===============================================
   Dynamic Category → Sub-service & Budget Slider
   =============================================== */
const categorySelect = document.getElementById("categorySelect");
const subServiceSelect = document.getElementById("subServiceSelect");
const budgetRange = document.getElementById("budgetRange");
const budgetInput = document.getElementById("budgetInput");
const budgetDisplay = document.getElementById("budgetDisplay");

if (categorySelect && subServiceSelect) {
  const options = {
    products: [
      "Jolaha CRMS",
      "Jolaha HRMS",
      "Jolaha Accountrix",
      "Jolaha PMS",
      "Jolaha Help Desk",
      "Jolaha AML",
      "Jolaha LMS",
    ],
    services: [
      "Web Design & Development",
      "Mobile Application",
      "Online Marketing",
      "Creative Design",
      "Software Testing",
    ],
    solutions: ["Server Management", "IT Support", "Cloud", "Hosting"],
  };

  categorySelect.addEventListener("change", function () {
    const selected = this.value;
    subServiceSelect.innerHTML = '<option value="">-- Select Option --</option>';
    if (options[selected]) {
      options[selected].forEach((opt) => {
        const optionEl = document.createElement("option");
        optionEl.value = opt;
        optionEl.textContent = opt;
        subServiceSelect.appendChild(optionEl);
      });
    }
  });
}

if (budgetRange && budgetInput && budgetDisplay) {
  function updateBudget(value) {
    const formatted = new Intl.NumberFormat().format(value) + " AED";
    budgetDisplay.textContent = formatted;
    budgetInput.value = value;
    budgetRange.value = value;
  }

  budgetRange.addEventListener("input", (e) => updateBudget(e.target.value));
  budgetInput.addEventListener("input", (e) => updateBudget(e.target.value));
}

/* ===============================================
   Back to Top & WhatsApp Buttons
   =============================================== */
const backToTopButton = document.querySelector(".back-to-top");
const whatsappBtn = document.querySelector(".whatsapp-btn");

if (backToTopButton) {
  window.addEventListener("scroll", function () {
    if (window.pageYOffset > 300) {
      backToTopButton.classList.add("show");
    } else {
      backToTopButton.classList.remove("show");
    }
  });

  backToTopButton.addEventListener("click", function (e) {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
}

if (whatsappBtn) {
  whatsappBtn.addEventListener("click", function () {
    console.log("WhatsApp button clicked");
  });
}

/* ===============================================
   Bootstrap Modal Cleanup
   =============================================== */
document.querySelectorAll(".modal").forEach((modal) => {
  modal.addEventListener("hidden.bs.modal", () => {
    document.body.classList.remove("modal-open");
    document.querySelectorAll(".modal-backdrop").forEach((el) => el.remove());
  });
});


// ================================
// Multi-level Dropdown Support (Bootstrap 5)
// ================================

document.addEventListener("DOMContentLoaded", () => {
  // Handle nested dropdown toggles
  document.querySelectorAll(".dropdown-submenu > .dropdown-toggle").forEach(toggle => {
    toggle.addEventListener("click", e => {
      e.preventDefault();          // Prevent link navigation
      e.stopPropagation();         // Prevent Bootstrap from closing parent

      const parentMenu = toggle.closest(".dropdown-menu");

      // Close any other open submenus within the same parent
      parentMenu.querySelectorAll(".dropdown-menu.show").forEach(submenu => {
        if (submenu !== toggle.nextElementSibling) submenu.classList.remove("show");
      });

      // Toggle current submenu
      const submenu = toggle.nextElementSibling;
      if (submenu) submenu.classList.toggle("show");
    });
  });

  // Close all open submenus when the main dropdown closes
  document.querySelectorAll(".dropdown").forEach(dropdown => {
    dropdown.addEventListener("hide.bs.dropdown", () => {
      dropdown.querySelectorAll(".dropdown-menu.show").forEach(submenu => {
        submenu.classList.remove("show");
      });
    });
  });
});


// ================================
// Simple JavaScript to handle product switching
// ================================

    document.addEventListener('DOMContentLoaded', function() {
        const triggers = document.querySelectorAll('.product-trigger');
        const contents = document.querySelectorAll('.product-content');
        
        triggers.forEach(trigger => {
            trigger.addEventListener('click', function() {
                const productId = this.getAttribute('data-product');
                
                // Remove active class from all triggers and contents
                triggers.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked trigger and corresponding content
                this.classList.add('active');
                document.getElementById(`${productId}-content`).classList.add('active');
            });
        });
    });