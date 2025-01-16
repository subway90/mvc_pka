<div id="top" class="sa-app__body">
<form action="<?=URL_ADMIN?>them-sinh-vien" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=URL_ADMIN?>quan-li-sinh-vien">Quản lí sinh viên</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Thêm</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=URL_ADMIN?>quan-li-sinh-vien" class="btn btn-secondary me-3">Hủy</a>
                                <button name="create" class="btn btn-success" type="submit" >Lưu</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="col-12 mb-2">
                                                <span class="text-danger">(&#10033;)</span> : <span class="small">Thông tin bắt buộc điền</span>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="username" value="<?=$username?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Username <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="password" value="<?=$password?>" type="password" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Mật khẩu <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="password_confirm" value="<?=$password_confirm?>" type="password" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Xác nhận mật khẩu <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="full_name" value="<?=$full_name?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Họ và tên <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <select name="status" class="form-select" id="status" aria-label="Floating label select example">
                                                    <option <?= ($status==1) ? 'selected' : '' ?> value="1">Tài khoản hoạt động</option>
                                                    <option <?= ($status==2) ? 'selected' : '' ?>value="2">Tài khoản ẩn</option>
                                                </select>
                                                <label for="status">Trạng thái</label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <select name="major" class="form-select" id="major" aria-label="Floating label select example">
                                                    <?php foreach ($list_major as $option) { ?>
                                                        <option <?= ($major == $option['id_major']) ? 'selected' : '' ?> value="<?= $option['id_major'] ?>" ><?=$option['name_major']?></option>
                                                        <?php }?>
                                                </select>
                                                <label for="major">Chuyên ngành học</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sa-entity-layout__sidebar">
                                    <div class="card w-100">
                                        <div class="card-body p-5">
                                            <div class="mb-5 h2 fs-exact-18">Ảnh đại diện</div>
                                            <div class="form-control">
                                                <div class="max-w-20x">
                                                    <?php
                                                    if(empty($image_old)){ ?>
                                                    <img src="<?= DEFAULT_IMG_USER ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="" />
                                                    <?php }else{ ?>
                                                    <img src="<?= URL.$image_old ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="<?= $image_old ?>" />
                                                    <div class="text-info text-center mt-2"><?= $image_old ?></div>
                                                    <input hidden type="text" name="image_old" value="<?=$image_old?>">
                                                    <?php } ?>
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