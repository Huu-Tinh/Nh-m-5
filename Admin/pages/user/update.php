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
$avatar = $_POST['avatar'] ? $_POST['avatar'] : $select['avatar'];
$role_id = $_POST['role_id'] ?? '';
$numberphone = preg_replace('/[^0-9]/', '', $phone);
if (isset($_POST['updateUser'])) {
    if (empty($_POST['name'])) {
        $errors['name']['required'] = "Nhập đầy đủ họ tên!";
    }
    if (empty($_POST['password'])) {
        $errors['password']['required'] = "Nhập đầy đủ password!";
    }
    if (empty($_POST['email'])) {
        $errors['email']['required'] = "Nhập đầy đủ email!";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email']['invald'] = "Email không đúng định dạng!";
    }
    if (empty($_POST['phone'])) {
        $errors['phone']['required'] = "Nhập đầy đủ số điện thoại!";
    }
    if (!preg_match('/^(0|\+84)\d{9,10}$/', $numberphone)) {
        $errors['phone']['format'] = "Số điện thoại không đúng định dạng!";
    }
    if (empty($_POST['gender'])) {
        $errors['gender']['required'] = "Nhập đầy đủ giới tính!";
    }
    if (empty($_POST['address'])) {
        $errors['address']['required'] = "Nhập đầy đủ địa chỉ!";
    }
    if (empty($_POST['avatar'])) {
        $errors['avatar']['required'] = "Nhập đầy đủ avatar!";
    }
    if (empty($_POST['role_id'])) {
        $errors['role_id']['required'] = "Chọn phân quyền!";
    }
    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone'] && !empty($_POST['gender']))) {
        $user->update($id, $username, $password, $email, $phone, $address, $avatar, $gender, $role_id);
        $_SESSION['status'] = "Sửa thành công";
        $_SESSION['status_code'] = "success";
        header('Location: index.php?act=user&get=list');
    }
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
                        <input type="email" name="email" value="<?= $select['email'] ?>" class="form-control">
                        <? echo !empty($errors['phone']['format']) ? '<p class="text-danger mt-2">' . $errors['phone']['format'] . '</p>' : '' ?>
                        <? echo !empty($errors['email']['required']) ? '<p class="text-danger mt-2">' . $errors['email']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                        <input type="text" name="name" value="<?= $select['username'] ?>" class="form-control">
                        <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" value="<?= $select['password'] ?>" class="form-control" id="exampleInputPassword1">
                        <? echo !empty($errors['password']['required']) ? '<p class="text-danger mt-2">' . $errors['password']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="number" name="phone" value="<?= $select['phone'] ?>" class="form-control">
                        <? echo !empty($errors['phone']['format']) ? '<p class="text-danger mt-2">' . $errors['phone']['format'] . '</p>' : '' ?>
                        <? echo !empty($errors['phone']['required']) ? '<p class="text-danger mt-2">' . $errors['phone']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" value="<?= $select['address'] ?>" class="form-control">
                        <? echo !empty($errors['address']['required']) ? '<p class="text-danger mt-2">' . $errors['address']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control">
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
                        <? echo !empty($errors['gender']['required']) ? '<p class="text-danger mt-2">' . $errors['gender']['required'] . '</p>' : '' ?>
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