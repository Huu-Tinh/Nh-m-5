<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí đơn hàng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3">Mã hóa đơn</h6>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3 ">Số lượng sản phẩm</h6>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3 ">Tên người nhận</h6>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3">Địa chỉ</h6>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3 ">Số điện thoại</h6>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <h6 class="fw-semibold fs-4 mb-3 ">Tổng giá</h6>
                        </th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $order = new order();
                    $select = $order->getorder();
                    foreach ($select as $data) {
                        echo '
                            <tr>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold mt-5">' . $data['code'] . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold mt-5">' . $data['count'] . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold mt-5 fs-4">' . $data['username'] . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold p-0 mt-5 fs-4 text-wrap" style="width: 20rem;">' . $data['address'] . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold mt-5 fs-4">' . $data['phone'] . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <h6 class="fw-semibold mt-5 fs-4">' . number_format($data['total'], 0, ".", ".") . '</h6>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <a href="index.php?act=order&get=detailorder&id=' . $data['id'] . '" class="btn btn-success mt-4">Chi tiết</a>
                                </td>
                            </tr>
                            ';
                    }
                    ?>



                </tbody>
            </table>
        </div>
    </div>
</div>