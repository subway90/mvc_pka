<?php
# [MODEL]
model('admin','blog');

# [VARIABLE]
$status_page = 1; //trạng thái tranng (0: danh sách xoá, 1: danh sách hoạt động)

# [HANDLE]
// lấy slug
$slug_category = $_arrayURL[1];
// lấy thông tin danh mục blog
$category_blog = pdo_query_one('SELECT * FROM category_blog WHERE slug_category = "'.$slug_category.'"');
if(!$category_blog) view_404('admin');

// trường hợp xoá theo ID
if(isset($_arrayURL[2]) && $_arrayURL[2] == 'xoa') {
    // kiểm tra có truyền ID xoá không
    if(isset($_arrayURL[3]) && $_arrayURL[3]) {
        // lấy ID
        $id_blog = $_arrayURL[3];
        // kiểm tra ID có phải là số không
        if(is_numeric($id_blog)) {
            // kiểm tra ID có tồn tại không
            if(check_one_exist_by_status('blog',1,'id_blog',$id_blog)) {
                pdo_execute('UPDATE blog SET status = 0 WHERE id_blog ='.$id_blog);
                toast_create('success','Xoá thành công tin tức ID = '.$id_blog);
            }else toast_create('danger','Bài viết ID = '.$id_blog.' không tồn tại');
            // làm mới trang
            header('Location:'.URL_ADMIN.'danh-muc-tin-tuc/'.$slug_category);
            exit;
        }
    }
    // Chuyễn 404 các trường hợp lỗi
    view_404('admin');
}

// trường hợp khôi phục theo ID
if(isset($_arrayURL[2]) && $_arrayURL[2] == 'khoi-phuc') {
    // kiểm tra có truyền ID xoá không
    if(isset($_arrayURL[3]) && $_arrayURL[3]) {
        // lấy ID
        $id_blog = $_arrayURL[3];
        // kiểm tra ID có phải là số không
        if(is_numeric($id_blog)) {
            // kiểm tra ID có tồn tại không
            if(check_one_exist_by_status('blog',0,'id_blog',$id_blog)) {
                pdo_execute('UPDATE blog SET status = 1 WHERE id_blog ='.$id_blog);
                toast_create('success','Khôi phục thành công tin tức ID = '.$id_blog);
            }else toast_create('danger','Bài viết ID = '.$id_blog.' không tồn tại');
            // làm mới trang
            header('Location:'.URL_ADMIN.'danh-muc-tin-tuc/'.$slug_category.'/danh-sach-xoa');
            exit;
        }
    }
    // Chuyễn 404 các trường hợp lỗi
    view_404('admin');
}

// trường hợp xem danh sách xoá : trạng thái trang = 0
if(isset($_arrayURL[2])) if($_arrayURL[2] == 'danh-sach-xoa') $status_page = 0;

# [DATA]
$data = [
    'status_page' => $status_page,
    'slug_category' => $slug_category,
    'name_category' => $category_blog['name_category'],
    'list_blog' => list_blog($category_blog['id_category'],$status_page),
];

# [RENDER]
view('admin','Danh sách tin tức','blog',$data);