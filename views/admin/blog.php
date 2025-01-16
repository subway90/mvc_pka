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
                                <li class="breadcrumb-item active" aria-current="page"><?= $name_category ?></li>
                                <?php if(!$status_page) { ?>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách xoá</li>
                                <?php }?>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <?php if(!$status_page) {?>
                            <a href="<?=URL_ADMIN?>danh-muc-tin-tuc/<?=$slug_category?>" class="btn btn-outline-success">Quay về Danh sách hoạt động</a>
                        <?php } else {?>
                            <a href="<?=URL_ADMIN?>them-tin-tuc/<?=$slug_category?>" class="btn btn-outline-primary me-3"><i class="fa fas fa-plus me-2"></i> Thêm</a>
                            <a href="<?=URL_ADMIN?>danh-muc-tin-tuc/<?=$slug_category?>/danh-sach-xoa" class="btn btn-outline-danger"><i class="fa fas fa-trash me-2"></i>Danh sách xoá</a>
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
                            <th class="min-w-15x">Thông tin</th>
                            <!-- <th class="min-w-10x">Người đăng</th> -->
                            <th class="min-w-5x">Trạng thái</th>
                            <th class="min-w-5x">Lượt xem</th>
                            <th> Ngày tạo</th>
                            <th class="w-min" data-orderable="false"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list_blog as $blog) {
                        extract($blog);
                    ?>  
                        <tr>
                            <td>
                            <div class="d-flex align-items-center">
                                <div>
                                    <img width="100" class="me-3" src="<?= ($image) ? URL.$image : DEFAULT_IMG_BLOG ?>">
                                </div>
                                <div>
                                    <div class="text-dark small"><strong><?= $name_blog ?></strong></div>
                                    <div class="text-muted small"> <?= $short_description ?></div>
                                    <div class="text-muted small fst-italic"> <?=$updated_at ? 'Đã cập nhật: '.format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : '(Chưa có cập nhật)' ?></div>
                                </div>
                            </div>
                            </td>
                            <!-- <td>
                                    <img width="40" class="me-3 rounded-circle" src="<?= ($avatar) ? URL.$avatar : DEFAULT_IMG_USER ?>">
                                    <span class="text-muted small"><strong><?= $full_name ?></strong></span>
                            </td> -->
                            <td class="text-nowrap"> <?= ($status == 1) ? '<div class="badge badge-sa-success">Hoạt động</div>' : '<div class="badge badge-sa-warning">Ẩn</div>' ?> </td>
                            <td><span class="text-muted small"><?= $view ?></span></td>
                            <td><?= format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss') ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sa-muted btn-sm" type="button" id="customer-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                        <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"></path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="customer-context-menu-0">
                                        <li><a class="dropdown-item text-warning" href="<?=URL_ADMIN?>chi-tiet-tin-tuc/<?=$slug_blog?>">Xem chi tiết</a></li>
                                        <li><hr class="dropdown-divider"/></li>
                                        <?php if(!isset($_GET['blocklist'])) {?>
                                        <li><a class="dropdown-item text-danger" href="<?=URL_ADMIN?>chi-tiet-tin-tuc&/<?=$slug_blog?>">Cấm tài khoản</a></li>
                                        <?php }else{?>
                                        <li><a class="dropdown-item text-success" href="<?=URL_ADMIN?>chi-tiet-tin-tuc/<?=$slug_blog?>">Mở tài khoản</a></li>
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

            