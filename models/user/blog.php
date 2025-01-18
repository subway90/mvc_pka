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
    JOIN user u
    ON u.username = b.username
    WHERE b.slug_blog ="'.$slug.'"');
}

function blog_recommend($id_category,$id_blog) {
    return  pdo_query('SELECT * FROM blog b JOIN user u ON b.username = u.username WHERE b.id_category = '.$id_category.' AND b.id_blog != '.$id_blog );
}