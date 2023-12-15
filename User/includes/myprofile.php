<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<section class="pt-5 " style="background-color: #eee;">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="../Admin/assets/images/profile/<?= $user['avatar'] ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"><?= $user['username'] ?></h5>
                        <p class="text-success mb-1"><?= $user['email'] ?></p>
                        <p class="text-success mb-4"><?= $user['address'] ?></p>

                    </div>
                </div>
                <div class="card mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                <p class="mb-0">mdbootstrap</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-muted">Full Name:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-success mb-0"><?= $user['username'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-muted">Email:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-success mb-0"><?= $user['email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-muted">Phone:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-success mb-0"><?= $user['phone'] ?></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0 text-muted">Address:</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-success mb-0"><?= $user['address'] ?></p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <form action="" method="post">
                                <a href="index.php?act=carts&get=chanepassword"> <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#examppass">Đổi mật khẩu</button></a>
                                <button name="" class="btn btn-success">Đổi thông tin</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="examppass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content chane">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đổi Mật Khẩu</h5>
                <button type="submit" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu cũ</label>
                    <input type="password" class="form-control p0">
                    <? echo !empty($errors['password']['required']) ? '<p class="text-danger mt-2">' . $errors['password']['required'] . '</p>' : '' ?>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control p1">
                    <? echo !empty($errors['password']['required']) ? '<p class="text-danger mt-2">' . $errors['password']['required'] . '</p>' : '' ?>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Mật khẩu mới</label>
                    <input type="password" class="form-control p2">
                    <? echo !empty($errors['password']['required']) ? '<p class="text-danger mt-2">' . $errors['password']['required'] . '</p>' : '' ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="" class="btn btn-success chanepassword">Đồng ý</button>
                <input type="hidden" class="id_user" value="<?= $user['id_user'] ?>">
                <input type="hidden" class="password" value="<?= $user['password'] ?>">
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(document).on("click", ".chanepassword", function(event) {
            event.preventDefault();
            var iduser = $('.id_user').val();
            var password = $('.password').val();
            var password0 = $('.p0').val();
            var password1 = $('.p1').val();
            var password2 = $('.p2').val();
            $.ajax({
                url: "./includes/ajax.php",
                method: "POST",
                data: {
                    action: "chane_password",
                    iduser: iduser,
                    password: password,
                    password0: password0,
                    password1: password1,
                    password2: password2,
                },
                success: function(result) {
                    console.log(iduser);
                    console.log(password);
                    console.log(password0);
                    console.log(password2);
                    console.log(password1);
                    $('.chane').load(location.href + ' .chane');
                }
            });
        });
    });
</script>
<?
// if (isset($_POST['chanepassword'])) {
//     $password0 = $_POST['p0'];
//     $password1 = $_POST['p1'];
//     $password2 = $_POST['p2'];
//     if ($password0 == $user['password'] && $password1 == $password2) {
//         $chanepass = $selectUser->chanepassword($user['id_user'], $password0);
//     } else {
//         $errors['password']['required'] = "Mật khẩu không đúng!";
//     }
// }
?>