<footer id="contact">
    <div class="container footer-grid">
        <!-- About -->
        <div>
        <a class="brand" href="#">Jolaha Technologies</a>
        <p>Trusted IT Solutions and consultations services for over 5 years.</p>

        <!-- Social Media -->
        <div class="social-links mt-3">
            <a href="https://facebook.com" target="_blank" aria-label="Facebook">
            <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com" target="_blank" aria-label="Twitter">
            <i class="bi bi-twitter"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn">
            <i class="bi bi-linkedin"></i>
            </a>
            <a href="https://instagram.com" target="_blank" aria-label="Instagram">
            <i class="bi bi-instagram"></i>
            </a>
        </div>
        </div>

        <!-- Quick Links -->
        <div>
        <h4>Quick Links</h4>
        <a href="about.php">About Jolaha Tech</a><br>
        <a href="our-products.php">Our Products</a><br>
        <a href="our-services.php">Our Services</a><br>
        <a href="our-solutions.php">Our Solutions</a>
        </div>

        <!-- Contact -->
        <div>
        <h4>Contact</h4>
        <p><i class="bi bi-envelope me-2"></i> info@jolaha.com</p>
        <p><i class="bi bi-telephone me-2"></i> +971 12 345 6789</p>
        <p><i class="bi bi-geo-alt me-2"></i> BB2 Tower, Mazaya Business Avenue, JLT Dubai UAE.</p>
        </div>

        <!-- Map -->
        <div>
        <h4>Find Us</h4>
        <div style="width: 100%; height: 200px; border-radius: var(--radius); overflow: hidden;">
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.9130389097717!2d55.15352!3d25.074282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6c999999999%3A0xabcdef123456789!2sMazaya%20Business%20Avenue%2C%20JLT%20Dubai!5e0!3m2!1sen!2sae!4v1697891234567" 
            width="100%" 
            height="60%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        </div>
    </div>

    <p style="text-align:center; margin-top:2rem; color:var(--muted); font-size:.85rem;">
        © 2025 Jolaha Technologies. All rights reserved.
    </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="resources/js/main.js" defer></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
const counters = document.querySelectorAll(".num");
let started = false;

function animateCount(counter) {
    const target = counter.getAttribute("data-target");
    const isPercentage = target.includes("%");
    const isPlus = target.includes("+");
    const isGrade = target.toUpperCase().includes("A+");

    if (isGrade) {
    // Animate 0 → 100, then replace with "A+"
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
    // Handle numbers with + or %
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

    if (!started && rect.top < window.innerHeight && rect.bottom > 0) {
    counters.forEach(animateCount);
    started = true;
    }
}

window.addEventListener("scroll", checkScroll);
});


document.addEventListener("DOMContentLoaded", function() {
const categorySelect = document.getElementById("categorySelect");
const subServiceSelect = document.getElementById("subServiceSelect");
const budgetRange = document.getElementById("budgetRange");
const budgetInput = document.getElementById("budgetInput");
const budgetDisplay = document.getElementById("budgetDisplay");

const options = {
    products: [
    "Jolaha CRMS",
    "Jolaha HRMS",
    "Jolaha Accountrix",
    "Jolaha PMS",
    "Jolaha Help Desk",
    "Jolaha AML",
    "Jolaha LMS"
    ],
    services: [
    "Web Design & Development",
    "Mobile Application",
    "Online Marketing",
    "Creative Design",
    "Software Testing"
    ],
    solutions: [
    "Server Management",
    "IT Support",
    "Cloud",
    "Hosting"
    ]
};

// Update sub-service options dynamically
categorySelect.addEventListener("change", function() {
    const selected = this.value;
    subServiceSelect.innerHTML = '<option value="">-- Select Option --</option>';
    if (options[selected]) {
    options[selected].forEach(opt => {
        const optionEl = document.createElement("option");
        optionEl.value = opt;
        optionEl.textContent = opt;
        subServiceSelect.appendChild(optionEl);
    });
    }
});

// Sync budget slider and input
function updateBudget(value) {
    budgetDisplay.textContent = new Intl.NumberFormat().format(value) + " AED";
    budgetInput.value = value;
    budgetRange.value = value;
}

budgetRange.addEventListener("input", e => updateBudget(e.target.value));
budgetInput.addEventListener("input", e => updateBudget(e.target.value));
});

// Back to top button functionality
document.addEventListener('DOMContentLoaded', function() {
    const backToTopButton = document.querySelector('.back-to-top');
    
    // Show/hide button based on scroll position
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });
    
    // Smooth scroll to top
    backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // WhatsApp button click tracking (optional)
    const whatsappBtn = document.querySelector('.whatsapp-btn');
    whatsappBtn.addEventListener('click', function() {
        // You can add analytics tracking here
        console.log('WhatsApp button clicked');
    });
});
</script>