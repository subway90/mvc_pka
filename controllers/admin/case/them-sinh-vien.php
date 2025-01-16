<?php
# [MODEL]
model('admin','student');

# [VARIBLE]
$username = $password = $password_confirm = $full_name = $image_old = '';
$status = $major = 1;
$error = []; // nội dung mảng lỗi

# [HANDLE]
// lấy danh sách chuyên ngành
$list_major = pdo_query('SELECT * FROM major');
// lấy dữ liệu từ input
$full_name = clear_input($_POST['full_name']);
$major = clear_input($_POST['major']);
$status = clear_input($_POST['status']);
$username = clear_input($_POST['username']); 
$password = clear_input($_POST['password']);
$password_confirm = clear_input($_POST['password_confirm']);
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
if(!$username) $error[] = 'Vui lòng nhập username';
elseif(!$password) $error[] = 'Vui lòng nhập mật khẩu';
elseif(!$password_confirm) $error[] = 'Vui lòng nhập mật khẩu xác thực';

// Kiểm tra độ dài của username
if(strlen($username) < 3) $error[] = 'Độ dài của username phải lớn từ 4 kí tự trở lên';
// Kiểm tra username hợp lệ hay không
if(!preg_match('/^[a-z0-9]+$/', $username)) $error[] = 'Username chỉ chứa các kí tự [a-z][0-9]';
// Kiểm tra username đã đăng kí chưa
if(check_one_exist('user','username',$username)) $error[] = 'Username này đã tồn tại';
// Kiểm tra độ dài của password
if(strlen($password) < 7) $error[] = 'Độ dài của mật khẩu phải từ 8 kí tự trở lên';
// Kiểm tra mật khẩu xác thực
if($password !== $password_confirm) $error[] = 'Mật khẩu xác thực không trùng khớp';

// Thông báo lỗi
if($error) toast_create('danger',$error[0]);
//tạo người dùng
else {
    // tạo user
    pdo_execute(
    'INSERT INTO user (username,password,full_name,avatar) VALUES ("'.$username.'","'.md5($password).'","'.$full_name.'","'.$image_old.'")'
    );
    // tạo student
    pdo_execute(
        'INSERT INTO student (username,id_major) VALUES ("'.$username.'",'.$major.')'
    );
    toast_create('success','Đăng kí thành công');
}

    $data = [
        'list_major' => $list_major,
        'username' => $username,
        'password' => $password,
        'password_confirm' => $password_confirm,
        'full_name' => $full_name,
        'status' => $status,
        'major' => $major,
        'image_old' => $image_old,
    ];

    view('admin','Thêm sinh viên','student-add',$data);