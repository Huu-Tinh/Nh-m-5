<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí đơn hàng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mã hóa đơn</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số lượng sản phẩm</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên người nhận</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Địa chỉ</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số điện thoại</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tổng giá</h6>
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
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">' . $data['id'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">' . $data['code'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-1">' . $data['count'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">' . $data['username'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">' . $data['address'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">' . $data['phone'] . '</h6>
                                </td>
                                <td class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0 fs-4">' . number_format($data['total'], 0, ".", ".") . '</h6>
                                </td>
                                <td>
                                    <a href="index.php?act=order&get=detailorder&id=' . $data['id'] . '" class="btn btn-success m-1">Chi tiết</a>
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