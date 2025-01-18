<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0"><?=$name_category?></h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?= URL ?>">Trang chủ</a></li>
        <li class="current">Tin tức</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

  <div class="container">
    <div class="row gy-4">
    <?php if(!$list_blog) { ?>
    <!-- Trường hợp trống -->
     <div style="height:300px" class="col-12 text-muted small d-flex align-items-center justify-content-center">
        Hiện tại chưa có tin tức nào.
     </div>
    <?php }else {?>
    <!-- Danh sách tin tức -->
    <?php foreach ($list_blog as $blog) {
        extract($blog);
    ?>
      <div class="col-lg-3">
        <article class="position-relative h-100">

          <div class="post-img position-relative overflow-hidden">
            <img src="<?= ($image) ? URL.$image : DEFAULT_IMG_BLOG ?>" class="img-fluid" alt="">
            <span class="post-date"><?= format_time($created_at,'DD thg MM, YYYY') ?></span>
          </div>

          <div class="p-3 d-flex flex-column">

            <h3 class="post-title"><?= $name_blog ?></h3>


            <div>
              <?= $short_description ?>
            </div>

            <div class="meta d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2"><?= $full_name ?></span>
            </div>

            <hr>

            <a href="<?=URL?>tin-tuc/<?=$slug_blog?>" class="readmore stretched-link"><span>Đọc thêm</span><i class="bi bi-arrow-right"></i></a>

          </div>

        </article>
      </div>
    
    <?php }}?>


    </div>
  </div>

</section><!-- /Blog Posts Section -->

<!-- <section id="blog-pagination" class="blog-pagination section">

  <div class="container">
    <div class="d-flex justify-content-center">
      <ul>
        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#" class="active">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>...</li>
        <li><a href="#">10</a></li>
        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  </div>

</section> -->