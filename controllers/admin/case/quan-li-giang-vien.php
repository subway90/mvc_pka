<?php
# [MODEL]
model('admin','teacher');
model('admin','user');

# [VARIABLE]
$status_page = 1; //trạng thái tranng (0: danh sách xoá, 1: danh sách hoạt động)

# [HANDLE]
// trường hợp xoá theo ID
if(isset($_arrayURL[1]) && $_arrayURL[1] == 'xoa') {
   // kiểm tra có truyền username không
   if(isset($_arrayURL[2]) && $_arrayURL[2]) {
       // lấy username
       $username = $_arrayURL[2];
       // kiểm tra username có tồn tại không
       if(check_user_exist_by_status($username,1)) {
           update_status_user($username,0);
           toast_create('success','Xoá thành công giảng viên với ID = '.$username);
       }else toast_create('danger','Sinh viên ID = '.$username.' không tồn tại');
       // làm mới trang
       header('Location:'.URL_ADMIN.'quan-li-giang-vien');
       exit;
   }else view_404('admin');
}

// trường hợp khôi phục theo ID
if(isset($_arrayURL[1]) && $_arrayURL[1] == 'khoi-phuc') {
   // kiểm tra có truyền username không
   if(isset($_arrayURL[2]) && $_arrayURL[2]) {
       // lấy username
       $username = $_arrayURL[2];
       // kiểm tra username có tồn tại không
       if(check_user_exist_by_status($username,0)) {
           update_status_user($username,1);
           toast_create('success','Khôi phục thành công giảng viên với ID = '.$username);
       }else toast_create('danger','Sinh viên ID = '.$username.' không tồn tại');
       // làm mới trang
       header('Location:'.URL_ADMIN.'quan-li-giang-vien/danh-sach-xoa');
       exit;
   }else view_404('admin');
}

// trường hợp xem danh sách xoá : trạng thái trang = 0
if(isset($_arrayURL[1])) if($_arrayURL[1] == 'danh-sach-xoa') $status_page = 0;

# [DATA]
$data = [
   'status_page' => $status_page,
   'list_teacher' => get_list_teacher($status_page),
];

# [RENDER]
view('admin','Danh sách giảng viên','teacher',$data);