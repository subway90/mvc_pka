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
view('admin','Danh sách đồ án','project',$data);