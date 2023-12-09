<?php
$categori = new categori();
$name_ct = $_POST['name'] ?? '';
$note = $_POST['note'] ?? '';
if (isset($_POST['closs'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if (isset($_POST['addcategori'])) {
    try {
        if (!empty($_POST['name'])) {
            $categori->add($name_ct, $note);
            $_SESSION['status'] = "Thêm thành công";
            $_SESSION['status_code'] = "success";
            header('Location: index.php?act=categori&get=list');
        }
        if (empty($_POST['name'])) {
            $errors['name']['required'] = "Nhập đầy tên loại!";
        }
    } catch (Exception $e) {
        $_SESSION['status'] = "Đã có phân loại này";
        $_SESSION['status_code'] = "error";

        // Redirect to a custom error page
        header('Location: index.php?act=categori&get=list');
    }
}

?>
<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới loại sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <input type="text" name="note" value="<?= $note ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="closs" class="btn btn-secondary">Hủy</button>
                    <button type="submit" name="addcategori" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>