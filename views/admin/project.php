 <!-- sa-app__body -->
 <div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Quản lí đồ án</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <?php if(isset($_GET['blocklist'])) {?>
                            <a href="<?=URL_ADMIN?>quan-li-sinh-vien" class="btn btn-outline-success">Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>them-sinh-vien" class="btn btn-outline-primary me-3"><i class="fa fas fa-plus me-2"></i> Thêm</a>
                            <a href="<?=URL_ADMIN?>quan-li-sinh-vien/danh-sach-xoa" class="btn btn-outline-danger"><i class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Nhập thông tin tìm kiếm"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
                <div class="sa-divider"></div>
                <table class="sa-datatables-init" data-order="[[ 1, &quot;asc&quot; ]]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th class="min-w-15x">Tên đề tài</th>
                            <th class="min-w-15x">Sinh viên thực hiện</th>
                            <th class="min-w-15x">Giảng viên hỗ trợ</th>
                            <th class="min-w-5x">Trạng thái</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_project as $project) {
                        extract($project);
                    ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img width="60" class="me-3" src="<?= ($image_project) ? URL.$image_project : DEFAULT_IMG_BLOG ?>">
                                    </div>
                                    <div>
                                        <div class="text-muted small"><strong><?= $name_project ?></strong></div>
                                        <div class="text-muted small">
                                            Ngày đăng kí : <?= format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss') ?>
                                        </div>
                                        <div class="text-muted small">
                                            Ngày cập nhật : <?= $updated_at ? format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : 'Chưa cập nhật' ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" width="35" src="<?=$student_avatar ? URL.$student_avatar : DEFAULT_IMG_USER?>">
                                    <a class="text-muted fw-bold" href="<?=URL_ADMIN?>/chi-tiet-sinh-vien/<?=$student_username?>">
                                        <?= $student_name  ?> 
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <div class="text-muted small"> <strong>Mã số:</strong> <?= $student_username ?></div>
                                    <div class="text-muted small"> <strong>Email:</strong> <?= $student_email ?></div>
                                    <div class="text-muted small"> <strong>Ngành:</strong> <?= $name_major ?></div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3" width="35" src="<?=$student_avatar ? URL.$student_avatar : DEFAULT_IMG_USER?>">
                                    <a class="text-muted fw-bold" href="<?=URL_ADMIN?>/chi-tiet-sinh-vien/<?=$student_username?>">
                                        <?= $student_name  ?> 
                                    </a>
                                </div>
                                <div class="mt-3">
                                    <div class="text-muted small"> <strong>Mã số:</strong> <?= $student_username ?></div>
                                    <div class="text-muted small"> <strong>Email:</strong> <?= $student_email ?></div>
                                    <div class="text-muted small"> <strong>Ngành:</strong> <?= $name_major ?></div>
                                </div>
                            </td>
                            <td><?= ($status_project == 2) ? '<div class="badge badge-sa-success">Đã duyệt</div>' : '<div class="badge badge-sa-warning">Chưa duyệt</div>'?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                        <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="customer-context-menu-0">
                                        <li><a class="dropdown-item text-warning" href="<?=URL_ADMIN?>chi-tiet-sinh-vien/<?=$username?>">Xem chi tiết</a></li>
                              d        <li><hr class="dropdown-divider"/></li>
                                        <?php if(!isset($_GET['blocklist'])) {?>
                                        <li><a class="dropdown-item text-danger" href="<?=URL_ADMIN?>chi-tiet-sinh-vien&/<?=$username?>">Cấm tài khoản</a></li>
                                        <?php }else{?>
                                        <li><a class="dropdown-item text-success" href="<?=URL_ADMIN?>chi-tiet-sinh-vien/<?=$username?>">Mở tài khoản</a></li>
                                        <?php }?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            