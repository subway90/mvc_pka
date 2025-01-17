<?php
# [MODEL]
model('admin','teacher');

# [HANDLE]

// lấy danh sách chuyên ngành
$list_major = pdo_query('SELECT * FROM major');

# [DATA]
$data = [
   'list_teacher' => get_list_teacher(),
];

# [RENDER]
view('admin','Danh sách giảng viên','teacher',$data);