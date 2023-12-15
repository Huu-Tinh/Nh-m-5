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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="../Admin/assets/js/sweetalert.js"></script>
    <!-- <link rel="stylesheet" href="../login/style.css" /> -->
    <!-- <link rel="stylesheet" href="../login/main.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!--
        
        TemplateMo 559 Zay Shop
        
        https://templatemo.com/tm-559-zay-shop
        
    -->
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <?php
    include("../Admin/includes/pdo.php");
    include("../Admin/pages/product/product.php");
    include("../Admin/pages/user/user.php");
    include("../Admin/pages/comment/comment.php");
    include("../Admin/pages/categori/categori.php");
    include("../Admin/pages/order/order.php");
    include("../Admin/pages/template/banner.php");
    $product = new product();
    $order = new order();
    $getProduct = $product->getproduct();
    if (isset($_SESSION['status'])) {
        echo '
    <script>
        swal({
            title: "' . $_SESSION['status'] . '",
            icon: "' . $_SESSION['status_code'] . '",
            button: "Đồng ý!",
        });
    </script>
    ';
        unset($_SESSION['status']);
    }
    $selectUser = new user();
    if (isset($_SESSION['username'])) {
        $user = $selectUser->checkId($_SESSION['username']);
        $countcart = $order->getcountcart($user['id_user']);
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
    include("./includes/nav.php");
    include("./includes/header.php");
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
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
            case 'profiles':
                include './includes/myprofile.php';
                break;
            case 'delete-comment':
                include '../Admin/pages/comment/delete-comment.php';
                break;
            case 'carts':
                switch ($_GET['get']) {
                    case 'order':
                        include './pages/cart/order.php';
                        break;
                    case 'detailorder':
                        include './pages/cart/detailorder.php';
                        break;
                    case 'cart':
                        // Danh sách giỏ hàng
                        if (isset($_SESSION['username'])) {
                            include './pages/cart/listCart.php';
                        } else {
                            $_SESSION['status'] = "Vui lòng đăng nhập!";
                            $_SESSION['status_code'] = "error";
                            header("Location: " . $_SERVER['HTTP_REFERER']);
                            exit();
                        }
                        break;
                    case 'vnpay':
                        $id_order = $_GET['idorder'];
                        echo $id_order;
                        if ($_GET['vnp_TransactionNo'] != 0) {
                            $gettocart = $order->gettocart($user['id_user']);
                            foreach ($gettocart as $item) {
                                $order->addtocat($id_order, $item['product_id'], $item['name_pr'], $item['img'], $item['price'], $item['quantity_cart']);
                            }
                            $order->delete_formcart_user($user['id_user']);
                            $_SESSION['status'] = "Thanh toán thành công!";
                            $_SESSION['status_code'] = "success";
                            header('location: index.php?act=home');
                        } else {
                            $_SESSION['status'] = "Bạn đã hủy thanh toán!";
                            $_SESSION['status_code'] = "error";
                            header('location: index.php?act=carts&get=cart');
                        }
                        break;
                    case 'pay':
    ?><div class="loadpay"></div>
                        <?
                        if (isset($_POST['addpay'])) {
                            $total = $_POST['total'];
                            $username = $user['username'];
                            $phone = $user['phone'];
                            $address = $user['address'];
                            $pttt = $_POST['pttt'];
                            $codepay = "ZCT" . rand(0, 999999);
                            $gettocart = $order->gettocart($user['id_user']);
                            $id_order = $order->addorder($codepay, $total, $pttt, $username, $phone, $address, $user['id_user']);
                            if ($countcart['count'] > 0) {
                                if ($pttt == 1) {
                                    foreach ($gettocart as $item) {
                                        $order->addtocat($id_order, $item['product_id'], $item['name_pr'], $item['img'], $item['price'], $item['quantity_cart']);
                                    }
                                    $order->delete_formcart_user($user['id_user']);
                                    $_SESSION['status'] = "Thanh toán thành công!";
                                    $_SESSION['status_code'] = "success";
                                    header('location: index.php?act=home');
                                } else {
                                    include './pages/cart/vnpay.php';
                                }
                            }
                        }
                        ?></div><?
                                break;
                            case 'delete':
                                if (isset($_GET['id'])) {
                                    $order->delete_idcart($_GET['id']);
                                    header('location: index.php?act=carts&get=cart');
                                } else {
                                    $order->delete_formcart_user($user['id_user']);
                                    header('location: index.php?act=shop');
                                }
                                break;
                            case 'toCart':
                                if (isset($_SESSION['username'])) {
                                    // Mua tiếp 
                                    if (isset($_POST['continue'])) {
                                        header('location: index.php?act=shop');
                                    }
                                    // Cập nhật giỏ hàng 
                                    if (isset($_POST['updateCart'])) {
                                        header('location: index.php?act=shop');
                                    }
                                    // Thêm giỏ hàng
                                    if (isset($_POST['addcart'])) {
                                        $id = $_POST['id_product'];
                                        $size = $_POST['size'];
                                        $checkpro = $product->checkId($id);
                                        $selectCart = $order->getcart();
                                        $sumquantity = $order->getsum_quantity_cart($user['id_user'], $id);
                                        // Kiểm tra số lượng
                                        if (isset($_POST['quantity']) && $_POST['quantity'] > 0) {
                                            $quantity = $_POST['quantity'];
                                        } else {
                                            $quantity = 1;
                                        }
                                        // Kiểm tra sp 
                                        $check = 0;
                                        if ($quantity < $checkpro['quantity']) {
                                            foreach ($selectCart as $cart) {
                                                $sum = $quantity + $sumquantity['sum'];
                                                if ($sum <= $checkpro['quantity']) {
                                                    if ($id == $cart['product_id'] && $size == $cart['size']) {
                                                        $updatecart = $order->updatecart($cart['id_cart'], $quantity + $cart['quantity_cart']);
                                                        $check = 1;
                                                        header('location: index.php?act=carts&get=cart');
                                                    }
                                                } else {
                                                    $_SESSION['status'] = "Số lượng sản phẩm không đủ!";
                                                    $_SESSION['status_code'] = "error";
                                                    header("Location: " . $_SERVER['HTTP_REFERER']);
                                                }
                                            }
                                            if ($check == 0 && $sum <= $checkpro['quantity']) {
                                                $addcart = $order->addcart($user['id_user'], $id, $quantity, $size);
                                                header('location: index.php?act=carts&get=cart');
                                            }
                                            // $addcart = $order->addcart($user['id_user'], $id, $quantity, $size);
                                        } else {
                                            $_SESSION['status'] = "Số lượng sản phẩm không đủ!";
                                            $_SESSION['status_code'] = "error";
                                            header("Location: " . $_SERVER['HTTP_REFERER']);
                                        }
                                    }
                                } else {
                                    $_SESSION['status'] = "Vui lòng đăng nhập!";
                                    $_SESSION['status_code'] = "error";
                                    header('location: index.php?act=home');
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
            foreach ($getProduct as $data) { ?>
        <script>
            function decreaseNumber<?= $data['id_product'] ?>() {
                var numberInput = document.getElementById("myNumber<?= $data['id_product'] ?>");
                var currentValue = parseInt(numberInput.value);
                numberInput.value = currentValue - 1;
                if (numberInput.value <= 0) {
                    numberInput.value = 1;
                };
            }

            function increaseNumber<?= $data['id_product'] ?>() {
                var numberInput = document.getElementById("myNumber<?= $data['id_product'] ?>");
                var currentValue = parseInt(numberInput.value);
                numberInput.value = currentValue + 1;
            }
        </script>
    <? }
    ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>