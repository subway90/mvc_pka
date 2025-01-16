<?php

# [MODEL]
model('admin','blog');

# [VARIABLE]
$error = []; //mảng lỗi

# [HANDLE]

// Lấy slug
if(isset($_arrayURL[1]) && $_arrayURL[1]) $slug_blog = clear_input($_arrayURL[1]);
// lấy thông tin blog
$get_blog = get_one_blog($slug_blog);
if(!$get_blog) view_404('admin');
// giải nén mảng
extract($get_blog);
$image_old = $image;

// Trường hợp nhấn button Update
if(isset($_POST['update'])) {

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
    if(check_name_blog_exist($name_blog,$slug_category) == $id_blog) $error[] = 'Tiêu đề tin tức này đã tồn tại';

    // Thông báo lỗi
    if($error) toast_create('danger',$error[0]);
    //tạo người dùng
    else {
        $stmt = pdo_get_connection()->prepare('UPDATE blog SET id_category = ?, id_user = ?, name_blog = ?, slug_blog = ?, short_description = ?, description = ?, image = ? WHERE id_blog = ?');
        // Thực hiện lệnh với các tham số
        $stmt->execute([
            $id_category,
            $_SESSION['user']['id'],
            $name_blog,
            create_slug($name_blog),
            $short_description,
            $description,
            $image_old,
            $id_blog,
        ]);
        toast_create('success','Cập nhật thành công');
    }
}

# [DATA]
$data = [
    'update_page' => true, // bật trạng thái update
    'name_page' => 'Tin tức chi tiết',
    'name_category' => $name_category,
    'slug_category' => $slug_category,
    'name_blog' => $name_blog,
    'slug_blog' => $slug_blog,
    'image_old' => $image_old,
    'status' => $status,
    'description' => $description,
    'short_description' => $short_description,
    'list_category_blog' => pdo_query('SELECT * FROM category_blog'),
];

# [RENDER]
view('admin','Chi tiết bài viết : '.$get_blog['name_blog'],'blog-detail',$data);