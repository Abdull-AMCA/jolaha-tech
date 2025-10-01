<?php
// Form handling with AJAX
document.addEventListener('DOMContentLoaded', function() {
    // Contact form handler
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'api/contact.php');
        });
    }
    
    // Trial request form handler
    const trialForms = document.querySelectorAll('.trial-form');
    trialForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'api/trial-request.php');
        });
    });
    
    // Service inquiry form handler
    const serviceForms = document.querySelectorAll('.service-inquiry-form');
    serviceForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'api/service-inquiry.php');
        });
    });
    
    // Newsletter form handler
    const newsletterForms = document.querySelectorAll('.newsletter-form');
    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            submitForm(this, 'api/newsletter.php');
        });
    });
});

function submitForm(form, endpoint) {
    const formData = new FormData(form);
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Show loading state
    submitBtn.innerHTML = '<i class="bi bi-arrow-repeat spinner"></i> Processing...';
    submitBtn.disabled = true;
    
    fetch(endpoint, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('success', data.message);
            form.reset();
        } else {
            showMessage('error', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showMessage('error', 'An error occurred. Please try again.');
    })
    .finally(() => {
        // Reset button state
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
}

function showMessage(type, message) {
    // Remove existing messages
    const existingMessages = document.querySelectorAll('.alert-message');
    existingMessages.forEach(msg => msg.remove());
    
    // Create new message
    const messageDiv = document.createElement('div');
    messageDiv.className = `alert-message alert alert-${type === 'success' ? 'success' : 'danger'} mt-3`;
    messageDiv.innerHTML = `
        <div class="d-flex align-items-center">
            <i class="bi ${type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-circle-fill'} me-2"></i>
            <span>${message}</span>
        </div>
    `;
    
    // Add to page (you might want to customize this based on your layout)
    const forms = document.querySelectorAll('form');
    if (forms.length > 0) {
        forms[0].parentNode.insertBefore(messageDiv, forms[0].nextSibling);
    } else {
        document.body.insertBefore(messageDiv, document.body.firstChild);
    }
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        messageDiv.remove();
    }, 5000);
}
?>