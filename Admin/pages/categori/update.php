<?php
$categori = new categori();
$id = $_GET['id'];
$select = $categori->checkid($id);

$name = $_POST['name'] ?? '';
$note = $_POST['note'] ?? '';

if (isset($_POST['updatecategori'])) {
    $categori->update( $id,$name, $note,);
    header('Location: index.php?act=categori&get=list');
}
?>

<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sửa loại sản phẩm</h5>
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên</label>
                        <input type="text"  name="name" value="<?= $select['name_ct'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" name="name" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mô tả</label>
                        <input type="text" name="note" value="<?= $select['note'] ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" name="updatecategori" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>