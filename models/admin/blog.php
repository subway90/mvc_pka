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

function list_blog($id_category) {
    return 
    pdo_query('SELECT * 
    FROM blog b
    JOIN user u
    ON b.id_user = u.id
    WHERE id_category = '.$id_category.'
    AND b.status = 1 
    ORDER BY b.created_at DESC');
}