<?php
# [MODEL]
model('user','blog');

# [HANDLE]
// có request slug
if(isset($_arrayURL[1]) &&$_arrayURL[1]) {
    // lấy slug
    $slug_category = $_arrayURL[1];
    // kiểm tra category có tồn tại hay không
    $get_category = get_category($slug_category);
    if(!$get_category) view_404('user');
}else view_404('user');




# [DATA
$data = [
    'list_blog' => list_blog($get_category['id_category'],1),
    'name_category' => $get_category['name_category'],
    'slug_category' => $get_category['slug_category'],
];

# [RENDER]
view('user','Danh mục tin tức','category-blog',$data);