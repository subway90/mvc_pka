<?php

function get_list_student($status) {
    return pdo_query(
        'SELECT u.username username, u.full_name full_name, u.email email, u.address address, u.avatar avatar, u.phone phone, u.created_at created_at, m.name_major name_major
        FROM student s
        JOIN user u
        ON s.username = u.username
        JOIN major m
        ON s.id_major = m.id_major
        WHERE u.status = '.$status.'
        ORDER BY u.created_at DESC
    '
    );
}

function get_one_student($username) {
    return pdo_query_one(
        'SELECT *
        FROM student s
        JOIN user u
        ON s.username = u.username
        JOIN major m
        ON s.id_major = m.id_major
        WHERE u.status = 1
        AND u.username = "'.$username.'"
    '
    );
}