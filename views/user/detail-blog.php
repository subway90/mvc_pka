<!-- Page Title -->
<div class="page-title accent-background">
  <div class="container d-lg-flex justify-content-between align-items-center">
    <h1 class="mb-2 mb-lg-0"><?= $name_category ?></h1>
    <nav class="breadcrumbs">
      <ol>
        <li><a href="index.html">Trang chủ</a></li>
        <li class="current">Tin tức</li>
      </ol>
    </nav>
  </div>
</div><!-- End Page Title -->

<div class="container">
  <div class="row">

    <div class="col-lg-8">

      <!-- Blog Details Section -->
      <section id="blog-details" class="blog-details section">
        <div class="container">

          <article class="article">

            <div class="post-img">
              <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="title">
              <?= $name_blog ?>
            </h2>

            <div class="meta-top">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#"><?= $full_name ?></a>
                </li>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                    href="#"><?= format_time($created_at, 'DD/MM/YYYY lúc hh:mm') ?></a></li>
              </ul>
            </div><!-- End meta top -->

            <div class="content">

              <blockquote class="text-start">
                <?= $short_description ?>
              </blockquote>

              <?= $description ?>

            </div><!-- End post content -->

            <div class="meta-bottom">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">Business</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div><!-- End meta bottom -->

          </article>

        </div>
      </section><!-- /Blog Details Section -->

      <!-- Comment Form Section -->
      <section id="comment-form" class="comment-form section">
        <div class="container">

          <form action="">

            <h4>Post Comment</h4>
            <p>Your email address will not be published. Required fields are marked * </p>
            <div class="row">
              <div class="col-md-6 form-group">
                <input name="name" type="text" class="form-control" placeholder="Your Name*">
              </div>
              <div class="col-md-6 form-group">
                <input name="email" type="text" class="form-control" placeholder="Your Email*">
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <input name="website" type="text" class="form-control" placeholder="Your Website">
              </div>
            </div>
            <div class="row">
              <div class="col form-group">
                <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
              </div>
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>

          </form>

        </div>
      </section><!-- /Comment Form Section -->

    </div>

    <div class="col-lg-4 sidebar">

      <div class="widgets-container">

        <!-- Blog Author Widget -->
        <div class="blog-author-widget widget-item">

          <div class="d-flex flex-column align-items-center">
            <img width="100" src="<?= $avatar ? URL . $avatar : DEFAULT_IMG_USER ?>" class="rounded-circle flex-shrink-0"
              alt="">
            <h4><?= $full_name ?></h4>
            <div class="social-links">
              <a href="https://x.com/#"><i class="bi bi-twitter-x"></i></a>
              <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
              <a href="https://instagram.com/#"><i class="biu bi-linkedin"></i></a>
            </div>

          </div>
        </div><!--/Blog Author Widget -->

        <!-- Recent Posts Widget -->
        <div class="recent-posts-widget widget-item">

          <h3 class="widget-title">Bài viết liên quan khác</h3>
          <?php foreach ($list_blog_recommend as $blog) {
            extract($blog);
            ?>
            <div class="post-item">
              <img src="<?= $image ? URL.$image : DEFAULT_IMG_BLOG ?>" alt="">
              <h4 class="mt-3">
                <a href="<?= URL ?>tin-tuc/<?= $slug_blog ?>"><?= $name_blog ?></a>
              </h4>
              <time><?= format_time($created_at,'DD thg MM, YYYY') ?></time>
            </div><!-- End recent post item-->
          <?php } ?>

        </div><!--/Recent Posts Widget -->

        <!-- Tags Widget -->
        <div class="tags-widget widget-item">

          <h3 class="widget-title">Tags</h3>
          <ul>
            <li><a href="#">App</a></li>
            <li><a href="#">IT</a></li>
            <li><a href="#">Business</a></li>
            <li><a href="#">Mac</a></li>
            <li><a href="#">Design</a></li>
            <li><a href="#">Office</a></li>
            <li><a href="#">Creative</a></li>
            <li><a href="#">Studio</a></li>
            <li><a href="#">Smart</a></li>
            <li><a href="#">Tips</a></li>
            <li><a href="#">Marketing</a></li>
          </ul>

        </div><!--/Tags Widget -->

      </div>

    </div>

  </div>
</div>