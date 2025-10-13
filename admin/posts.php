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
            case 'add_post':
                include "includes/add_post.php";
                break;

            case 'edit_post':
                include "includes/edit_post.php";
                break;

            case 'delete_post':
                include "includes/delete_post.php";
                break;

            default:
                include "includes/view_all_posts.php";
                break;
        }
    ?>
    
<!-- Main Container Closing Div in Footer page -->

<?php
include 'includes/admin-footer.php';
?>