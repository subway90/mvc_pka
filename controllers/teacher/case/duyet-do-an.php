<?php

# [MODEL]
model('admin','project');
model('admin','user');

# [VARIABLE]

# [HANDER]

# [DATA]
$data = [
    'list_project' => get_all_project(),
];

# [RENDER]
view('teacher','Danh sách đồ án','project',$data);