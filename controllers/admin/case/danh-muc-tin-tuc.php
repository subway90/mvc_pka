<?php

# [HANDLE]
$slug_category = $_arrayURL[1];
// lấy thông tin blog
$category_blog = pdo_query_one('SELECT * FROM category_blog WHERE slug_category = "'.$slug_category.'"');
if(!$category_blog) view_404('admin');

# [DATA]
$data = [
    'slug_category' => $slug_category,
    'name_category' => $category_blog['name_category'],
    'list_blog' => pdo_query('SELECT * FROM blog WHERE id_category = '.$category_blog['id'].' ORDER BY created_at DESC')
];

# [RENDER]
view('admin','Danh sách tin tức','blog',$data);