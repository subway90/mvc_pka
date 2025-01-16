<?php
/**
 * Hàm này để kiểm tra tiêu đề bài viết cần tạo đã tồn tại chưa
 * @param mixed $title
 * @param mixed $slug_category
 */
function check_name_blog_exist($name_blog,$slug_category) {
    return pdo_query_one(
        'SELECT b.id
        FROM blog b
        JOIN category_blog c
        ON b.id_category = c.id
        WHERE c.slug_category ="'.$slug_category.'"
        AND b.name_blog ="'.$name_blog.'"'
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
    AND status = '.$status.'
    ORDER BY created_at DESC');
}