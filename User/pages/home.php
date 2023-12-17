<!-- Start Banner Hero -->
<?
$banner = new banner();
$selecbanner = $banner->getbbanner();
if (isset($_POST['updatebaner'])) {
    $id = $_POST['id'];
    $h1 = $_POST['h1'];
    $h2 = $_POST['h2'];
    $img = $_POST['img'];
    $content = $_POST['content'];
    $updatebanner = $banner->update($id, $h1, $h2, $img, $content);
    header('location: index.php?act=home');
}
?>
<div class="bg-light pb-1">
    <div id="template-mo-zay-hero-carousel" class="carousel slide shadow-sm" data-bs-ride="carousel">
        <ol class="carousel-indicators" style="z-index: 2;">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <?php
            foreach ($selecbanner as $item) { ?>
                <div class="carousel-item <? if ($item['active'] != '') {
                                                echo "active";
                                            }
                                            ?>">
                    <? if (isset($_SESSION['username'])) {
                        echo '
                    <div class="position-absolute" style="z-index: 1; background-color: rgba(1, 1, 1, 0.637); width: 100%; height: 100%;">
                        <form action="" method="post"><button type="button" name="banner" class="position-absolute bottom-50 end-50 p-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal' . $item['id'] . '">Đổi Banner</button></form>
                    </div>
                                            ';
                    } ?>
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="./assets/img/<?= $item['img'] ?>" style="z-index: 1;" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-success"><?= $item['h1'] ?></h1>
                                    <h3 class="h2"><?= $item['h2'] ?></h3>
                                    <p>
                                        <?= $item['content'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $item['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <form action="" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Đổi thông tin banner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                                        <input type="text" name="h1" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tiêu đề phụ</label>
                                        <input type="text" name="h2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Hình ảnh</label>
                                        <input type="file" name="img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                                        <input type="text" name="content" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="updatebaner" class="btn btn-success">Đồng ý</button>
                                    <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="bg-light.bg-gradient m-5 pb-3 shadow-sm card">
        <div class="container">
            <div class="row text-center pt-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản Phẩm Bán Chạy</h1>
                    <p>
                        Sản phẩm bán chạy nhất thường có nhiều yếu tố góp phần vào sự thành công của nó, bao gồm chất lượng sản phẩm, tính độc đáo, giá cả hợp lý.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php
                $product = new product();
                $bestsell_pr = $product->getproduct_bestsell();
                foreach ($bestsell_pr as $sell) {
                    $string = $sell['describe'];
                    $substring = substr($string, 0, 240) . '...';
                ?>
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <a href="index.php?act=shop-single&id_pr=<?= $sell['id_product'] ?>">
                                <img src="../Admin/assets/images/products/<?= $sell['img'] ?>" class="card-img-top" style="height:380px" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        Brand: <?= $sell['name_ct'] ?>
                                    </li>
                                    <li class="text-muted text-right"><?= $sell['price'] ?><sup>vnđ</sup></li>
                                </ul>
                                <a href="index.php?act=shop-single&id_pr=<?= $sell['id_product'] ?>" class="h3 text-decoration-none text-dark"><?= $sell['name_pr'] ?></a>
                                <p class="card-text">
                                    <?= $substring ?>
                                </p>
                                <!-- <p class="text-muted">Reviews (24)</p> -->
                            </div>
                        </div>
                    </div>
                <? } ?>
                <!-- <div class="col-12 col-md-4 p-5 mt-3">
            <a href="#"><img src="./assets/img/category_img_02.jpg" class="rounded-circle img-fluid border"></a>
            <h2 class="h5 text-center mt-3 mb-3">Shoes</h2>
            <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
        </div> -->

            </div>
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light.bg-gradient m-5 shadow-sm card">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản Phẩm Mới Nhất</h1>
                    <p>
                        Là một sản phẩm mới được giới thiệu và bán ra trên thị trường. Đây là một sản phẩm có tính độc đáo và sáng tạo, mang lại giá trị và lợi ích mới cho khách hàng.
                    </p>
                </div>
            </div>
            <div class="row">
                <?php
                $product = new product();
                $featured_pr = $product->getpr_featured();
                foreach ($featured_pr as $item) {
                    $string = $item['describe'];
                    $substring = substr($string, 0, 240) . '...';
                ?>
                    <div class="col-12 col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <a href="index.php?act=shop-single&id_pr=<?= $item['id_product'] ?>">
                                <img src="../Admin/assets/images/products/<?= $item['img'] ?>" class="card-img-top" style="height:380px" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        Brand: <?= $item['name_ct'] ?>
                                    </li>
                                    <li class="text-muted text-right"><?= $item['price'] ?><sup>vnđ</sup></li>
                                </ul>
                                <a href="index.php?act=shop-single&id_pr=<?= $item['id_product'] ?>" class="h3 text-decoration-none text-dark"><?= $item['name_pr'] ?></a>
                                <p class="card-text">
                                    <?= $substring ?>
                                </p>
                                <!-- <p class="text-muted">Reviews (24)</p> -->
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </section>
</div>
<!-- End Featured Product -->