<?php
$user = new user();
$username = $_POST['name'] ?? '';
$password = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$avatar = $_POST['avatar'] ?? '';
$role_id = $_POST['role_id'] ?? '';
if (isset($_POST['addUser'])) {
    if (empty($_POST['name'])) {
        $errors['name']['required'] = "Nhập đầy đủ họ tên!";
    }
    if (empty($_POST['password'])) {
        $errors['password']['required'] = "Nhập đầy đủ password!";
    }
    if (empty($_POST['email'])) {
        $errors['email']['required'] = "Nhập đầy đủ email!";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email']['invald'] = "Email không đúng định dạng!";
    }
    if (empty($_POST['phone'])) {
        $errors['phone']['required'] = "Nhập đầy đủ số điện thoại!";
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
        $user->add($username, $password, $email, $phone, $address, $avatar, $gender, $role_id);
        header('Location: index.php?act=user&get=list');
    }
};

?>
<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới người dùng</h5>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $email ?>" aria-describedby="emailHelp">
                        <? echo !empty($errors['email']['required']) ? '<p class="text-danger mt-2">' . $errors['email']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                        <input type="text" name="name" class="form-control" value="<?= $username ?>" aria-describedby="emailHelp">
                        <? echo !empty($errors['name']['required']) ? '<p class="text-danger mt-2">' . $errors['name']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" value="<?= $password ?>" class="form-control">
                        <? echo !empty($errors['password']['required']) ? '<p class="text-danger mt-2">' . $errors['password']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" value="<?= $phone ?>" aria-describedby="emailHelp">
                        <? echo !empty($errors['phone']['required']) ? '<p class="text-danger mt-2">' . $errors['phone']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" value="<?= $address ?>" aria-describedby="emailHelp">
                        <? echo !empty($errors['address']['required']) ? '<p class="text-danger mt-2">' . $errors['address']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control" aria-describedby="emailHelp">
                        <? echo !empty($errors['avatar']['required']) ? '<p class="text-danger mt-2">' . $errors['avatar']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="1" id="Default1">
                            <label class="form-check-label" for="Default1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="2" id="Default2">
                            <label class="form-check-label" for="Default2">
                                Nữ
                            </label>
                        </div>
                        <? echo !empty($errors['gender']['required']) ? '<p class="text-danger mt-2">' . $errors['gender']['required'] . '</p>' : '' ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phân quyền</label>
                        <select class="form-select" name="role_id" aria-label=".form-select-sm example">
                            <option value=" ">Vui lòng chọn loại người dùng</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                            <? echo !empty($errors['role_id']['required']) ? '<p class="text-danger mt-2">' . $errors['role_id']['required'] . '</p>' : '' ?>
                        </select>
                    </div>
                    <a href="index.php?act=listUser" type="button" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-primary" name="addUser">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>