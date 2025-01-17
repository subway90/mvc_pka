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
                                <li class="breadcrumb-item active" aria-current="page">Quản lí giang viên</li>
                                <li class="breadcrumb-item active" aria-current="page"><?= 'Danh sách hoạt động' ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <?php if(isset($_GET['blocklist'])) {?>
                            <a href="<?=URL_ADMIN?>quan-li-giang-vien" class="btn btn-outline-success">Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>them-giang-vien" class="btn btn-outline-primary me-3"><i class="fa fas fa-plus me-2"></i> Thêm</a>
                            <a href="<?=URL_ADMIN?>quan-li-giang-vien/danh-sach-xoa" class="btn btn-outline-danger"><i class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
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
                            <th class="w-w-5x">Mã số</th>
                            <th class="min-w-15x">Avatar | Thông tin</th>
                            <th class="">SĐT</th>
                            <th class="min-w-10x">Email</th>
                            <th class="min-w-10x">Địa chỉ</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_teacher as $teacher) {
                        extract($teacher);
                    ?>
                        <tr>
                            <td> 
                                <a class="small" href="<?=URL_ADMIN?>chi-tiet-giang-vien/<?=$username?>"><?= $username ?></a>
                             </td>
                            <td>
                                <div class="d-flex align-items-start">
                                    <img width="50" class="" src="<?= ($avatar) ? URL.$avatar : DEFAULT_IMG_USER ?>">
                                    <div class="border-start ms-4 ps-4">
                                        <a href="<?=URL_ADMIN?>chi-tiet-giang-vien/<?=$username?>" class="text-muted"><strong><?= $full_name ?></strong></a>
                                        <div class="text-muted small"> <strong>Ngành:</strong> <?= $name_major ?></div>
                                        <div class="text-muted small"> <strong>Học vị:</strong> <?= $name_degree ?></div>
                                        <div class="text-muted small"> <strong>Chức vụ:</strong> <?= $name_position ?></div>
                                        <div class="text-muted small"> <strong>Ngày tham gia:</strong> <?= format_time($created_at,'DD tháng MM năm YYYY') ?></div>
                                    </div>
                                </div>
                            </td>
                            <td><?= empty($phone) ? '<span class="text-muted small">trống</span>' : '<span class="text-muted small">'.$phone.'</span>' ?? '<span class="text-muted small">trống</span>' ?> </td>
                            <td><?= empty($email) ? '<span class="text-muted small">trống</span>' : '<span class="text-muted small">'.$email.'</span>' ?></td>
                            <td><?= empty($address) ? '<span class="text-muted small">trống</span>' : '<span class="text-muted small">'.$address.'</span>' ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                        <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="customer-context-menu-0">
                                        <li><a class="dropdown-item text-warning" href="<?=URL_ADMIN?>chi-tiet-giang-vien/<?=$username?>">Xem chi tiết</a></li>
                                        <li><hr class="dropdown-divider"/></li>
                                        <?php if(!isset($_GET['blocklist'])) {?>
                                        <li><a class="dropdown-item text-danger" href="<?=URL_ADMIN?>chi-tiet-giang-vien&/<?=$username?>">Cấm tài khoản</a></li>
                                        <?php }else{?>
                                        <li><a class="dropdown-item text-success" href="<?=URL_ADMIN?>chi-tiet-giang-vien/<?=$username?>">Mở tài khoản</a></li>
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

            