<?php

# [MODEL]
model('admin','student');

# [VARIABLE]
$username = $password = $password_confirm = $full_name = $image_old = '';
$status = $major = 1;
$error = []; // nội dung mảng lỗi

# [HANDLE]

// Lấy thông tin sinh viên
if(isset($_arrayURL[1]) && $_arrayURL[1]) {
    $username = clear_input($_arrayURL[1]);
    extract(get_one_student($username));
}
if(isset($_POST['update'])) {
    // lấy dữ liệu từ input
    $username = clear_input($_POST['username']);
    $full_name = clear_input($_POST['full_name']);
    $major = clear_input($_POST['major']);
    $email = clear_input($_POST['email']);
    $phone = clear_input($_POST['phone']);
    $address = clear_input($_POST['address']);
    $image = $_FILES['image'];
    $image_old = ($_POST['image_old']) ?? '';

    // Nếu có ảnh mới, thì sẽ lưu ảnh và lưu path vào biến $image_old
    if($image['tmp_name']) {
        // Xoá ảnh cũ nếu có
        if($image_old) move_file($image_old);
        $image_old = save_file(PATH_FILE_AVATAR,$image);
    }

    // Kiểm tra validate
    if(!$full_name) $error[] = 'Vui lòng nhập họ và tên';
    if(!$email) $error[] = 'Vui lòng nhập email';
    // Kiểm tra email
    if($email) if(pdo_query('SELECT id_user FROM user WHERE email ="'.$email.'" AND username != "'.$username.'"')) $error[] = 'Email này đã được đăng kí';

    // Thông báo lỗi
    if($error) toast_create('danger',$error[0]);
    //tạo người dùng
    else {
        // chỉnh sửa thông tin user
        pdo_execute(
        'UPDATE user SET full_name = "'.$full_name.'",email = "'.$email.'",address = "'.$address.'",phone = "'.$phone.'",avatar = "'.$image_old.'",updated_at = current_timestamp() WHERE username = "'.$username.'"'
        );
        // chỉnh sửa thông tin major
        pdo_execute(
            'UPDATE student SET id_major = '.$major.' WHERE username = "'.$username.'"'
        );
        toast_create('success','Cập nhật thành công');
    }
}

# [DATA]
$data = [
    'list_major' => pdo_query('SELECT * FROM major'),
    'username' => $username,
    'full_name' => $full_name,
    'phone' => $phone,
    'email' => $email,
    'address' => $address,
    'id_major' => $id_major,
    'name_major' => $name_major,
    'created_at' => $created_at,
    'updated_at' => $updated_at,
    'image_old' => $avatar,
];
# [RENDER]
view('admin','Chi tiết sinh viên','student-detail',$data);