<?php
# [MODEL]
model('admin','blog');

# [VARIABLE]
$image_old = $name_blog = $short_description = $description = '';
$error = [];

# [HANDLE]
$slug_category = $_arrayURL[1];
// lấy thông tin danh mục
$category_blog = pdo_query_one('SELECT * FROM category_blog WHERE slug_category = "'.$slug_category.'"');
if(!$category_blog) view_404('admin');

// lấy thông tin từ form post
if(isset($_POST['create'])) {

    // lấy dữ liệu từ input
    $name_blog = $_POST['name_blog'];
    $description = $_POST['description'];
    $short_description = $_POST['short_description'];
    $image = $_FILES['image'];
    $image_old = ($_POST['image_old']) ?? '';

    
    // Nếu có ảnh mới, thì sẽ lưu ảnh và lưu path vào biến $image_old
    if($image['tmp_name']) {
        // Xoá ảnh cũ nếu có
        if($image_old) move_file($image_old);
        $image_old = save_file(PATH_FILE_BLOG,$image);
    }else ($image_old) ?? $error[] = 'Vui lòng nhập ảnh';

    // Kiểm tra validate
    if(!$name_blog) $error[] = 'Vui lòng nhập tiêu đề';
    if(!$short_description) $error[] = 'Vui lòng nhập mô tả ngắn';
    if(!$description) $error[] = 'Vui lòng nhập nội dung';

    // Kiểm tra tiêu đề có tồn tại chung category chưa
    if(check_name_blog_exist($name_blog,$slug_category)) $error[] = 'Tiêu đề tin tức này đã tồn tại';

    // Thông báo lỗi
    if($error) toast_create('danger',$error[0]);
    //tạo người dùng
    else {
        $stmt = pdo_get_connection()->prepare('INSERT INTO blog (id_category, id_user, name_blog, slug_blog, short_description, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)');
        // Thực hiện lệnh với các tham số
        $stmt->execute([
            $category_blog['id_category'],
            $_SESSION['user']['id_user'],
            $name_blog,
            create_slug($name_blog),
            $short_description,
            $description,
            $image_old,
        ]);
        toast_create('success','Tạo bài viết thành công');
    }
}

# [DATA]
$data = [
    'name_page' => 'Thêm tin tức',
    'image_old' => $image_old,
    'name_blog' => $name_blog,
    'short_description' => $short_description,
    'description' => $description,
    'slug_category' => $slug_category,
    'name_category' => $category_blog['name_category'],
];

# [RENDER]
view('admin','Danh sách tin tức','blog-detail',$data);