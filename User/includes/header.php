 <!-- Header -->
 <nav class="navbar navbar-expand-lg navbar-light shadow">
     <div class="container d-flex justify-content-between align-items-center">

         <a class="navbar-brand text-success logo h1 align-self-center" href="index.php?act=home">
             Zay
         </a>

         <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
             <div class="flex-fill">
                 <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                     <li class="nav-item">
                         <a class="nav-link" href="index.php?act=home">Home</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php?act=about">About</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php?act=shop">Shop</a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="index.php?act=contact">Contact</a>
                     </li>
                 </ul>
             </div>
             <div class="navbar align-self-center d-flex">
                 <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                     <div class="input-group">
                         <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                         <div class="input-group-text">
                             <i class="fa fa-fw fa-search"></i>
                         </div>
                     </div>
                 </div>
                 <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                     <i class="fa fa-fw fa-search text-dark mr-2"></i>
                 </a>
                 <a class="nav-icon position-relative text-decoration-none" href="index.php?act=carts&get=cart">
                     <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                     <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?= count($_SESSION['cart']) ?></span>
                 </a>
                 <?php
                    if (!isset($_SESSION['username'])) { ?>
                     <a href="./login/login.php">
                         <img class="rounded-circle me-lg-2" src="../Admin/assets/images/profile/user-1.jpg" alt="" style=" width: 40px; height: 40px;">
                     </a>
                 <? } else { ?>
                     <div class="navbar-nav align-items-center ms-auto">
                         <div class="nav-item dropdown">
                             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                                 <img class="rounded-circle me-lg-2" src="../Admin/assets/images/profile/<?= $user['avatar'] ?>" alt="" style=" width: 40px; height: 40px;">
                                 <span class="d-lg-inline-flex d-none"><?= $user['username'] ?></span>
                             </a>
                             <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                                 <form method="post">
                                     <a href="index.php?act=profiles" class="dropdown-item">My Profile</a>
                                     <a href="index.php?pages=setaccout" class="dropdown-item">Settings</a>
                                     <button type="" name="logout" class="dropdown-item">Log Out</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 <? }
                    ?>

             </div>
         </div>

     </div>
 </nav>
 <!-- Close Header -->

 <!-- Modal -->
 <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="w-100 pt-1 mb-5 text-right">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="index.php?act=shop" method="post" class="modal-content modal-body border-0 p-0">
             <div class="input-group mb-2">
                 <input type="text" class="form-control" id="inputModalSearch" name="search" placeholder="Search ...">
                 <button type="submit" class="input-group-text bg-success text-light">
                     <i class="fa fa-fw fa-search text-white"></i>
                 </button>
             </div>
         </form>
     </div>
 </div>