
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            include './pages/home.php';
            break;
        default:
            # code...
            break;
    }
}

?>