<?php
# [MODEL]
model('admin','student');

# [VARIABLE]
$status_page = 1; //trạng thái tranng (0: danh sách xoá, 1: danh sách hoạt động)

# [HANDLE]

// trường hợp xem danh sách xoá : trạng thái trang = 0
if(isset($_arrayURL[1])) if($_arrayURL[1] == 'danh-sach-xoa') $status_page = 0;

// lấy danh sách chuyên ngành
$list_major = pdo_query('SELECT * FROM major');

// Lấy danh sách sinh viên

# [DATA]
$data = [
    'status_page' => $status_page,
    'list_student' => get_list_student($status_page),
];

# [RENDER]
view('admin','Danh sách sinh viên','student',$data);