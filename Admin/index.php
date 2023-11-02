
<?php
if (isset($_GET['act'])) {
    # code...
}
switch ($_GET['act']) {
    case 'home':
        include './pages/home.php';
        break;
    default:
        # code...
        break;
}
?>