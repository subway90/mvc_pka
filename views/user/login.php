<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0">Đăng nhập</h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="<?=URL?>">Trang chủ</a></li>
        <li class="current">Tài khoản</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<!-- Contact Section -->
<section id="contact" class="contact section">

  <div class="container mt-5" data-aos="fade">

    <div class="row justify-content-center gy-5 gx-lg-5">

      <div class="col-lg-4">

        <div class="info">
          <h3>Chào mừng,</h3>
          <p>Đăng nhập để sử dụng các tính năng của sinh viên, giảng viên và quản trị viên.</p>

          <form action="<?=URL?>dang-nhap" method="post" class="">
          <div class="row">
            <div class="php-email-form">
                <div class="col-md-12 form-group">
                    <input type="text" value="<?=$username?>" name="username" class="form-control" id="name" placeholder="Username">
                </div>
                <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control" name="password" id="email" placeholder="Mật khẩu">
                </div>
            </div>
          </div>
          <div class="text-center mt-3"><button class="btn-submit" name="login" type="submit">Đăng nhập</button></div>
        </form>

        </div>

      </div>

    </div>

  </div>

</section><!-- /Contact Section -->