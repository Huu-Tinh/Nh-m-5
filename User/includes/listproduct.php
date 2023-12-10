<?
echo '
<div class="col-md-4">
    <div class="card mb-4 product-wap rounded-0">

        <div class="card rounded-0">
            <img class="card-img rounded-0 img-fluid" src="../Admin/assets/images/products/' . $value['img'] . '" style="height: 300px;">
            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                <ul class="list-unstyled">
                    <li><a class="btn btn-success text-white" href="shop-single.html"><i class="far fa-heart"></i></a></li>
                    <li><a class="btn btn-success text-white mt-2" href="index.php?act=shop-single&id_pr=' . $value['id_product'] . '"><i class="far fa-eye"></i></a></li>
                    <li><button type="button" class="btn btn-success text-white mt-2" href="index.php?act=cart" data-bs-toggle="modal" data-bs-target="#exampleModal' . $value['id_product'] . '"><i class="fas fa-cart-plus"></i></button></li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <a href="index.php?act=shop-single&id_pr=' . $value['id_product'] . '" class="h3 text-decoration-none">' . $value['name_pr'] . '</a>
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
            <p class="text-center mb-0">' . number_format($value['price'], 0, ".", ".") . '</p>
        </div>
    </div>
</div>';
echo '
<!-- Modal -->
<div class="modal fade" id="exampleModal' . $value['id_product'] . '" tabindex="-1" aria-labelledby="exampleModalLabel' . $value['id_product'] . '" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="index.php?act=carts&get=toCart" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel' . $value['id_product'] . '">Thêm vào giỏ hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="row col-6">
                            <img class="col-1 card-img rounded-0 img-fluid" src="../Admin/assets/images/products/' . $value['img'] . '">
                        </div>
                        <div class="col-6">
                            <h1 class="h2">' . $value['name_pr'] . '</h1>
                            <label>Giá:</label>
                            <label class="text-danger fw-bold mb-3">' . number_format($value['price'], 0, ".", ".") . ' vnd</label>
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item">Size :
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="38" class="btn-check" name="size" id="btn-1' . $value['id_product'] . '" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-1' . $value['id_product'] . '">38</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="39" class="btn-check" name="size" id="btn-2' . $value['id_product'] . '" autocomplete="off" checked>
                                            <label class="btn btn-outline-success" for="btn-2' . $value['id_product'] . '">39</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="40" class="btn-check" name="size" id="btn-3' . $value['id_product'] . '" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-3' . $value['id_product'] . '">40</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="41" class="btn-check" name="size" id="btn-4' . $value['id_product'] . '" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-4' . $value['id_product'] . '">41</label>
                                        </li>
                                        <li class="list-inline-item">
                                            <input type="radio" value="42" class="btn-check" name="size" id="btn-5' . $value['id_product'] . '" autocomplete="off">
                                            <label class="btn btn-outline-success" for="btn-5' . $value['id_product'] . '">42</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity

                                        </li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success" onclick="decreaseNumber' . $value['id_product'] . '()">-</button></li>
                                        <li class="list-inline-item"><input class="text-center text-white border-0 outline-0 rounded bg-secondary" style="width:50px;" type="number" name="quantity" id="myNumber' . $value['id_product'] . '" value="1"></li>
                                        <li class="list-inline-item"><button type="button" class="btn btn-success" onclick="increaseNumber' . $value['id_product'] . '()">+</button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addcart" class="btn btn-success">Thêm vào giỏ hàng</button>
                </div>
                <input type="hidden" name="id_product" value="' . $value['id_product'] . '">
                <input type="hidden" name="name" value="' . $value['name_pr'] . '">
                <input type="hidden" name="price" value="' . $value['price'] . '">
                <input type="hidden" name="img" value="' . $value['img'] . '">

            </form>
        </div>
    </div>
</div>';