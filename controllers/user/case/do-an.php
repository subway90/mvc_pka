<?php
# [AUTHOR]
if(!author('student')) view_404('user');


# [MODEL]
model('user','project');
model('admin','teacher');
model('admin','student');

# [VARIABLE]
$status_project = false; //trạng thái đăng kí dự án
$id_teacher = $name_project = $description_project = '';
$error = []; //khai báo mảng lỗi
# [HANDER]
$username = $_SESSION['user']['username'];
// kiểm tra xem đã đăng kí đồ án chưa
$get_project = get_one_project_by_username($username);
if(!$get_project) $status_project = true; // trạng thái đăng kí true
else extract($get_project); // giải nén data project

// lấy thông tin student
extract(get_one_student($username));

# [HANDLE]
// trường hợp nhất submit đăng kí
if(isset($_POST['create'])) {
    $name_project = $_POST['name_project'];
    $description_project = $_POST['description_project'];
    $id_teacher = $_POST['id_teacher'];

    if(!$name_project) $error[] = 'Vui lòng nhập tên đề tài';
    if(!$description_project) $error[] = 'Vui lòng nhập mô tả đề tài';
    if(!$id_teacher) $error = 'Vui lòng chọn giảng viên hỗ trợ';

    // kiểm tra tên đề tài đã tồn tại chưa
    if(check_project_exist_by_name($name_project)) $error[] = 'Tên đề tài dự án này đã tồn tại';

    //thông báo lỗi
    if($error) toast_create('danger',$error[0]);
    // tiến hành tạo project
    else {
        $stmt = pdo_get_connection()->prepare('INSERT INTO project (id_teacher, id_student, name_project, slug_project, description_project) VALUES (?, ?, ?, ?, ?)');
        // Thực hiện lệnh với các tham số
        $stmt->execute([
            $id_teacher,
            $id_student,
            $name_project,
            create_slug($name_project),
            $description_project,
        ]);
        toast_create('success','Đăng kí thành công, vui lòng chờ duyệt !');
        header('Location:'.URL.'do-an');
    }
}

# [DATA]
$data = [
    'status_project' => $status_project,
    'name_project' => $name_project,
    'description_project' => $description_project,
    'list_teacher' => get_list_teacher(1),
];

# [RENDER]
view('user','Danh sách đồ án','project',$data);