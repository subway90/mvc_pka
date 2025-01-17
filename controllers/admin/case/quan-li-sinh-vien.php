<?php
# [MODEL]
model('admin','student');

# [HANDLE]

// lấy danh sách chuyên ngành
$list_major = pdo_query('SELECT * FROM major');

// Lấy danh sách sinh viên

# [DATA]
$data = [
   'list_student' => get_list_student(),
];

# [RENDER]
view('admin','Danh sách sinh viên','student',$data);