<div id="top" class="sa-app__body">
    <form action="<?= URL_ADMIN ?>them-tin-tuc/<?=$slug_category?>" method="post" enctype="multipart/form-data">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container container--max--xl">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <nav class="mb-2" aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item"><a href="<?=URL_ADMIN?>">Quản lí</a></li>
                                <li class="breadcrumb-item"><a href="<?=URL_ADMIN.'danh-muc-tin-tuc/'.$slug_category?>"><?= $name_category ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Thêm bài viết mới</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-auto d-flex"><a href="<?=URL_ADMIN.'danh-muc-tin-tuc/'.$slug_category?>"
                                class="btn btn-secondary me-3">Hủy</a>
                            <button name="create" class="btn btn-success" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query="{&quot;920&quot;:&quot;sa-entity-layout--size--md&quot;,&quot;1100&quot;:&quot;sa-entity-layout--size--lg&quot;}">
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5 row">
                                    <div class="col-12 mb-5">
                                        <h2 class="mb-0 fs-exact-18">Nhập thông tin News</h2>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-control">
                                            <?php
                                            if(empty($image_old)){ ?>
                                            <img src="<?=DEFAULT_IMG_BLOG?>" id="image" class="w-100" alt="image product" />
                                            <?php }else{ ?>
                                            <img src="<?=URL.$image_old?>" id="image" class="w-100" alt="image product" />
                                            <div class="text-info text-center mt-2"><?=$image_old?></div>
                                            <input hidden type="text" name="image_old" value="<?=$image_old?>">
                                            <?php } ?>
                                        </div>
                                        <div class="mt-4">
                                            <a href="#" class="me-3 pe-2">
                                                <input type="file" id="imageFile" name="image" onchange="chooseFile(this)" class="form-control" accept="image/jpeg,image/png, image/gif" >
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="col-12 form-floating mb-5">
                                            <input name="name_blog" value='<?= $name_blog ?>' type="text"
                                                class="form-control rounded rounded-5" id="titleNews"
                                                placeholder="titleNews@example.com">
                                            <label for="titleNews">Tên bài viết</label>
                                        </div>
                                        <div class="col-12 form-floating">
                                            <textarea name="short_description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200"><?=$short_description?></textarea>
                                            <label for="floatingTextarea2">Mô tả ngắn</label>
                                        </div>
                                    </div>
                                    <div class="col-12 px-3 mb-5">
                                        <textarea name="description" class="form-control" placeholder="Leave a comment here"
                                            id="decribe"><?= $description ?></textarea>
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