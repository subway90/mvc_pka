<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Đồ án của bạn</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="index.html">Trang chủ</a></li>
        <li class="current">Thông tin sinh viên</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container mt-5" data-aos="fade">

    <div class="row gy-5 gx-lg-5">

      <div class="col-lg-4">

        <div class="info">
          <h3>Thông tin cá nhân</h3>
          <p>Kiểm tra thông tin kỹ trước khi đăng kí, trường hợp lỗi có thể sửa tại <a href="<?=URL?>">Chỉnh sửa profile</a></p>

          <div class="info-item d-flex">
            <i class="bi bi-person flex-shrink-0"></i>
            <div>
              <h4>Họ và tên:</h4>
              <p><?= $_SESSION['user']['full_name'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

           <div class="info-item d-flex">
            <i class="bi bi-person flex-shrink-0"></i>
            <div>
              <h4>Chuyên ngành:</h4>
              <p><?= $_SESSION['user']['id_major'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

           <div class="info-item d-flex">
            <i class="bi bi-person flex-shrink-0"></i>
            <div>
              <h4>Họ và tên:</h4>
              <p><?= $_SESSION['user']['full_name'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h4>Địa chỉ:</h4>
              <p><?= $_SESSION['user']['address'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h4>Email:</h4>
              <p><?= $_SESSION['user']['email'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

          <div class="info-item d-flex">
            <i class="bi bi-phone flex-shrink-0"></i>
            <div>
              <h4>Số điện thoại:</h4>
              <p><?= $_SESSION['user']['phone'] ?? 'trống' ?></p>
            </div>
          </div><!-- End Info Item -->

        </div>

      </div>

      <div class="col-lg-8">
        <form action="<?=URL?>do-an" method="post" role="form" class="php-email-form">
            <?php if(!$status_project) {?>
            <div class="h5 mb-2">Đăng kí đề tài đồ án tốt nghiệp</div>
            <?php }elseif($status_project == 1) {?>
            <div class="h5 mb-2">Trạng thái: Đang chờ duyệt</div>
            <?php }elseif($status_project == 2) {?>
            <div class="h5 mb-2">Trạng thái: Đã duyệt</div>
            <?php }else{ ?>
            <div class="h5 mb-2">Trạng thái: Đã hoàn thành</div>
            <?php }?>
            <div class="form-group mt-3">
                <input type="text" value="<?=$name_project?>" class="form-control" name="name_project" id="subject" placeholder="Nhập tên đề tài cần tạo" <?=$status_project == 1 ? 'readonly': '' ?> >
            </div>
            <div class="form-floating mt-3">
                <select name="id_teacher" class="form-select rounded-0" id="degree" <?=$status_project == 1 ? 'readonly': '' ?>>
                <?php foreach ($list_teacher as $teacher) { extract($teacher) ?>
                    <option value="<?=$id_teacher?>"><?=$username.' - '.$name_degree.' '.$full_name?></option>
                <?php }?>
                </select>
                <label for="degree">Giảng viên hỗ trợ</label>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="description_project" placeholder="Nhập mô tả dự án" <?=$status_project == 1 ? 'readonly': '' ?>><?=$description_project?></textarea>
            </div>
            <?php if(!$status_project) {?>
                <div class=""><button class="btn btn-outline-primary" name="create" type="submit">Đăng kí ngay</button></div>
            <?php }elseif($status_project == 1) {?>
                <div class=""><button disabled class="btn btn-outline-muted" type="submit">Đang chờ duyệt</button></div>
            <?php }elseif($status_project == 2) {?>
                <div class=""><button disabled class="btn btn-outline-muted" name="update" type="submit">Cập nhật</button></div>
            <?php } ?>
        </form>
      </div><!-- End Contact Form -->

    </div>

  </div>

</section><!-- /Contact Section -->