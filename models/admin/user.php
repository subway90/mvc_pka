<?php

/**
 * Lấy thông tin của user đó bằng username
 * @param string $username Username cần lấy thông tin
 * @return array
 */
function info_by_username($username) {
    return pdo_query_one(
        'SELECT * 
        FROM user
        WHERE username ="'.$username.'"
        AND status_user = 1'
    );
}

/**
 * Kiểm tra xem user này có tồn tại ở trạng thái quy định không
 * @param mixed $username username cần kiểm tra
 * @param mixed $status trạng thái cần kiểm tra
 * @return mixed trả về ID đó hoặc null
 */
function check_user_exist_by_status($username,$status) {
    return pdo_query_one(
        'SELECT id_user
        FROM user
        WHERE username ="'.$username.'"
        AND status = '.$status
    );
}

/**
 * Thay đổi trạng thái user bằng username và status
 * @param mixed $username username cần cập nhật
 * @param mixed $status trạng thái cần cập nhật
 */
function update_status_user($username,$status) {
    pdo_execute(
        'UPDATE user
        SET status = '.$status.'
        WHERE username ="'.$username.'"'
    );
}