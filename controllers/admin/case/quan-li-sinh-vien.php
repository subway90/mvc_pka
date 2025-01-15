<?php

# [HANDLE]

// Lấy danh sách sinh viên
$list_student = pdo_query(
    'SELECT *
        FROM student s
        JOIN user u
        ON s.username = u.username
        JOIN major m
        ON s.id_major = m.id
        WHERE u.status = 1
'
);

# [DATA]
$data = [
   'list_student' => $list_student,
];

# [RENDER]
view('admin','Danh sách sinh viên','account',$data);