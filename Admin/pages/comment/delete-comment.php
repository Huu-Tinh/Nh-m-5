<?php
if (isset($_GET['id_cmt']) && isset($_GET['id_pr'])) {
    $id = $_GET['id_cmt'];
    $id_pr = $_GET['id_pr'];

    // Tiếp tục xử lý
    $cmt = new comment();
    $select = $cmt->delete($id, $_SESSION['username']);
} else {
    // Xử lý khi không có giá trị id_cmt hoặc id_pr
}
if ($select) {
    header('location: index.php?act=shop-single&id_pr=' . $id_pr);
    exit();
} else {
    // Xử lý khi xóa comment không thành công
    header('location: index.php?act=shop-single&id_pr=' . $id_pr);
}

// $id = $_GET['id_cmt'];
// $id_pr = $_GET['id_pr'];
// $cmt = new comment();
// $select = $cmt->delete($id, $_SESSION['username']);
// header('location: index.php?act=shop-single&id_pr=' . $id_pr);
