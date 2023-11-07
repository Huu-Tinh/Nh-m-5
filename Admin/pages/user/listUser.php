<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí người dùng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">

                    <tr class="">
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Avatar</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Quyền</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tài khoản</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Mật khẩu</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Email</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Số điện thoại</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Địa chỉ</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Giới tính</h6>
                        </th>
                        <th>
                            <a href="index.php?act=user&get=add" class="btn btn-success m-1">Thêm</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $user = new user();
                    $select = $user->getUser();
                    foreach ($select as $data) {
                        echo '
                        <tr>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0">' . $data['id_user'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <img src="../../assets/images/profile/' . $data['avatar'] . '" class="rounded-circle" style="width: 55px;" alt="">
                            </td>
                            <td class="border-bottom-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-' . ($data['role_id'] == 1 ? "danger" : "secondary") . ' rounded-3 fw-normal">' . ($data['role_id'] == 1 ? "admin" : "user") . '</span>
                                </div>
                            </td>
                            <td class="border-bottom-0">
                            <p class="fw-normal mb-0 fs-4">' . $data['username'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['password'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['email'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['phone'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['address'] . '</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="fw-normal mb-0 fs-4">' . ($data['gender'] == 1 ? 'Nam' : 'Nữ') . '</p>
                            </td>
                            <td>
                                <a href="#" class="btn btn-danger m-1">Xoá</a>
                                <a href="index.php?act=user&get=update&id=' . $data['id_user'] . '" class="btn btn-warning m-1">Sửa</a>
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