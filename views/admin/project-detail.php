<div id="top" class="sa-app__body">
<form action="<?=URL_ADMIN?>chi-tiet-do-an/<?=$slug_project?>" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=URL_ADMIN?>quan-li-do-an">Quản lí đồ án</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=URL_ADMIN?>quan-li-do-an" class="btn btn-secondary me-3">Hủy</a>
                                <button name="update" class="btn btn-warning" type="submit" >Cập nhật</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card w-100">
                                        <div class="card-body p-5 row">
                                            <div class="mb-5 h2 fs-exact-18 px-0">Thông tin đồ án</div>
                                            <div class="col-12 mb-2">
                                                <span class="text-danger">(&#10033;)</span> : <span class="small">Thông tin bắt buộc điền</span>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <input value="<?=format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss')?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Ngày đăng kí</label>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <input value="<?=($updated_at) ? format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : 'Chưa cập nhật'?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Ngày cập nhật mới nhất</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="name_project" value="<?=$name_project?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Tên đề tài <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating px-1 mb-2 pb-3">
                                                <textarea style="height:100%" name="description_project" type="text" class="form-control" id="color" placeholder="name@example.com"><?=$description_project?></textarea>
                                                <label for="color">Mô tả <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <?php if($document_project) { ?>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="document_project" value="<?=$document_project?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Document</label>
                                                <div class="mt-3">
                                                    <a href="<?=URL.$document_project?>" class="btn btn-primary" download>
                                                        Tải xuống tài liệu
                                                    </a>
                                                    <button class="btn btn-secondary" onclick="openDocument()">
                                                        Xem tài liệu
                                                    </button>
                                                    <script>
                                                        function openDocument() {
                                                            const url = '<?=URL.$document_project?>';
                                                            // Mở tệp trong một cửa sổ mới hoặc tab mới
                                                            window.open(url, '_blank');
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                            <?php }else { ?>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="document_project" value="Chưa có" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Document</label>
                                            </div>
                                            <?php }?>
                                            <div class="col-6">
                                                <div class="my-5 h2 fs-exact-18 px-0">Sinh viên thực hiện</div>
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
                                            </div>
                                            <div class="col-6">
                                                <div class="my-5 h2 fs-exact-18 px-0">Giảng viên hướng dẫn</div>
                                                <div class="d-flex align-items-center">
                                                    <img class="rounded-circle me-3" width="35" src="<?=$teacher_avatar ? URL.$teacher_avatar : DEFAULT_IMG_USER?>">
                                                    <a class="text-muted fw-bold" href="<?=URL_ADMIN?>/chi-tiet-giang-vien/<?=$teacher_username?>">
                                                        <?= $teacher_name  ?> 
                                                    </a>
                                                </div>
                                                <div class="mt-3">
                                                    <div class="text-muted small"> <strong>Mã số:</strong> <?= $teacher_username ?></div>
                                                    <div class="text-muted small"> <strong>Email:</strong> <?= $teacher_email ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5 h2 fs-exact-18">Hình ảnh đồ án</div>
                                            <div class="form-control">
                                                <div class="max-w-20x">
                                                    <?php
                                                    if(empty($image_old)){ ?>
                                                    <img src="<?= DEFAULT_IMG_BLOG ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="" />
                                                    <?php }else{ ?>
                                                    <img src="<?= URL.$image_old ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="<?= $image_old ?>" />
                                                    <?php } ?>
                                                    <div class="text-info text-center mt-2"><?= ($image_old) ? $image_old : 'Chưa có ảnh' ?></div>
                                                    <input hidden type="text" name="image_old" value="<?=$image_old?>">
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <a href="#" class="me-3 pe-2">
                                                    <input type="file" id="imageFile" name="image" onchange="chooseFile(this)" class="form-control" accept="image/jpeg,image/png, image/gif" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</div>
</form>