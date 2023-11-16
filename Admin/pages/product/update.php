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
$categori_id = $_POST['categori_id'] ?? '';

if (isset($_POST['updateproduct'])) {
    $product->add($name, $price, $img, $img_1, $img_2, $img_3, $note, $quantity,$categori_id);
    header('Location: index.php?act=product&get=list');
}
?>


<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sửa sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="post" class="row">
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control"  value="<?= $select['name_pr'] ?>"  name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Giá</label>
                        <input type="number" class="form-control"  value="<?= $select['price'] ?>"  name="price" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh</label>
                        <input type="file" class="form-control"  value="<?= $select['img'] ?>"  name="img" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-1</label>
                        <input type="file" class="form-control"  value="<?= $select['img_1	'] ?>"  name="img_1" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-2</label>
                        <input type="file" class="form-control"  value="<?= $select['img_2'] ?>"  name="img_2" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">ảnh-3</label>
                        <input type="file" class="form-control"  value="<?= $select['img_3'] ?>"  name="img_3" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="exampleInputPassword1" class="form-label">Số lượng</label>
                        <input type="number" class="form-control"  value="<?= $select['quantity'] ?>"  name="quantity" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="" class="form-label">Loại</label>
                        <select class="form-select" name="category_id" aria-label=".form-select-sm example">
                        <?php
                            $categori = new categori();
                            $db = new connect();
                            $select = $categori->getCategori();

                            foreach ($select as $data) {
                                echo '
                                    <option value="' . $data['categori_id'] . '">
                                        ' . $data['name_ct'] . '
                                    </option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <textarea type="text" class="form-control" value="<?= $select['note'] ?>" name="note" id=""></textarea>
                    </div>

                    <button type="submit" name="updateproduct" class="btn btn-primary col-1">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>


