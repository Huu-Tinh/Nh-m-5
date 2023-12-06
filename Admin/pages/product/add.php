<?php
$product = new product();
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$img = $_POST['img'] ?? '';
$img_1 = $_POST['img_1'] ?? '';
$img_2 = $_POST['img_2'] ?? '';
$img_3 = $_POST['img_3'] ?? '';
$describe = $_POST['note'] ?? '';
$quantity = $_POST['quantity'] ?? '';
$categori_id = $_POST['categori_id'] ?? '';

if (isset($_POST['addproduct'])) {

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
    if (empty($_POST['categori_id'])) {
        $errors['categori_id']['required'] = "Chọn phân quyền!";
    }

    if (!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['img']) && !empty($_POST['quantity']) && !empty($_POST['categori_id'])) {
        try {
            $product->add($name, $price, $img, $img_1, $img_2, $img_3, $describe, $quantity, $categori_id);
            $_SESSION['status'] = "Thêm mới thành công";
            $_SESSION['status_code'] = "success";
            header('Location: index.php?act=product&get=list');
        } catch (Exception $e) {
            $_SESSION['status'] = "Đã có sản phẩm này";
            $_SESSION['status_code'] = "error";

            // Redirect to a custom error page
            header('Location: index.php?act=product&get=list');
        }
    }
}



?>

<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="post" class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['price']['required']) ? '<p class="text-danger mt-2">' . $errors['price']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control" name="img" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img']['required']) ? '<p class="text-danger mt-2">' . $errors['img']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-1</label>
                        <input type="file" class="form-control" name="img_1" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_1']['required']) ? '<p class="text-danger mt-2">' . $errors['img_1']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-2</label>
                        <input type="file" class="form-control" name="img_2" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_2']['required']) ? '<p class="text-danger mt-2">' . $errors['img_2']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-3</label>
                        <input type="file" class="form-control" name="img_3" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <? echo !empty($errors['img_3']['required']) ? '<p class="text-danger mt-2">' . $errors['img_3']['required'] . '</p>' : '' ?>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="quantity" id="exampleInputPassword1">
                        <? echo !empty($errors['quantity']['required']) ? '<p class="text-danger mt-2">' . $errors['quantity']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Loại</label>
                        <select class="form-select" name="categori_id" aria-label=".form-select-sm example">
                            <?php
                            $categori = new categori();
                            $db = new connect();
                            $select = $categori->getCategori();

                            foreach ($select as $data) {
                                echo '
                                    <option value="' . $data['id_categori'] . '">
                                        ' . $data['name_ct'] . '
                                    </option>';
                            }
                            ?>
                            <? echo !empty($errors['categori_id']['required']) ? '<p class="text-danger mt-2">' . $errors['categori_id']['required'] . '</p>' : '' ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <textarea type="text" class="form-control" name="note" id=""></textarea>

                    </div>

                    <button type="submit" name="addproduct" class="btn btn-primary col-1">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>