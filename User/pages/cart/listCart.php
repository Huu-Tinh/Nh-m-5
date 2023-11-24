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
                    $i = 1;
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
                                <p class="fw-normal mb-0 ">' .number_format($data[4], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' .number_format( $data[3] * $data[4], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <a href="#" class="btn btn-danger m-1">Xoá</a>
                            </td>
                        </tr>
                        ';
                        $i++;
                    }
                    ?>
                    <tr>
                        <td class="border-bottom-0"></td>
                        <td class="border-bottom-0"></td>
                        <td class="border-bottom-0"></td>
                        <td class="border-bottom-0"></td>
                        <td class="border-bottom-0"></td>
                        <td class="border-bottom-0">
                            <h5 class="fw-semibold mb-1">Tổng tiền</h5>
                        </td>
                        <td class="border-bottom-0">
                            <?php
                            $sum = 0;
                            foreach ($_SESSION['cart'] as $item) {
                                $sum += $item[3];
                            }
                            echo  number_format($sum, 0, ".", ".");
                           
                            ?>
                        </td>
                        <td class="border-bottom-0"></td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex bd-highlight mb-3">
                <div class="p-2 bd-highlight"><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Xoá giỏ hàng</button></div>
                <div class="p-2 bd-highlight"><button class="btn btn-primary" type="button">Cập nhật giỏ hàng</button></div>
                <div class="ms-auto p-2 bd-highlight"><button class="btn btn-success" type="button">Thanh toán</button></div>
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
                            <button type="submit" name="deleteCart" class="btn btn-success">Đồng ý</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</form>