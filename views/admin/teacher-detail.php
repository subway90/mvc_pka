<div id="top" class="sa-app__body">
<form action="<?=URL_ADMIN?>chi-tiet-giang-vien/<?=$username?>" method="post" enctype="multipart/form-data">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                    <div class="container container--max--xl">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col">
                                    <nav class="mb-2" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-sa-simple">
                                            <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                            <li class="breadcrumb-item"><a
                                                    href="<?=URL_ADMIN?>quan-li-giang-vien">Quản lí giảng viên</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                                        </ol>
                                    </nav>
                                </div>
                                <div class="col-auto d-flex"><a href="<?=URL_ADMIN?>quan-li-giang-vien" class="btn btn-secondary me-3">Hủy</a>
                                <button name="update" class="btn btn-warning" type="submit" >Cập nhật</button></div>
                            </div>
                        </div>
                        <div class="sa-entity-layout"
                            data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                            <div class="sa-entity-layout__body">
                                <div class="sa-entity-layout__main">
                                    <div class="card w-100">
                                        <div class="card-body p-5 row">
                                            <div class="col-12 mb-2">
                                                <span class="text-danger">(&#10033;)</span> : <span class="small">Thông tin bắt buộc điền</span>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <input value="<?=format_time($created_at,'DD/MM/YYYY lúc hh:mm:ss')?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Ngày tham gia</label>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <input value="<?=($updated_at) ? format_time($updated_at,'DD/MM/YYYY lúc hh:mm:ss') : 'Chưa cập nhật'?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Ngày cập nhật mới nhất</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="username" value="<?=$username?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Username</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="full_name" value="<?=$full_name?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Họ và tên <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <select name="degree" class="form-select" id="degree" aria-label="Floating label select example">
                                                    <?php foreach ($list_degree as $option) { ?>
                                                        <option <?= ($id_degree == $option['id_degree']) ? 'selected' : '' ?> value="<?= $option['id_degree'] ?>" ><?=$option['name_degree']?></option>
                                                        <?php }?>
                                                </select>
                                                <label for="degree">Học vị</label>
                                            </div>
                                            <div class="col-6 form-floating  px-1 mb-2 pb-3">
                                                <select name="position" class="form-select" id="position" aria-label="Floating label select example">
                                                    <?php foreach ($list_position as $option) { ?>
                                                        <option <?= ($id_position == $option['id_position']) ? 'selected' : '' ?> value="<?= $option['id_position'] ?>" ><?=$option['name_position']?></option>
                                                        <?php }?>
                                                </select>
                                                <label for="position">Chức vụ</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <select name="major" class="form-select" id="major" aria-label="Floating label select example">
                                                    <?php foreach ($list_major as $option) { ?>
                                                        <option <?= ($id_major == $option['id_major']) ? 'selected' : '' ?> value="<?= $option['id_major'] ?>" ><?=$option['name_major']?></option>
                                                        <?php }?>
                                                </select>
                                                <label for="major">Bộ môn</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="email" value="<?=$email?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Email <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="phone" value="<?=$phone?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Số điện thoại</label>
                                            </div>
                                            <div class="col-12 form-floating  px-1 mb-2 pb-3">
                                                <input name="address" value="<?=$address?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com">
                                                <label for="color">Địa chỉ</label>
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