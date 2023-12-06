<?php
session_start();
include '../../Admin/includes/pdo.php';
include '../../Admin/pages/user/user.php';
$user = new user();
$username = $_POST['username'] ?? '';
$passsword = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
if (isset($_POST['login'])) {
  if ($user->checkUser($username, $passsword)) {
    $login = $user->userid($username, $passsword);
    $_SESSION['username'] = $login['id_user'];
    header('Location: ../../User');
  } else {
    $errors['required'] = "Tài khoản hoặc mật khẩu sai!";
  }
  if (empty($username)) {
    $errors['name']['required'] = "Nhập đầy đủ thông tin!";
    unset($errors['required']);
  }
  if (empty($passsword)) {
    $errors['pass']['required'] = "Nhập đầy đủ thông tin!";
    unset($errors['required']);
  }
}
if (isset($_POST['register'])) {
  if (!empty($username) && !empty($passsword) && !empty($passsword)) {
    $register = $user->register($username, $passsword, $email);
    $_SESSION['status'] = "Đăng ký thành công";
    $_SESSION['status_code'] = "success";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Validate form</title>
  <!-- <link rel="stylesheet" href="navbar.css" /> -->
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="main.js" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
  <script src="../Admin/assets/js/sweetalert.js"></script>
</head>

<body>
  <div class="container" id="container">
    <div class="form-container register-container">
      <form method="post">
        <h1>Đăng ký</h1>
        <div class="form-control">
          <input type="text" name="username" value="<?= $username ?>" placeholder="Name" />
        </div>
        <div class="form-control">
          <input type="email" name="email" value="<?= $email ?>" placeholder="Email" />
        </div>
        <div class="form-control">
          <input type="password" name="password" value="<?= $passsword ?>" placeholder="Password" />
        </div>
        <button type="submit" name="register">Register</button>
        <span>or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
          <a href="#" class="social"><i class="fa-brands fa-tiktok"></i></a>
        </div>
      </form>
    </div>

    <div class="form-container login-container">
      <form class="" method="post">
        <h1>Đăng nhập</h1>
        <div class="form-control2">
          <input type="text" class="email-2" name="username" value="<?= $username ?>" placeholder="Username" />
          <? echo !empty($errors['name']['required']) ? '<small>' . $errors['name']['required'] . '</small>' : '' ?>
          <? echo !empty($errors['required']) ? '<small>' . $errors['required'] . '</small>' : '' ?>
        </div>
        <div class="form-control2">
          <input type="password" class="password-2" name="password" value="<?= $passsword ?>" placeholder="Password" />
          <? echo !empty($errors['pass']['required']) ? '<small>' . $errors['pass']['required'] . '</small>' : '' ?>
          <? echo !empty($errors['required']) ? '<small>' . $errors['required'] . '</small>' : '' ?>
        </div>

        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox" />
            <label for="">Remember me</label>
          </div>
          <div class="pass-link">
            <a href="#">Forgot password</a>
          </div>
        </div>
        <button type="submit" name="login">Login</button>
        <!-- <span>Or use your account</span>
        <div class="social-container">
          <a href="#" class="social"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" class="social"><i class="fa-brands fa-google"></i></a>
          <a href="#" class="social"><i class="fa-brands fa-tiktok"></i></a>
        </div> -->
      </form>
    </div>

    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">
            Hello <br />
            friends
          </h1>
          <p>If you have an account, login here and have fun</p>
          <button class="ghost" id="login">
            Đăngnhập
            <i class="fa-solid fa-arrow-left"></i>
          </button>
        </div>

        <div class="overlay-panel overlay-right">
          <h1 class="title">
            Start your <br />
            journey now
          </h1>
          <p>
            If you don'n have an account yet, join us and start your journey
          </p>
          <button class="ghost" id="register">
            Đăng ký
            <i class="fa-solid fa-arrow-right"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="main.js"></script>

</html>