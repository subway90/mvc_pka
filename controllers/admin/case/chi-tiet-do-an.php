<?php
# [MODEL]
model('admin','project');

# [VARIABLE]

# [HANDLE]
// Lấy slug
if(isset($_arrayURL[1]) && $_arrayURL[1]) {
    $slug_project = clear_input($_arrayURL[1]);
    // Lấy thông tin đồ án
    $get_project = get_one_project_by_slug($slug_project);
    if($get_project) extract($get_project);
    else view_404('admin');
}
else view_404('admin');

// Trường hợp cập nhật
if(isset($_POST['update'])) {
    // lấy dữ liệu từ input
    $name_project = clear_input($_POST['name_project']);
    $description_project = clear_input($_POST['description_project']);
    $image = $_FILES['image'];
    $image_project = ($_POST['image_old']) ?? '';

    // Nếu có ảnh mới, thì sẽ lưu ảnh và lưu path vào biến $image_project
    if($image['tmp_name']) {
        // Xoá ảnh cũ nếu có
        if($image_project) move_file($image_project);
        $image_project = save_file(PATH_FILE_PROJECT,$image);
    }

    // Kiểm tra validate
    if(!$name_project) $error[] = 'Vui lòng nhập tên đề tài';
    if(!$description_project) $error[] = 'Vui lòng nhập mô tả dự án';
    // Kiểm tra tên đồ án
    if($name_project) if(pdo_query('SELECT name_project FROM project WHERE name_project ="'.$name_project.'" AND slug_project != "'.$slug_project.'"')) $error[] = 'Tên đề tài này đã được đăng kí';

    // Thông báo lỗi
    if($error) toast_create('danger',$error[0]);
    //tạo người dùng
    else {
        // chỉnh sửa thông tin
        pdo_execute(
        'UPDATE project SET name_project = "'.$name_project.'",image_project = "'.$image_project.'",slug_project = "'.create_slug($name_project).'",updated_at = current_timestamp() WHERE slug_project = "'.$slug_project.'"'
        );
        toast_create('success','Cập nhật thành công');
        route('quan-li-do-an');
    }
}

# [DATA]
$data = [
    'list_major' => pdo_query('SELECT * FROM major'),
    'name_project' => $name_project,
    'slug_project' => $slug_project,
    'document_project' => $document_project,
    'description_project' => $description_project,
    'image_old' => $image_project,
    'created_at' => $created_at,
    'updated_at' => $updated_at,
    'student_name' => $student_name,
    'student_email' => $student_email,
    'student_username' => $student_username,
    'student_avatar' => $student_avatar,
    'name_major' => $name_major,
    'teacher_avatar' => $teacher_avatar,
    'teacher_username' => $teacher_username,
    'teacher_name' => $teacher_name,
    'teacher_email' => $teacher_email,
];
# [RENDER]
view('admin','Chi tiết sinh viên','project-detail',$data);