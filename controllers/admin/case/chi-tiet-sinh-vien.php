<?php

# [MODEL]
model('admin','student');


# [HANDLE]

// Lấy thông tin sinh viên
if(isset($_arrayURL[1]) && $_arrayURL[1]) {
    $username = clear_input($_arrayURL[1]);

}

# [DATA]
$data = [
    'student' => get_one_student($username),
    'list_major' => pdo_query('SELECT * FROM major'),
];

# [RENDER]
view('admin','Chi tiết sinh viên','student-detail',$data);