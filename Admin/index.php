<?php
session_start();
ob_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
    <?
    include './includes/pdo.php';
    include './pages/user/user.php';
    include './pages/categori/categori.php';
    include './pages/product/product.php';
    include './pages/comment/comment.php';
    if (isset($_SESSION['admin'])) {
        $user = new user();
        $selectUs = $user->checkId($_SESSION['admin']);
    ?>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
            <?php
            include './includes/sidebar.php';
            ?>
            <!--  Main wrapper -->
            <div class="body-wrapper">
            <?
            include './includes/header.php';
        } ?>
            <?php

            $action = 'home';
            if (isset($_GET['act'])) {
                $action = $_GET['act'];
            }
            if (!isset($_SESSION['admin'])) {
                $action = 'login';
            }

            switch ($action) {
                case 'home':
                    include './pages/home.php';
                    break;
                case 'login':
                    include './includes/login.php';
                    break;
                case 'froms':
                    include './pages/forms.php';
                    break;

                case 'user':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/user/listUser.php';
                            break;
                        case 'add':
                            include './pages/user/add.php';
                            break;
                        case 'update':
                            include './pages/user/update.php';
                            break;
                        case 'delete':
                            $user = new user();
                            $id = $_GET['id'];
                            if ($_SESSION['admin'] != $id) {
                                if (isset($_POST['delete'])) {
                                    $user->delete($id);
                                    header('Location: index.php?act=user&get=list');
                                };
                            } else {
                                header('Location: index.php?act=user&get=list');
                            };
                            break;
                        default:
                            // include './pages/user/listUser.php';
                            break;
                    }
                    break;
                case 'categori':
                    switch ($_GET['get']) {

                        case 'list':
                            include './pages/categori/listCategori.php';
                            break;
                        case 'add':
                            include './pages/categori/add.php';
                            break;
                        case 'update':
                            include './pages/categori/update.php';
                            break;
                        case 'delete':
                            $categori = new categori();
                            $id = $_GET['id'];
                            if (isset($_POST['delete'])) {
                                $categori->delete($id);
                                header('Location: index.php?act=categori&get=list');
                            }
                            break;
                        default:

                            break;
                    }
                    break;

                case 'comment':
                    switch ($_GET['get']) {

                        case 'list':
                            include './pages/comment/listComment.php';
                            break;
                        case 'detail_comment':
                            include './pages/comment/detail_comment.php';
                            break;
                        case 'dalete_comment':
                            include './pages/comment/delete-comment.php';
                            break;
                            case 'delete':
                                $comment = new comment();
                                $id_cmt = $_GET['id_cmt'];
                               $id = $_GET['id_cmts'];
                                if (isset($_POST['delete'])) {
                                    $comment->delete($id_cmt);
                                    header('Location: index.php?act=comment&get=detail_comment&id_cmts='.$id);
                                    exit;
                                }
                                break;


                        default:

                            break;
                    }
                    break;

                case 'product':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/product/listProduct.php';
                            break;
                        case 'add':
                            include './pages/product/add.php';
                            break;
                        case 'update':
                            include './pages/product/update.php';
                            break;
                        case 'delete':
                            $product = new product();
                            $id = $_GET['id'];
                            if (isset($_POST['delete'])) {
                                $product->delete($id);
                                header('Location: index.php?act=product&get=list');
                            }
                            break;
                        default:

                            break;
                    }
                    break;

                case 'order':
                    switch ($_GET['get']) {
                        case 'list':
                            include './pages/order/listOrder.php';
                            break;
                        case 'add':
                            include './pages/order/add.php';
                            break;
                        case 'update':
                            include './pages/order/update.php';
                            break;

                        default:

                            break;
                    }
                    break;
                default:
                    include './pages/home.php';
                    break;
            }


            ?>
            </div>
        </div>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/dashboard.js"></script>
</body>

</html>