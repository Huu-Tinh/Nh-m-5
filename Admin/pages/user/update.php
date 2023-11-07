<?php
$user = new user();
$id = $_GET['id'];
$select = $user->checkid($id);

$username = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$avatar = $_POST['avatar'] ?? $select['avatar'];
$role_id = $_POST['role_id'] ?? '';
if (isset($_POST['updateUser'])) {
    $user->update($id, $username, $password, $email, $phone, $address, $avatar, $gender, $role_id);
    header('Location: index.php?act=user&get=list');
}
?>
<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Sửa người dùng</h5>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" value="<?= $select['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                        <input type="text" name="name" value="<?= $select['username'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" value="<?= $select['password'] ?>" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="number" name="phone" value="<?= $select['phone'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" value="<?= $select['address'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="1" <? if ($select['gender'] == 1) echo 'checked' ?> id="Default1">
                            <label class="form-check-label" for="Default1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="2" <? if ($select['gender'] == 2) echo 'checked' ?> id="Default2">
                            <label class="form-check-label" for="Default2">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phân quyền</label>
                        <select class="form-select" name="role_id" aria-label=".form-select-sm example">
                            <option value="1" <? if ($select['role_id'] == 1) {
                                                    echo 'selected';
                                                } ?>>Admin</option>
                            <option value="2" <? if ($select['role_id'] != 1) {
                                                    echo 'selected';
                                                } ?>>User</option>
                        </select>
                    </div>
                    <a href="index.php?act=user&get=list" type="button" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-primary" name="updateUser">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</div>