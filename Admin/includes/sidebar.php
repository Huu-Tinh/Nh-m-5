<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="index.php?act=home" class="text-nowrap logo-img">
                <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=home" aria-expanded="false">
                        <span>

                            <i class="ti ti-home-2"></i>
                        </span>
                        <span class="hide-menu">home</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=user&get=list" aria-expanded="false">
                        <span>
                            <i class="ti ti-article"></i>
                        </span>
                        <span class="hide-menu">Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=categori&get=list" aria-expanded="false">
                        <span>
                            <!-- <i class="ti ti-alert-circle"></i> -->
                            <i class="ti ti-clipboard-list"></i>
                        </span>
                        <span class="hide-menu">Categories</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=product&get=list" aria-expanded="false">
                        <span>
                            <i class="ti ti-cards"></i>
                        </span>
                        <span class="hide-menu">Products</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=order&get=list" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">Order</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="index.php?act=froms" aria-expanded="false">
                        <span>
                            <i class="ti ti-file-description"></i>
                        </span>
                        <span class="hide-menu">Forms</span>
                    </a>
                </li>

                <li class="nav-small-cap" style="margin-top: 255px;">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">AUTH</span>
                </li>
                <li class="sidebar-item">
                    <form method="post">
                        <button name="logout" class="btn btn-outline-info mx-3 mt-2 d-block" type="submit">
                            <span>
                                <i class="ti ti-login"></i>
                            </span>
                            <span class="">Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
<?php
$out = new user();
if (isset($_POST['logout'])) {
    $out->logout();
}
