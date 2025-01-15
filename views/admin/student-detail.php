<div id="top" class="sa-app__body">
<form action="<?=URL_ADMIN?>quan-li-sinh-vien/them" method="post" enctype="multipart/form-data">
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
                                            <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
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
                                                <input name="username" value="<?=$student['username']?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Username <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="full_name" value="<?=$student['full_name']?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Họ và tên <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="email" value="<?=$student['email']?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Email <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="phone" value="<?=$student['phone'] ?? '(trống)'?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Số điện thoại <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="address" value="<?=$student['address']?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Địa chỉ <span class="text-danger">&#10033;</span></label>
                                            </div>
                                            <div class="col-12 form-floating mb-2 pb-3">
                                                <input name="address" value="<?=$student['name_major']?>" type="text" class="form-control rounded rounded-5" id="color" placeholder="name@example.com" readonly>
                                                <label for="color">Chuyên ngành <span class="text-danger">&#10033;</span></label>
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
                                                    <img src="<?= ($student['avatar']) ? URL.$student['avatar'] : DEFAULT_IMG_USER ?>" id="image" class="w-100 h-auto" width="320" height="320" alt="" />
                                                </div>
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