<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= (isset($title)) ? $title : WEB_NAME ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="https://cntt.epu.edu.vn/Images/favicon.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= URL ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= URL ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= URL ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= URL ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= URL ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= URL ?>assets/css/main.css" rel="stylesheet">

</head>

<?=
        // dùng toast
    toast_show();
?>

<body class="contact-page">

    <header id="header" class="header d-flex align-items-center sticky-top py-3">
        <div class="container position-relative d-flex align-items-center">

            <a href="<?=URL?>" class="logo d-flex align-items-center me-auto">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO-9Cx2kvUrVEbpBdDspON-K894ASoV4BFLQ&s"
                    alt="">
                <!-- <h1 class="sitename">Company</h1><span>.</span> -->
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <!--Search Form -->
                    <li class="me-lg-2 px-lg-0 px-3">
                        <div class="search-widget widget-item">
                            <div class="search-widget">
                                <form action="">
                                    <input type="text">
                                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                    <!-- Category Case -->
                    <?php
                    foreach (pdo_query('SELECT slug_category, name_category FROM category_blog WHERE status_category') as $category) { ?>
                    <li><a href="<?= URL ?>danh-muc/<?=$category['slug_category']?>" class="<?= ($category['slug_category'] == $slug_category) ? 'active' : '' ?>"><?=$category['name_category']?></a></li>
                    <?php }?>
                    <?php if ($_SESSION['user']) { ?>
                    <!-- Account Case -->
                    <li class="dropdown">
                        <a href="#">
                            <span>
                                <img class="me-2 rounded-circle" width="30" src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" alt="">
                            </span>
                            <span><?=$_SESSION['user']['full_name']?></span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                            <ul>
                                <?php if(author('admin')) { ?>
                                <li><a href="<?=URL_ADMIN?>">Trang quản trị</a></li>
                                <?php }?>
                                <li><a href="#">Trang cá nhân</a></li>
                                <?php if(author('student')) { ?>
                                <li><a href="<?=URL?>do-an">Đồ án</a></li>
                                <?php }?>
                                <hr>
                                <li><a href="<?=URL?>dang-xuat">Đăng xuất</a></li>
                            </ul>
                    </li>
                    <?php } else { ?>
                    <li><a href="<?= URL ?>dang-nhap" class="<?= ($page == 'login') ? 'active' : '' ?>">Tài khoản</a></li>
                    <?php } ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">