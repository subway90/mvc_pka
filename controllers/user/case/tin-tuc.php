<?php
# [MODEL]
model('user','blog');

# [HANDLE]
// có request slug
if(isset($_arrayURL[1]) &&$_arrayURL[1]) {
    // lấy slug
    $blog_category = $_arrayURL[1];
    // kiểm tra category có tồn tại hay không
    $get_blog = get_one_blog($blog_category);
    //chuyển 404 nếu không tìm thấy tin tức
    if(!$get_blog) view_404('user');
    // giải nén và + lượt xem
    else extract($get_blog);
    blog_view_count($id_blog);
}else view_404('user');




# [DATA
$data = [
    'list_blog_recommend' => blog_recommend($id_category,$id_blog),
    'name_category' => $name_category,
    'slug_category' => $slug_category,
    'name_blog' => $name_blog,
    'description' => $description,
    'short_description' => $short_description,
    'created_at' => $created_at,
    'full_name' => $full_name,
    'avatar' => $avatar,
];

# [RENDER]
view('user','Danh mục tin tức','detail-blog',$data);