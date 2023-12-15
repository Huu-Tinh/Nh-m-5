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
                    $selectCart = $order->gettocart($user['id_user']);
                    foreach ($selectCart as $data) {
                        echo '
                        <tr class="">
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0">' . ($i + 1) . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p>' . $data['name_pr'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <img class="card" style="width: 130px; height:120px;" src="../Admin/assets/images/products/' . $data['img'] . '">
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . $data['size'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data['price'], 0, ".", ".") . '   </p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . $data['quantity_cart'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 ">' . number_format($data['price'] * $data['quantity_cart'], 0, ".", ".") . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <a href="index.php?act=carts&get=delete&id=' . $data['id_cart'] . '" class="btn btn-danger m-1">Xoá</a>
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
                            foreach ($selectCart as $item) {
                                $sum += $item['price'] * $item['quantity_cart'];
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
                    <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Pay">Thanh toán</a>
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
        <div class="modal-content users">
            <form action="index.php?act=carts&get=pay" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông Tin Đặt Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">

                            <p><i class="bi bi-geo-alt-fill text-success"></i>Địa chỉ nhận hàng</p>
                            <ul class="list-inline pb-3">
                                <?
                                if (empty($user['username']) || empty($user['phone']) || empty($user['address'])) { ?>
                                    <li class="text-danger">Chưa có địa chỉ nhận hàng!</li>
                                    <li><a class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#info">Thêm thông tin</a></li>

                                <? } else { ?>
                                    <li>
                                        <? echo $user['username'] . ' | ' . $user['phone'] ?>
                                    </li>
                                    <li><? echo $user['address'] ?></li>
                                    <li><a class="btn btn-success mt-4" data-bs-toggle="modal" data-bs-target="#info">Đổi địa chỉ</a></li>
                                <? }
                                ?>
                            </ul>
                        </div>
                        <div class="col-6">
                            <p>Phương thức thanh toán</p>
                            <div>
                                <input class="form-check-input" type="radio" name="pttt" value="1" id="check1">
                                <label class="form-check-label" for="check1">
                                    Thanh toán khi nhận hàng
                                </label>
                            </div>
                            <input class="form-check-input" type="radio" name="pttt" value="2" id="check2">
                            <label class="form-check-label" for="check2">
                                Thanh toán bằng VNpay
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
<!-- Modal Đổi thông tin người đặt hàng -->
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content infouser">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông Tin Đặt Hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tên người nhận</label>
                    <input type="text" name="name" class="form-control name" value="<?= empty($user['username']) ? '' : $user['username'] ?>">
                    <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" value="<?= empty($user['address']) ? '' : $user['address'] ?>" class="form-control address">
                    <? echo !empty($errors['address']['required']) ? '<p class="text-danger mt-2">' . $errors['address']['required'] . '</p>' : '' ?>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                    <input type="number" name="phone" class="form-control phone" value="<?= empty($user['phone']) ? '' : $user['phone'] ?>">
                    <? echo !empty($errors['phone']['required']) ? '<p class="text-danger mt-2">' . $errors['phone']['required'] . '</p>' : '' ?>
                    <? echo !empty($errors['phone']['format']) ? '<p class="text-danger mt-2">' . $errors['phone']['format'] . '</p>' : '' ?>
                </div>
                <input type="hidden" class="iduser" value="<?= $user['id_user'] ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="addinfo" class="btn btn-success addinfo">Đồng ý!</button>
            </div>

        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(document).on("click", ".addinfo", function(event) {
            event.preventDefault();
            var username = $('.name').val();
            var address = $('.address').val();
            var phone = $('.phone').val();
            var iduser = $('.iduser').val();
            $.ajax({
                url: "./includes/ajax.php",
                method: "POST",
                data: {
                    action: "updateinfo",
                    username: username,
                    address: address,
                    phone: phone,
                    iduser: iduser

                },
                success: function(result) {
                    $('.infouser').load(location.href + ' .infouser');
                    $('.users').load(location.href + ' .users');
                    $('.loadpay').load(location.href + ' .loadpay');
                    <?php
                    $_SESSION['status'] = "Cập nhật thành công!";
                    $_SESSION['status_code'] = "success";
                    if (isset($_SESSION['status'])) { ?>
                        swal({
                            title: "<?= $_SESSION['status'] ?>",
                            icon: "<?= $_SESSION['status_code'] ?>",
                            button: "Đồng ý!",
                        });
                    <? }
                    unset($_SESSION['status']); ?>
                }
            });
        });
    });
</script>