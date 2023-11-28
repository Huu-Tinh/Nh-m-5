<!-- <div class="card w-100 pt-5"> -->
<form action="index.php?act=carts&get=toCart" method="post">
    <div class="card-body p-4">
        <h5 class=" text-success logo h2">Giỏ hàng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-3 align-middle">
                <thead class="text-dark fs-4">

                    <tr class="">
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Stt</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Tên sản phẩm</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Hình ảnh</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Size</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Đơn giá</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Số lượng</h5>
                        </th>
                        <th class="border-bottom-0">
                            <h5 class="fw-semibold mb-3">Thành tiền</h5>
                        </th>
                        <th class="border-bottom-0">
                            <button class="btn btn-outline-success" name="continue" type="submit">Mua tiếp</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($_SESSION['cart'] as $data) {
                        echo '
                        <tr class="">
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0">' . $i . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p>' . $data[1] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <img class="card" style="width: 130px; height:120px;" src="../Admin/assets/images/products/' . $data[2] . '">
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data[5], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data[3], 0, ".", ".") . '   </p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data[4], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data[3] * $data[4], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <a href="index.php?act=carts&get=delete&i=' . $i . '" class="btn btn-danger m-1">Xoá</a>
                            </td>
                        </tr>
                        ';
                        $i++;
                    }
                    ?>
                    <tr>
                        <td colspan="5" class="border-bottom-0"></td>
                        <td class="border-bottom-0">
                            <h5 class="fw-normal mb-1">Tổng tiền</h5>
                        </td>
                        <td class="border-bottom-0">
                            <?php
                            $sum = 0;
                            foreach ($_SESSION['cart'] as $item) {
                                $sum += $item[3] * $item[4];
                            }
                            echo  '<p class="fw-bold text-danger mb-0 ">' . number_format($sum, 0, ".", ".") . ' <sup>vnđ</sup></p>';

                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row g-0 mt-5">
                <div class="col-sm-6 col-md-8"></div>
                <div class="col-6 col-md-4">
                    <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Xoá giỏ hàng</button>
                    <!-- <button class="btn btn-primary mx-2" type="button">Cập nhật giỏ hàng</button> -->
                    <a href="index.php?act=carts&get=delete" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Pay">Thanh toán</a>
                </div>
            </div>
            <!-- Modal DELETE-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LƯU Ý</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn Có Muốn Xóa Giỏ Hàng?
                        </div>
                        <div class="modal-footer">
                            <a href="index.php?act=carts&get=delete" class="btn btn-success">Đồng ý</a>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade" id="Pay" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="index.php?act=carts&get=pay" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông Tin Đặt Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">

                            <p>Địa chỉ nhận hàng</p>
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item">
                                    <label for="" class="mt-3">Họ Tên</label>
                                    <input type="text" value="" class="form-control" name="username">
                                </li>
                                <li class="list-inline-item">
                                    <label for="" class="mt-3">Số điện thoại</label>
                                    <input type="int" value="" class="form-control" name="phone">
                                </li>
                                <li class="list-inline-item">
                                    <label for="" class="mt-3">Địa chỉ</label>
                                    <input type="text" value="" class="form-control" name="address">
                                </li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <p>Phương thức thanh toán</p>
                            <div>
                                <input class="form-check-input" type="radio" name="pttt" value="Thanh toán khi nhận hàng" id="check1">
                                <label class="form-check-label" for="check1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <input class="form-check-input" type="radio" name="pttt" value="Thanh toán bằng ví" id="check2">
                            <label class="form-check-label" for="check2">
                                Thanh toán bằng ví
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="addpay" class="btn btn-success">Đặt hàng</button>
                </div>
                <input type="hidden" name="total" value="<? echo $sum ?>">
            </form>
        </div>
    </div>
</div>