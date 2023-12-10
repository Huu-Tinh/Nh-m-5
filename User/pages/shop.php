<?php
$product = new product();
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



<!-- Start Content -->
<div class="container py-5">
    <div class="row">
        <!-- Phân loại sp  -->
        <div class="col-lg-3">
            <h1 class="h2 pb-4">Danh mục sản phẩm</h1>
            <ul class="list-inline shop-top-menu pb-3 pt-1">
                <form action="" method="post">
                    <li class="list-item">
                        <button type="submit" name="all" value="1" class="btn border-0 bg-body p-0">All</button>
                    </li>
                    <?php
                    $categori = new categori();
                    $slCategori = $categori->getcategori();
                    foreach ($slCategori as $datacategori) {
                        echo '
                    <li class="list-item">
                        <button type="submit" name="categori" value="' . $datacategori['id_categori'] . '" class="btn border-0 bg-body p-0">' . $datacategori['name_ct'] . '</button>
                     </li>
                    ';
                    }
                    ?>
                </form>
            </ul>
        </div>

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-8">
                </div>
                <!-- Option Sắp xếp sp  -->
                <div class="col-md-4 pb-4">
                    <form action="" method="post">
                        <div class="d-flex">
                            <select name="role" class="form-select border border-end-0 rounded-0">
                                <option value="0" <? if (isset($_POST['role']) && $_POST['role'] == 0) {
                                                        echo 'selected';
                                                    } ?>>Sắp xếp</option>
                                <option value="1" <? if (isset($_POST['role']) && $_POST['role'] == 1) {
                                                        echo 'selected';
                                                    } ?>>A đến Z</option>
                                <option value="2" <? if (isset($_POST['role']) && $_POST['role'] == 2) {
                                                        echo 'selected';
                                                    } ?>>Giá thấp đến cao</option>
                                <option value="3" <? if (isset($_POST['role']) && $_POST['role'] == 3) {
                                                        echo 'selected';
                                                    } ?>>Giá cao đến thấp</option>
                                <option value="4" <? if (isset($_POST['role']) && $_POST['role'] == 4) {
                                                        echo 'selected';
                                                    } ?>>Sản phẩm mới nhất</option>
                                <option value="5" <? if (isset($_POST['role']) && $_POST['role'] == 5) {
                                                        echo 'selected';
                                                    } ?>>Sản phẩm cũ nhất</option>
                            </select>
                            <button type="submit" name="arrange" class="px-3 fs-5 btn bg-success text-white rounded-0"><i class="bi bi-funnel"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Xuất sp  -->
            <div class="row">
                <?php
                $variable = 'all';
                if (isset($_POST['search'])) {
                    $variable  = 'search';
                } elseif (isset($_POST['categori'])) {
                    $variable  = 'categori';
                } elseif (isset($_POST['all'])) {
                    $variable = 'all';
                } elseif (isset($_POST['arrange'])) {
                    $variable = 'arrange';
                }
                switch ($variable) {
                    case 'all':
                        // Show tất cả sản phẩm 
                        $select = $product->getproduct();
                        break;
                    case 'search':
                        // Tìm kím sản phẩm 
                        $namesearch = $_POST['search'];
                        $select = $product->search($namesearch);
                        break;
                    case 'categori':
                        // Tìm kím sp theo loại 
                        $valuecategori = $_POST['categori'];
                        $select = $product->getpr_categori($valuecategori);
                        break;
                    case 'arrange':
                        // Sắp xếp sp 
                        if ($_POST['role'] == 0) {
                            $select = $product->getproduct();
                        } elseif ($_POST['role'] == 1) {
                            // Sắp xếp A-Z
                            $select = $product->getpr_aToz();
                        } elseif ($_POST['role'] == 2) {
                            // Sắp xếp giá giảm dần 
                            $select = $product->getpr_priceAsc();
                        } elseif ($_POST['role'] == 3) {
                            // Sắp xếp giá tăng dần 
                            $select = $product->getpr_priceDesc();
                        } elseif ($_POST['role'] == 4) {
                            // Sắp xếp sp mới nhất 
                            $select = $product->getpr_priceDesc();
                        } elseif ($_POST['role'] == 5) {
                            // Sắp xếp sp cũ nhất
                            $select = $product->getpr_priceAsc();
                        }
                        break;
                    default:
                        $select = $product->getproduct();
                        break;
                }
                foreach ($select as $value) {
                    include "./includes/listproduct.php";
                }
                ?>
            </div>
            <div div="row">
                <ul class="pagination pagination-lg justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
<!-- // <input type="hidden" name="img" value="' . $value['categori_id '] . '"> -->
<!-- Start Brands -->
<section class="bg-light py-5">
    <div class="container my-4">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Our Brands</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    Lorem ipsum dolor sit amet.
                </p>
            </div>
            <div class="col-lg-9 m-auto tempaltemo-carousel">
                <div class="row d-flex flex-row">
                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-light fas fa-chevron-left"></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Carousel Wrapper-->
                    <div class="col">
                        <div class="carousel slide carousel-multi-item pt-2 pt-md-0" id="multi-item-example" data-bs-ride="carousel">
                            <!--Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_01.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_02.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_03.png" alt="Brand Logo"></a>
                                        </div>
                                        <div class="col-3 p-md-5">
                                            <a href="#"><img class="img-fluid brand-img" src="assets/img/brand_04.png" alt="Brand Logo"></a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Third slide-->

                            </div>
                            <!--End Slides-->
                        </div>
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Controls-->
                    <div class="col-1 align-self-center">
                        <a class="h1" href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-light fas fa-chevron-right"></i>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Brands-->