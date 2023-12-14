<?php
$product = new product();
$id = $_GET['id_pr'];
$select = $product->checkId($id);
$categori_id = $select['categori_id'];
$categori = $product->category($categori_id);
?>

<!-- Modal -->
<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="w-100 pt-1 mb-5 text-right">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="get" class="modal-content modal-body border-0 p-0">
            <div class="input-group mb-2">
                <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                <button type="submit" class="input-group-text bg-success text-light">
                    <i class="fa fa-fw fa-search text-white"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="../Admin/assets/images/products/<?= $select['img'] ?>" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <!-- <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div> -->
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <? if (!empty($select['img_1'])) { ?>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../Admin/assets/images/products/<?= $select['img_1'] ?>" alt="Product Image 1">
                                            </a>
                                        </div>
                                    <? } ?>
                                    <? if (!empty($select['img_2'])) { ?>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../Admin/assets/images/products/<?= $select['img_2'] ?>" alt="Product Image 2">
                                            </a>
                                        </div>
                                    <? } ?>
                                    <? if (!empty($select['img_2'])) { ?>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="../Admin/assets/images/products/<?= $select['img_3'] ?>" alt="Product Image 3">
                                            </a>
                                        </div>
                                    <? } ?>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <!-- 
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_04.jpg" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_05.jpg" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_06.jpg" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div> -->

                            <!--/.Second slide-->

                            <!--Third slide-->

                            <!--                             
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_07.jpg" alt="Product Image 7">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_08.jpg" alt="Product Image 8">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="assets/img/product_single_09.jpg" alt="Product Image 9">
                                        </a>
                                    </div>
                                </div>
                            </div> -->
                            <!--/.Third slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <!-- <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div> -->
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2"><?= $select['name_pr'] ?></h1>
                        <p class="h3 py-2"> <?= number_format($select['price'], 0, ".", ".")  ?> đ </p>
                        <!-- <p class="py-2"> -->

                        <span class="list-inline-item text-dark"> <?php

                                                                    $product = new product();
                                                                    $db = new connect();

                                                                    // Thực hiện câu truy vấn
                                                                    $select = "SELECT COUNT(*) AS total_comments FROM comments WHERE `product_id` = '$id'";
                                                                    $result = $db->pdo_query($select);

                                                                    if ($result) {
                                                                        foreach ($result as $data) {
                                                                            $total_comments = $data['total_comments'];
                                                                            echo '<li class="list-inline-item">
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-warning"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    </li>';
                                                                            echo '<li class="list-inline-item"><p ><strong> Rating 4 | </strong></p></li>';
                                                                            echo ' <li class="list-inline-item"><p class="text-muted"><strong> <h6>' . $total_comments . ' bình luận</h6></strong></p></li>';
                                                                        }
                                                                    } else {
                                                                        echo "Không tìm thấy thông tin bình luận.";
                                                                    }

                                                                    ?>
                        </span>
                        <!-- </p> -->

                        <?
                        $product = new product();
                        $db = new connect();

                        // Thực hiện câu truy vấn
                        $select = "SELECT p.describe, c.name_ct 
                        FROM products AS p 
                        JOIN categories AS c ON p.categori_id = c.id_categori 
                        WHERE p.id_product = '$id'";
                        $result = $db->pdo_query($select);

                        if ($result) {
                            foreach ($result as $data) {
                                echo '<ul class="list-inline">';
                                echo '<li class="list-inline-item"><h6>Hãng:</h6></li>';
                                echo '<li class="list-inline-item"><p class="text-muted"><strong>' . $data['name_ct'] . '</strong></p></li>';
                                echo '</ul>';
                                echo '<li class="list-inline-item"><h6>Mô tả:</h6></li>';
                                echo '<li class="list-inline-item"><p class="text-muted"><strong>' . $data['describe'] . '</strong></p></li>';
                            }
                        } else {
                            echo "Không tìm thấy thông tin danh mục sản phẩm.";
                        }
                        ?>

                        <br>
                        <br>
                        <!-- <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Avaliable Color :</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>White / Black</strong></p>
                            </li>
                        </ul> -->
                        <!-- 
                        <h6>Specification:</h6>
                        <ul class="list-unstyled pb-3">
                            <li>Lorem ipsum dolor sit</li>
                            <li>Amet, consectetur</li>
                            <li>Adipiscing elit,set</li>
                            <li>Duis aute irure</li>
                            <li>Ut enim ad minim</li>
                            <li>Dolore magna aliqua</li>
                            <li>Excepteur sint</li>
                        </ul> -->

                        <form action="index.php?act=carts&get=toCart" method="post">
                            <input type="hidden" name="product-title" value="Activewear">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size :
                                            <input type="hidden" name="product-size" id="product-size" value="S">
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="38" class="btn-check" name="size" id="btn-1" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-1">38</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="39" class="btn-check" name="size" id="btn-2" autocomplete="off" checked>
                                            <label class="btn btn-outline-success" for="btn-2">39</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="40" class="btn-check" name="size" id="btn-3" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-3">40</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="41" class="btn-check" name="size" id="btn-4" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-4">41</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="42" class="btn-check" name="size" id="btn-5" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-5">42</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                        </li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success" onclick="decreaseNumber<?= $select['id_product'] ?>()">-</button></li>
                                        <li class="list-inline-item"><input class="text-center text-white border-0 outline-0 rounded bg-secondary" style="width:50px;" type="number" name="quantity" id="myNumber<?= $select['id_product'] ?>" value="1"></li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success" onclick="increaseNumber<?= $select['id_product'] ?>()">+</button></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="addcart" value="buy">Thêm vào giỏ hàng</button>
                                </div>
                                <div class="col d-grid">
                                    <!-- <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Add To Cart</button> -->
                                </div>
                            </div>
                            <input type="hidden" name="id_product" value="<?= $select['id_product'] ?>">
                            <input type="hidden" name="name" value="<?= $select['name_pr'] ?>">
                            <input type="hidden" name="price" value="<?= $select['price'] ?>">
                            <input type="hidden" name="img" value="<?= $select['img'] ?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Bình luận -->
<?php

include './pages/comment.php';

?>
<!-- Đóng Bình luận -->

<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Related Products</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product" class="slick-initialized slick-slider slick-dotted">

            <div class="slick-list draggable">
                <div class="slick-track row">
                    <?php
                    foreach ($categori as $row) {
                        echo '
                    <div class="p-2 pb-3 slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" tabindex="-1" style="width: 324px;">
                        <div class="product-wap card rounded-0">
                                
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="../Admin/assets/images/products/' . $row['img'] . '">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="shop-single.html" tabindex="-1"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="index.php?act=shop-single&id_pr=' . $row['id_product'] . '" tabindex="-1"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="shop-single.html" tabindex="-1"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="index.php?act=shop-single&id_pr=' . $row['id_product'] . '" class="h3 text-decoration-none" tabindex="-1">' . $row['name_pr'] . '</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>M/L/X/XL</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                </ul>
                                <p class="text-center mb-0">' . number_format($row['price'], 0, ".", ".") . ' <b>vnđ</b></p>
                            </div>
                            
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Article -->