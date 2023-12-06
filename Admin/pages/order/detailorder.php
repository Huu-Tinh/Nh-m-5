<?php
$order = new order();
$id = $_GET['id'];
$select = $order->checkId($id);
?>

<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Chi tiết hóa đơn</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">


                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tên sản phẩm</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Hình ảnh</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Giá</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số lượng</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Thời gian</h6>
                        </th>

                        <!-- <th>
                            <a href="index.php?act=product&get=add" class="btn btn-success m-1">Thêm</a>
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $select = $order->checkId($id);
                    foreach ($select as $data) {
                        echo '
                    <tr>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1">' . $data['name'] . '</h6>
                        
                        </td>
                        <td class="border-bottom-0">
                            <img style="width: 140px; height:140px" src="./assets/images/products/' . $data['img_odt'] . '"alt="">
                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . number_format($data['unit_price'], 0, ".", ".") . '</h6>

                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['quantity_odt'] . '</h6>

                        </td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-0 fs-4">' . $data['created_at'] . '</h6>
                        </td>
                        <td>
                           
                        
                        </td>
                        
                    </tr>
                    ';
                    }
                    ?>
                    <!-- <a href="index.php?act=product&get=update" class="btn btn-warning m-1">Sửa</a> -->

                </tbody>
            </table>
        </div>
    </div>
</div>