<div class="card w-100">
    <div class="card-body p-4">
        <h5 class="text-success logo h2 pb-5">Đơn hàng của tôi</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark ">
                    <tr class="">
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3">Mã hóa đơn</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3 ">Số lượng sản phẩm</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3 ">Tên người nhận</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3">Địa chỉ</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3 ">Số điện thoại</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3 ">Tổng giá</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                            <p class="fw-semibold  mb-3 ">Trạng thái</p>
                        </th>
                        <th class="border-bottom-1  p-0">
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $select = $order->get_myorder($user['id_user']);
                    foreach ($select as $data) {
                        echo '
                            <tr>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold mt-5">' . $data['code'] . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold mt-5">' . $data['count'] . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold mt-5 ">' . $data['username'] . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold p-0 mt-5  text-wrap" style="width: 20rem;">' . $data['address'] . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold mt-5 ">' . $data['phone'] . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <p class="fw-semibold mt-5 ">' . number_format($data['total'], 0, ".", ".") . '</p>
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <span class="badge mt-4 bg-' . ($data['status'] == 1 ? "danger" : "secondary") . ' rounded-3 fw-normal">' . ($data['status'] == 1 ? 'Đã duyệt' : 'Chưa duyệt') . '</span>
                                </td>
                                <td class="border-bottom-1 p-0">
                                ' . ($data['status'] == 1 || $data['pttt'] != 1 ? '' : '<a href="index.php?act=carts&get=detailorder&id=' . $data['id'] . '" class="btn btn-danger mt-4">Hủy</a>') . '
                                </td>
                                <td class="border-bottom-1 p-0">
                                    <a href="index.php?act=carts&get=detailorder&id=' . $data['id'] . '" class="btn btn-success mt-4">Chi tiết</a>
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