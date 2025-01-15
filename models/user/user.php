<?php

/**
 * Hàm này kiểm tra username có theo yêu cầu kí tự từ a-z, A-Z, 0-9
 * @param string $input
 * @return bool
 */
function check_valid_username($input) {
    return preg_match('/^[a-zA-Z0-9]+$/', $input) === 1;
}

function create_user($full_name,$email,$username,$password) {
    try{
        pdo_execute(
            'INSERT INTO user (full_name,email,username,password) VALUES ("'.$full_name.'","'.$email.'","'.$username.'","'.md5($password).'")'
        );
    }catch(PDOException $e) {
        return _s_me_error.$e->getMessage()._e_me_error;
    }

    return 1;

}