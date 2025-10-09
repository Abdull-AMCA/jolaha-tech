<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
?>

    <!-- Main Contents Switching -->
    <?php
        
        if(isset($_GET['source'])) {
        $source = $_GET['source'];
        } else {
        $source = '';
        }

        switch($source) {
        case 'add_service':
        include "includes/add_service.php";
        break;

        case 'edit_service':
        include "includes/edit_service.php";
        break;

        case '200':
        echo "Nice 200";
        break;

        default:

        include "includes/add_service.php";

        break;
        }
    ?>

    
<!-- Main Container Closing Div in Footer page -->

<?php
include 'includes/admin-footer.php';
?>