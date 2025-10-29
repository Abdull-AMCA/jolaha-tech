<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-sidebar.php';
include 'includes/admin-functions.php';
?>

    <!-- Main Contents Switching -->
    <?php
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }

        switch ($source) {
            case 'add_career':
                include "includes/add_career.php";
                break;

            case 'edit_career':
                include "includes/edit_career.php";
                break;

            default:
                include "includes/view_all_careers.php";
                break;
        }
    ?>
    
<!-- Main Container Closing Div in Footer page -->

<?php
include 'includes/admin-footer.php';
?>