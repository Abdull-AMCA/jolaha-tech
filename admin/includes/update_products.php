<?php
// update_products.php
if(isset($_GET['edit'])) {
    $product_id = $_GET['edit'];
    $product = getProductById($product_id);
    
    if($product):
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Scroll to form when in edit mode
    const formSection = document.querySelector('.form-section');
    if(formSection) {
        formSection.scrollIntoView({ behavior: 'smooth' });
    }
    
    // Update page title when editing
    const pageTitle = document.querySelector('.page-title');
    if(pageTitle) {
        pageTitle.textContent = 'Edit Product - Products Management';
    }
});
</script>
<?php
    endif;
}
?>