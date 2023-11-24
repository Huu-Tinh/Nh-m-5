<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
      <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xxl-3">
          <div class="card mb-0">
            <div class="card-body">
              <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
              </a>
              <p class="text-center"></p>
              <form role="form" class="text-start" method="POST">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Tài khoản</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-4">
                  <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                  <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Đăng nhập </button>
                <!-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Bạn chưa có tài khoản?</p>
                    <a class="text-primary fw-bold ms-2" href="register.php">Đăng ký</a>
                  </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  $user = new user();
  $username = $_POST['username'] ?? '';
  $passsword = $_POST['password'] ?? '';
  if ($user->checkUser($username, $passsword)) {
    $login = $user->userid($username, $passsword);
    $_SESSION['admin'] = $login['id_user'];
    header('Location: index.php?act=home');
  }
  ?>