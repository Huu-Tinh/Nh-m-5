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
                        <div class="row mt-5">
                            <button class="btn btn-success">Đổi mật khẩu</button>
                            <button class="btn btn-success">Đổi thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>