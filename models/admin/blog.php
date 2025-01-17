<?php
/**
 * Hàm này để kiểm tra tiêu đề bài viết cần tạo đã tồn tại chưa
 * 
 * Trả về ID Bài viết hoặc NULL
 * @param mixed $title
 * @param mixed $slug_category
 */
function check_name_blog_exist($name_blog,$slug_category) {
    return pdo_query_one(
        'SELECT b.id_category
        FROM blog b
        JOIN category_blog c
        ON b.id_category = c.id_category
        WHERE c.slug_category ="'.$slug_category.'"
        AND b.name_blog ="'.$name_blog.'"'
    );
}


/**
 * Hàm này kiểm tra một field nào đó có value tồn tại hay không
 * @param $id ID Blog cần kiểm tra
 * @return string Trạng thái của blog (0: ẩn, 1: hoạt động)
 */
function check_status_blog($id) {
    return pdo_query_one(
        'SELECT status_blog FROM blog WHERE id_blog ='.$id
    );
}

/**
 * Hàm này để lấy danh sách tin tức theo ID Category và Trạng thái
 * @param mixed $id_category ID Danh mục
 * @param mixed $status Trạng thái
 * @return array
 */
function list_blog($id_category,$status) {
    return 
    pdo_query('SELECT * 
    FROM blog
    WHERE id_category = '.$id_category.'
    AND status_blog = '.$status.'
    ORDER BY created_at DESC');
}

/**
 * Hàm này để lấy chi tiết bài viết theo slug
 * @param $slug Đường dẫn bài viết
 * @return array
 */
function get_one_blog($slug) {
    return
    pdo_query_one('SELECT *
    FROM blog b
    JOIN category_blog c
    ON b.id_category = c.id_category
    WHERE b.slug_blog ="'.$slug.'"');
}