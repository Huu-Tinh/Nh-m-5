<?php

$product = new product();

$id = $_GET['id'];
$select = $product->checkid($id);
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$note = $_POST['describe'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$categori_id = $_POST['categori_id'] ?? '';

if (isset($_POST['updateproduct'])) {
    $img = $_POST['img'] ? $_POST['img'] : $select['img'];
    $img_1 = $_POST['img_1'] ? $_POST['img_1'] : $select['img_1'];
    $img_2 = $_POST['img_2'] ? $_POST['img_2'] : $select['img_2'];
    $img_3 = $_POST['img_3'] ? $_POST['img_3'] : $select['img_3'];

    if (empty($_POST['name'])) {
        $errors['name']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['price'])) {
        $errors['price']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['img'])) {
        $errors['img']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['img_1'])) {
        $errors['img_1']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['img_2'])) {
        $errors['img_2']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['img_3'])) {
        $errors['img_3']['required'] = "Nhập đầy đủthông tin! ";
    }
    if (empty($_POST['note'])) {
        $errors['note']['required'] = "Nhập đầy đủ thông tin!";
    }
    if (empty($_POST['quantity'])) {
        $errors['quantity']['required'] = "Nhập đầy đủ thông tin!";
    }
    if ($quantity < 1) {
        $errors['quantity']['min'] = "Nhập số lượng lớn hơn 0!";
    }
    if (empty($_POST['categori_id'])) {
        $errors['categori_id']['required'] = "Chọn phân quyền!";
    }

    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['quantity']) && !empty($_POST['categori_id'])) {
        $product->update($id, $name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id);
        $_SESSION['status'] = "Sửa thành công";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?act=product&get=list');
    }
}
?>


<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sửa sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="post" class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text" name="name" value="<?= $select['name_pr'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                        <!-- <div id="emailHelp" name="name" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <!-- <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control"  value="<?= $select['name_pr'] ?>"  name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div> -->

                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Giá</label>
                        <input type="number" class="form-control" value="<?= $select['price'] ?>" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['price']['required']) ? '<p class="text-danger mt-2">' . $errors['price']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control" value="<?= $select['img'] ?>" name="img" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img']['required']) ? '<p class="text-danger mt-2">' . $errors['img']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-1</label>
                        <input type="file" class="form-control" value="<?= $select['img_1'] ?>" name="img_1" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_1']['required']) ? '<p class="text-danger mt-2">' . $errors['img_1']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-2</label>
                        <input type="file" class="form-control" value="<?= $select['img_2'] ?>" name="img_2" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_2']['required']) ? '<p class="text-danger mt-2">' . $errors['img_2']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-3</label>
                        <input type="file" class="form-control" value="<?= $select['img_3'] ?>" name="img_3" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_3']['required']) ? '<p class="text-danger mt-2">' . $errors['img_3']['required'] . '</p>' : '' ?>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" value="<?= $select['quantity'] ?>" name="quantity" id="exampleInputPassword1">
                        <? echo !empty($errors['quantity']['required']) ? '<p class="text-danger mt-2">' . $errors['quantity']['required'] . '</p>' : '' ?>
                        <? echo !empty($errors['quantity']['min']) ? '<p class="text-danger mt-2">' . $errors['quantity']['min'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Loại</label>
                        <select class="form-select" name="categori_id" aria-label=".form-select-sm example">
                            <?php
                            $categori = new categori();
                            $db = new connect();
                            $selectCate = $categori->getCategori();

                            foreach ($selectCate as $data) {
                                echo '
                                    <option value="' . $data['id_categori'] . '" 
                                    ' . ($data['id_categori'] == $select['categori_id'] ? "selected" : "") . '>
                                        ' . $data['name_ct'] . '
                                    </option>';
                            }
                            ?>

                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <textarea type="text" class="form-control" value="<?= $select['describe'] ?>" name="note" id=""></textarea>
                    </div>

                    <button type="submit" name="updateproduct" class="btn btn-primary col-1">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>