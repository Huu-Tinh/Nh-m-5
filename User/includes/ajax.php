<?php
// Gữi lời mời kết bạn
include("../../Admin/includes/pdo.php");
include("../../Admin/pages/product/product.php");
include("../../Admin/pages/user/user.php");
include("../../Admin/pages/comment/comment.php");
include("../../Admin/pages/categori/categori.php");
include("../../Admin/pages/order/order.php");
$selectUser = new user();
if ($_POST['action'] == 'updateinfo') {
    $username = $_POST['username'] ?? '';
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $id = $_POST['iduser'] ?? '';
    if (empty($username)) {
        $errors['name']['required'] = "Nhập đầy đủ họ tên!";
    }
    if (empty($phone)) {
        $errors['phone']['required'] = "Nhập đầy đủ số điện thoại!";
    }
    // if (!preg_match('[0-9]{10}', $phone) && !empty($_POST['phone'])) {
    //     $errors['phone']['format'] = "Số điện thoại không đúng định dạng!";
    // }
    if (empty($address)) {
        $errors['address']['required'] = "Nhập đầy đủ địa chỉ!";
    }
    if (!empty($username) && !empty($address) && !empty($phone)) {
        $update_info = $selectUser->update_info_cart($id, $username, $phone, $address);
        $_SESSION['status'] = "Cập nhật thành công!";
        $_SESSION['status_code'] = "success";
    }
}
if ($_POST['action'] == 'chane_password') {
    $iduser = $_POST['iduser'] ?? '';
    $password = $_POST['password'] ?? '';
    $password0 = $_POST['p0'] ?? '';
    $password1 = $_POST['p1'] ?? '';
    $password2 = $_POST['p2'] ?? '';
    if ($password0 == $password && $password1 == $password2) {
        $chanepass = $selectUser->chanepassword($iduser, $password2);
    }else{
        $errors['password']['required'] = "Mật khẩu không đúng!";
    }
}
