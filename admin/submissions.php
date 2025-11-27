<?php
include 'includes/admin-head.php';
include 'includes/admin-navbar.php';
include 'includes/admin-functions.php';
include 'includes/admin-sidebar.php';
?>

    <!-- Main Contents Switching -->
    <?php
        // Then handle normal page content
        if (isset($_GET['source'])) {
            $source = $_GET['source'];
        } else {
            $source = '';
        }

        switch ($source) {
            case 'view_all_call_bookings':
                include "includes/view_all_call_bookings.php";
                break;

            case 'view_newsletter_subscribers':
                include "includes/view_newsletter_subscribers.php";
                break;

            default:
                include "includes/view_all_inquiries.php";
                break;
        }
    ?>
    
<!-- Main Container Closing Div in Footer page -->

<?php
include 'includes/admin-footer.php';
?>