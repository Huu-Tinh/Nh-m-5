<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- <link rel="stylesheet" href="../login/style.css" /> -->
    <!-- <link rel="stylesheet" href="../login/main.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>

    <?php
    include("../Admin/includes/pdo.php");
    include("../Admin/pages/product/product.php");
    include("../Admin/pages/user/user.php");
    if (isset($_SESSION['username'])) {
        $selectUser = new user();
        $user = $selectUser->checkId($_SESSION['username']);
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    include("./includes/nav.php");
    include("./includes/header.php");

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'login':
                include '../login/login.php';
                break;
            case 'home':
                include './pages/home.php';
                break;
            case 'about':
                include './pages/about.php';
                break;
            case 'contact':
                include './pages/contact.php';
                break;
            case 'shop':
                include './pages/shop.php';
                break;
            case 'shop-single':
                include './pages/shop-single.php';
                break;
            case 'carts':
                switch ($_GET['get']) {
                    case 'cart':
                        // Danh sách giỏ hàng
                        include './pages/cart/listCart.php';
                        break;
                    case 'toCart':
                        // Mua tiếp 
                        if (isset($_POST['continue'])) {
                            header('location: index.php?act=shop');
                        }
                        // Cập nhật giỏ hàng 
                        if (isset($_POST['updateCart'])) {
                            header('location: index.php?act=shop');
                        }
                        // Xóa giỏ hàng 
                        if (isset($_POST['deleteCart'])) {
                            unset($_SESSION['cart']);
                            header('location: index.php?act=home');
                        }
                        // Thêm giỏ hàng
                        if (isset($_POST['addcart'])) {
                            $id = $_POST['id_product'];
                            $name = $_POST['name'];
                            $price = $_POST['price'];
                            $img = $_POST['img'];
                            $size = $_POST['size'];
                            $quantity = $_POST['quantity'];
                            // Kiểm tra số lượng
                            if (isset($_POST['quantity']) && $_POST['quantity'] > 0) {
                                $quantity = $_POST['quantity'];
                            } else {
                                $quantity = 1;
                            }
                            // Kiểm tra sp 
                            $i = 0;
                            $check = 0;
                            foreach ($_SESSION['cart'] as $item) {
                                if ($item[1] == $name && $item[5] == $size) {
                                    $_SESSION['cart'][$i][4] += $quantity;
                                    $check = 1;
                                    break;
                                }
                                $i++;
                            }
                            if ($check == 0) {
                                $item = array($id, $name, $img, $price, $quantity, $size);
                                $_SESSION['cart'][] = $item;
                            }
                            header('location: index.php?act=carts&get=cart');
                        }
                        break;
                    default:
                        # code...
                        break;
                }
                break;
            default:
                include './pages/home.php';
                break;
        }
    } else {
        include './pages/home.php';
    }
    include("./includes/footer.php");

    ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/btn.js" type="text/javascript"></script>
    <!-- End Script -->
</body>

</html>