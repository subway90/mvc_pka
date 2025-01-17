<?php
# [MODEL]
model('admin','student');

# [VARIBLE]
$username = $password = $password_confirm = $full_name = $email = $image_old = '';
$major = $degree = $position = 1;
$error = []; // nội dung mảng lỗi

# [HANDLE]
if(isset($_POST['create'])) {
    // lấy dữ liệu từ input
    $full_name = clear_input($_POST['full_name']);
    $email = clear_input($_POST['email']);
    $major = clear_input($_POST['major']);
    $degree = clear_input($_POST['degree']);
    $position = clear_input($_POST['position']);
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
    if(!$username) $error[] = 'Vui lòng nhập username';
    if(!$full_name) $error[] = 'Vui lòng nhập họ và tên';
    if(!$email) $error[] = 'Vui lòng nhập email';
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
        // tạo teacher
        pdo_execute(
            'INSERT INTO teacher (username,id_major,id_degree,id_position) VALUES ("'.$username.'",'.$major.','.$degree.','.$position.')'
        );
        toast_create('success','Tạo mới giảng viên thành công');
    }
}

# [DATA]
$data = [
    'list_major' => pdo_query('SELECT * FROM major'),
    'list_degree' => pdo_query('SELECT * FROM degree'),
    'list_position' => pdo_query('SELECT * FROM position'),
    'email' => $email,
    'username' => $username,
    'full_name' => $full_name,
    'password' => $password,
    'password_confirm' => $password_confirm,
    'image_old' => $image_old,
    'major' => $major,
    'degree' => $degree,
    'position' => $position,
];

# [RENDER]
view('admin','Thêm giảng viên viên','teacher-add',$data);