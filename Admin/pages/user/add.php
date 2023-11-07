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
    $user->add($username,$password,$email,$phone,$address,$avatar,$gender,$role_id);
    header('Location: index.php?act=user&get=list');
}
?>
<div class="container-fluid">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Thêm mới người dùng</h5>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phân quyền</label>
                        <select class="form-select" name="role_id" aria-label=".form-select-sm example">
                            <option>Vui lòng chọn loại người dùng</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <a href="index.php?act=listUser" type="button" class="btn btn-secondary">Hủy</a>
                    <button type="submit" class="btn btn-primary" name="addUser">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>