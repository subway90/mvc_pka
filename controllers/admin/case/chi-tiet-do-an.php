<?php

# [MODEL]
model('admin','project');

# [VARIABLE]

# [HANDLE]

// Lấy thông tin đồ án
if(isset($_arrayURL[1]) && $_arrayURL[1]) {
    $slug_project = clear_input($_arrayURL[1]);
    extract(get_one_project_by_slug($slug_project));
}

# [DATA]
$data = [
    'list_major' => pdo_query('SELECT * FROM major'),
    'name_project' => $name_project,
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