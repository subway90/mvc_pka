<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title><?= (isset($title)) ? $title : WEB_NAME ?></title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="https://cntt.epu.edu.vn/Images/favicon.png" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/css/style.css" />
    <!-- cdn google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    
</head>

<body>
    <!-- sa-app -->
    <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="<?=URL_ADMIN?>">
                        <!-- logo -->
                        <div class="sa-sidebar-logo">
                            <span class="text-light">
                                <img class="w-75" src="https://cntt.epu.edu.vn/Uploads/Logo/Logo20181025.png" alt="">
                            </span>
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body bg-light bg-opacity-10" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <!-- Project Case -->
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=URL_TEACHER?>duyet-do-an" class="sa-nav__link <?=($page=='project') ? 'bg-dark' : ''?>">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-folder"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí đồ án</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <div class="sa-toolbar__item">
                        Hệ thống quản lí PKA
                    </div>
                    <div class="mx-auto"></div>

                    <div class="dropdown sa-toolbar__item">
                        <button class="sa-toolbar-user" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            data-bs-offset="0,1" aria-expanded="false">
                            <span class="sa-toolbar-user__avatar sa-symbol sa-symbol--shape--rounded">
                                <img src="https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg" width="64" height="64">
                            </span>
                            <span class="sa-toolbar-user__info">
                                <span class="sa-toolbar-user__title text-danger">
                                <?=$_SESSION['user']['full_name']?>
                                </span>
                                <span class="sa-toolbar-user__subtitle">
                                <?=$_SESSION['user']['email']?>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a class="dropdown-item" href="<?=URL?>">Trang chủ</a>
                                <a class="dropdown-item text-danger" href="<?=URL."dang-xuat"?>">Thoát</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>

            
<!-- Dùng toast -->
<div class="mt-4">
<?=toast_show()?>
</div>