<div class="card w-100 pt-5">
    <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Quản lí người dùng</h5>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">

                    <tr class="">
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Id</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Avatar</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Quyền</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Tài khoản</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Mật khẩu</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Email</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Số điện thoại</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Địa chỉ</h6>
                        </th>
                        <th class="border-bottom-1 p-0">
                            <h6 class="fw-semibold mb-3">Giới tính</h6>
                        </th>
                        <th class="border-bottom-1 pt-0">
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
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 me-3">' . $data['id_user'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <img src="../../assets/images/profile/' . $data['avatar'] . '" class="rounded-circle" style="width: 55px;" alt="">
                            </td>
                            <td class="border-bottom-1 p-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-' . ($data['role_id'] == 1 ? "danger" : "secondary") . ' rounded-3 fw-normal">' . ($data['role_id'] == 1 ? "admin" : "user") . '</span>
                                </div>
                            </td>
                            <td class="border-bottom-1 p-0">
                            <p class="fw-normal mb-0 fs-4">' . $data['username'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['password'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['email'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 fs-4">' . $data['phone'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 fs-4 text-wrap" style="width: 18rem;">' . $data['address'] . '</p>
                            </td>
                            <td class="border-bottom-1 p-0">
                                <p class="fw-normal mb-0 fs-4">' . ($data['gender'] == 1 ? 'Nam' : 'Nữ') . '</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal' . $data['id_user'] . '" > Xóa </button>
                                <a href="index.php?act=user&get=update&id=' . $data['id_user'] . '" class="btn btn-warning m-1">Sửa</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal' . $data['id_user'] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">LƯU Ý!</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    bạn có chắc chắn xóa !
                                </div>
                                <div class="modal-footer">
                                    <form action="index.php?act=user&get=delete&id=' . $data['id_user'] . '" method="post">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary" name="delete">Đồng ý</button>
                                    </form>
                                </div>
                            </div>  
                        </div>
                    </div>
                        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>