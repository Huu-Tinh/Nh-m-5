<?php
session_start();
include '../../Admin/includes/pdo.php';
include '../../Admin/pages/user/user.php';
$user = new user();
$email = $_POST['email'] ?? '';
$passsword = $_POST['password'] ?? '';
$email = $_POST['email'] ?? '';
if (isset($_POST['login'])) {
  if ($user->checkUser($email, $passsword)) {
    $login = $user->userid($email, $passsword);
    $_SESSION['username'] = $login['id_user'];
    header('Location: ../../User');
  } else {
    $errors['required'] = "Tài khoản hoặc mật khẩu sai!";
  }
  if (empty($email)) {
    $errors['email']['required'] = "Nhập đầy đủ thông tin!";
    unset($errors['required']);
  }
  if (empty($passsword)) {
    $errors['pass']['required'] = "Nhập đầy đủ thông tin!";
    unset($errors['required']);
  }
}
if (isset($_POST['register'])) {
  if (!empty($email) && !empty($passsword) && !empty($passsword)) {
    $register = $user->register($email, $passsword, $email);
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
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <!-- <link rel="stylesheet" href="./style.css"> -->
  <link rel="stylesheet" href="main.js" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <script src="assets/js/bootstrap.bundle.min.js"></script> -->
  <!-- <script src="../Admin/assets/js/sweetalert.js"></script> -->
</head>
<style>
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    background: url(img/giay-converse-classic-8.png) top center / cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    font-family: "Poppins", sans-serif;
    overflow: hidden;
    height: 100vh;
  }

  h1 {
    font-weight: 700;
    letter-spacing: -1.5px;
    margin: 0;
    margin-bottom: 15px;
  }

  h1.title {
    font-size: 45px;
    line-height: 45px;
    margin: 0;
    text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
  }

  p {
    font-size: 14px;
    font-weight: 100;
    line-height: 20px;
    letter-spacing: 0.5px;
    margin: 20px 0 30px;
    text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
  }

  span {
    font-size: 14px;
    margin-top: 20px;
  }

  a {
    color: #333;
    font-size: 14px;
    text-decoration: none;
    margin: 15px 0;
    transition: 0.3s ease-in-out;
  }

  a:hover {
    color: #4bb6b7;
  }

  .content {
    display: flex;
    width: 100%;
    height: 50px;
    align-items: center;
    justify-content: space-around;
  }

  .content .checkbox {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .content input {
    accent-color: #333;
    width: 12px;
    height: 12px;
  }

  .content label {
    font-size: 14px;
    user-select: none;
    padding: 5px;
  }

  button {
    position: relative;
    border-radius: 20px;
    border: 1px solid #4bb6b7;
    background-color: #4bb6b7;
    color: #fff;
    font-size: 15px;
    font-weight: 700;
    margin: 20px;
    padding: 12px 80px;
    letter-spacing: 1px;
    text-transform: capitalize;
    transition: 0.3s ease-in-out;
    cursor: pointer;
  }

  button:hover {
    letter-spacing: 3px;
  }

  button:active {
    transform: scale(0.95);
  }

  button:focus {
    outline: none;
  }

  button.ghost {
    background-color: rgba(255, 255, 255, 0.2);
    border: 2px solid #fff;
    color: #fff;
  }

  #login i {
    position: absolute;
    left: 50px;
  }

  #register i {
    position: absolute;
    right: 50px;
  }

  button.ghost i {
    position: absolute;
    opacity: 1;
    transition: 0.3s ease-in-out;
    z-index: 6;
  }

  button.ghost i.register {
    right: 70px;
  }

  button.ghost i.login {
    left: 70px;
  }

  form {
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 50px;
    height: 100%;
    text-align: center;
  }

  input {
    background-color: #fff;
    outline: none;
    border: none;
    border-bottom: 2px solid #adadad;
    padding: 12px 0px;
    margin: 8px 0;
    width: 100%;
  }

  .container {
    border-radius: 25px;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 0px 10px rgba(0, 0, 0, 0.22);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 500px;
  }

  .form-container {
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
  }

  .form-control {
    width: 100%;
    position: relative;
  }

  .form-control2 {
    width: 100%;
    position: relative;
  }

  .form-control2 span {
    position: absolute;
    border-bottom: 3px solid #2691d9;
    left: 0;
    bottom: 8px;
    width: 0%;
    transition: all 0.3s ease;
  }

  .form-control2 input:focus~span {
    width: 100%;
  }

  .form-control small {
    color: red;
    position: absolute;
    top: 50px;
    left: 0;
    font-size: 12px;
    z-index: 100;
  }

  .form-control span {
    position: absolute;
    border-bottom: 3px solid #2691d9;
    left: 0;
    bottom: 8px;
    width: 0%;
    transition: all 0.3s ease;
  }

  .form-control input:focus~span {
    width: 100%;
  }

  .form-control2 small {
    color: red;
    position: absolute;
    top: 50px;
    left: 0;
    font-size: 12px;
    z-index: 100;
  }

  .form-control2 span {
    position: absolute;
    border-bottom: 3px solid #2691d9;
    left: 0;
    bottom: 8px;
    width: 0%;
    transition: all 0.3s ease;
  }

  .form-control2 input:focus~span {
    width: 100%;
  }

  .login-container {
    left: 0;
    width: 50%;
    z-index: 2;
  }

  .container.right-panel-active .login-container {
    transform: translateX(100%);
  }

  .register-container {
    /* position: relative; */
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
  }

  .container.right-panel-active .register-container {
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: show 0.6s;
  }

  @keyframes show {

    0%,
    49.99% {
      opacity: 0;
      z-index: 1;
    }

    50%,
    100% {
      opacity: 1;
      z-index: 5;
    }
  }

  .overlay-container {
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: transform 0.6s ease-in-out;
    z-index: 100;
  }

  .container.right-panel-active .overlay-container {
    transform: translate(-100%);
  }

  .overlay {
    background-image: url("img/giay-converse-classic-8.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: 0 0;
    color: #ffffff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
  }

  .overlay::before {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background: linear-gradient(to top,
        rgba(46, 94, 109, 0.4) 40%,
        rgba(46, 94, 109, 0));
  }

  .container.right-panel-active .overlay {
    transform: translateX(50%);
  }

  .overlay-panel {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 40px;
    text-align: center;
    top: 0;
    height: 100%;
    width: 50%;
    transform: translateX(0);
    transition: transform 0.6s ease-in-out;
  }

  .overlay-left {
    transform: translateX(-20%);
  }

  .container.right-panel-active .overlay-left {
    transform: translateX(0);
  }

  .overlay-right {
    right: 0;
    transform: translateX(0);
  }

  .container.right-panel-active .overlay-right {
    transform: translateX(20%);
  }

  .social-container {
    margin: 20px 0;
  }

  .social-container a {
    border: 1px solid #dddddd;
    border-radius: 50%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 5px;
    height: 40px;
    width: 40px;
    transition: 0.3s ease-in-out;
  }

  .social-container a:hover {
    border: 1px solid #4bb6b7;
  }
</style>

<body>
  <div class="container" id="container">
    <div class="form-container register-container">
      <form method="post">
        <h1>Đăng ký</h1>
        <div class="form-control">
          <input type="text" name="email" required placeholder="Name" />
        </div>
        <div class="form-control">
          <input type="email" name="email" required placeholder="Email" />
        </div>
        <div class="form-control">
          <input type="password" name="password" required placeholder="Password" />
        </div>
        <button type="submit" name="register">Đăng ký</button>
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
          <input type="text" class="email-2" name="email" value="<?= $email ?>" placeholder="email" />
          <? echo !empty($errors['email']['required']) ? '<small>' . $errors['email']['required'] . '</small>' : '' ?>
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
        <button type="submit" name="login">Đăngnhập</button>
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
            Chào <br />
            Bạn
          </h1>
          <button class="ghost" id="login">
            Đăngnhập
            <i class="fa-solid fa-arrow-left"></i>
          </button>
        </div>

        <div class="overlay-panel overlay-right">
          <h1 class="title">

            Bắt đầu đăng kí ngay bây giờ
          </h1>
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