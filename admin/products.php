<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
?>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="h4">Products Management</h2>
                <p class="text-muted">Manage all Jolaha Products</p>
            </div>
        </div>
    
        <!-- Alert Messages -->
        <div id="alertBox"></div>
        
        <!-- Success Messages from URL parameters -->
        <?php if(isset($_GET['added']) && $_GET['added'] == 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> Product added successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['updated']) && $_GET['updated'] == 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> Product updated successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['deleted']) && $_GET['deleted'] == 'true'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill"></i> Product deleted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['error']) && $_GET['error'] == 'true'): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill"></i> Error occurred while processing your request!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <div class="row">
            <!-- Form Section -->
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-plus-circle me-2"></i>
                            <?php echo isset($_GET['edit']) ? 'Edit Product' : 'Add New Product'; ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="productForm">
                            <?php if(isset($_GET['edit'])): 
                                $product = getProductById($_GET['edit']);
                                if($product):
                            ?>
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <?php endif; endif; ?>
                            
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Product Name *</label>
                                <input type="text" id="product_name" name="product_name" class="form-control" 
                                    value="<?php echo isset($product) ? htmlspecialchars($product['product_name']) : ''; ?>" 
                                    required placeholder="Enter product name">
                            </div>
                            
                            <div class="d-flex gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="bi bi-check-lg me-1"></i>
                                    <?php echo isset($_GET['edit']) ? 'Update Product' : 'Add Product'; ?>
                                </button>
                                
                                <?php if(isset($_GET['edit'])): ?>
                                    <a href="products.php" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-1"></i> Cancel
                                    </a>
                                <?php endif; ?>
                            </div>
                        </form>
                        <?php
                        // Call the insert/update function
                        insert_products();
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Table Section -->
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-list-ul me-2"></i> Existing Products
                        </h5>
                        <span class="badge bg-primary"><?php echo countProducts(); ?> products</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="80">ID</th>
                                        <th>Product Name</th>
                                        <th width="150">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                    // Call the function to display all products
                                    findAllProducts();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteProductModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the product "<strong id="productName"></strong>"?</p>
                <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete Product</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <i class="bi bi-check-circle-fill text-success display-4 mb-3"></i>
                <p id="successMessage"></p>
            </div>
            <div class="modal-footer">
                <!--button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button-->
            </div>
        </div>
    </div>
</div>

<?php
// Call the delete function
deleteProduct();
?>

<script>
// Products Management JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Delete product functionality
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
    const productNameElement = document.getElementById('productName');
    const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
    let productToDelete = null;

    // Add event listeners to all delete buttons using event delegation
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-product-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.delete-product-btn');
            productToDelete = btn.getAttribute('data-product-id');
            const productName = btn.getAttribute('data-product-name');
            productNameElement.textContent = productName;
            deleteModal.show();
        }
    });

    // Confirm delete action
    confirmDeleteBtn.addEventListener('click', function() {
        if (productToDelete) {
            // Show loading state
            confirmDeleteBtn.disabled = true;
            confirmDeleteBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Deleting...';
            
            // Send delete request
            fetch(`products.php?delete_product=${productToDelete}`)
                .then(response => response.text())
                .then(data => {
                    // Close modal
                    deleteModal.hide();
                    
                    // Show success message and reload
                    showSuccessModal('Product deleted successfully!');
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('An error occurred while deleting the product.', 'error');
                    confirmDeleteBtn.disabled = false;
                    confirmDeleteBtn.innerHTML = 'Delete Product';
                });
        }
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            if (alert.parentNode) {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }
        }, 5000);
    });

    // Scroll to form when in edit mode
    <?php if(isset($_GET['edit'])): ?>
        const formSection = document.querySelector('.card');
        if(formSection) {
            formSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    <?php endif; ?>
});

// Show alert function
function showAlert(message, type = 'success') {
    const alertBox = document.getElementById('alertBox');
    const alertClass = type === 'error' ? 'alert-danger' : 'alert-success';
    const icon = type === 'error' ? 'bi-exclamation-triangle-fill' : 'bi-check-circle-fill';
    
    alertBox.innerHTML = `
        <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="bi ${icon} me-2"></i> ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `;
    
    // Auto-hide after 5 seconds
    setTimeout(() => {
        const alert = alertBox.querySelector('.alert');
        if (alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }
    }, 5000);
}

// Show success modal
function showSuccessModal(message) {
    const successMessage = document.getElementById('successMessage');
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    
    if (successMessage) {
        successMessage.textContent = message;
        successModal.show();
    }
}

// Function to set delete ID (for compatibility)
function setDeleteId(productId, productName) {
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteProductModal'));
    document.getElementById('productName').textContent = productName;
    document.getElementById('confirmDeleteBtn').onclick = function() {
        window.location.href = `products.php?delete_product=${productId}`;
    };
    deleteModal.show();
}
</script>

<?php
include 'includes/admin-footer.php';
?>