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
<script src="./resources/js/main.js" defer></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        <?php if ($subscription_result['success']): ?>
        const successModal = new bootstrap.Modal(document.getElementById('newslettersuccessModal'));
        successModal.show();
        <?php else: ?>
        document.getElementById('newslettererrorModalMessage').innerText = "<?php echo addslashes($subscription_result['message']); ?>";
        const errorModal = new bootstrap.Modal(document.getElementById('newslettererrorModal'));
        errorModal.show();
        <?php endif; ?>
    }, 500);
    });
</script>