<?php

/**
 * Hàm này để lấy danh sách tin tức theo ID Category và Trạng thái
 * @param mixed $id_category ID Danh mục
 * @param mixed $status Trạng thái
 * @return array
 */
function list_blog($id_category,$status) {
    return
    pdo_query('SELECT * 
    FROM blog b
    JOIN user u
    ON b.username = u.username
    WHERE b.id_category = '.$id_category.'
    AND b.status_blog = '.$status.'
    ORDER BY b.created_at DESC');
}

/**
 * Trả về ID của category blog đó
 */
function get_category($slug) {
    return pdo_query_one('SELECT * FROM category_blog WHERE slug_category = "'.$slug.'" AND status_category');
}