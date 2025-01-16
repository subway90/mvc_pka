<?php
# [MODEL]
model('admin','blog');

# [VARIABLE]
$status_page = 1; //trạng thái tranng (0: danh sách xoá, 1: danh sách hoạt động)

# [HANDLE]
// lấy slug
$slug_category = $_arrayURL[1];
// lấy thông tin blog
$category_blog = pdo_query_one('SELECT * FROM category_blog WHERE slug_category = "'.$slug_category.'"');
if(!$category_blog) view_404('admin');

// trường hợp xem danh sách xoá : trạng thái trang = 0
if(isset($_arrayURL[2])) ($_arrayURL[2] == 'danh-sach-xoa') ? $status_page = 0 : view_404('admin');

# [DATA]
$data = [
    'status_page' => $status_page,
    'slug_category' => $slug_category,
    'name_category' => $category_blog['name_category'],
    'list_blog' => list_blog($category_blog['id'],$status_page),
];

# [RENDER]
view('admin','Danh sách tin tức','blog',$data);