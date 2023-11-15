<?php
$product = new product();
$name = $_POST['name'] ?? '';
$price = $_POST['price'] ?? '';
$img = $_POST['img'] ?? '';
$img_1 = $_POST['img_1'] ?? '';
$img_2 = $_POST['img_2'] ?? '';
$img_3 = $_POST['img_3'] ?? '';
$note = $_POST['note'] ?? '';
$quantity = $_POST['quantity'] ?? '';

if (isset($_POST['addproduct'])) {
    $product->add($name, $price, $img, $img_1, $img_2, $img_3, $note, $quantity);
    header('Location: index.php?act=product&get=list');
}
?>

<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="email" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giá</label>
                        <input type="email" class="form-control" name="price" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control" name="img" id="exampleInputEmail1" aria-describedby="emailHelp">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh-1</label>
                        <input type="file" class="form-control" name="img_1" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh-2</label>
                        <input type="file" class="form-control" name="img_2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ảnh-3</label>
                        <input type="file" class="form-control" name="img_3" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input type="number" class="form-control" name="Quantity" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <textarea type="text" class="form-control" name="note" id=""></textarea>
                    </div>
                  
                    <button type="submit" name="addproduct" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>