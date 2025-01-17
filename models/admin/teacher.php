<?php

function get_list_teacher() {
    return pdo_query(
        'SELECT u.username username, u.full_name full_name, u.email email, u.address address, u.avatar avatar, u.phone phone, u.created_at created_at, m.name_major name_major, d.name_degree name_degree, p.name_position name_position 
        FROM teacher t
        JOIN user u
        ON u.username = t.username
        JOIN major m
        ON t.id_major = m.id_major
        JOIN degree d
        ON d.id_degree = t.id_degree
        JOIN position p
        ON p.id_position = t.id_position
        WHERE u.status = 1
        ORDER BY u.created_at DESC
    '
    );
}

function get_one_teacher($username) {
    return pdo_query_one(
        'SELECT u.username username, u.full_name full_name, u.email email, u.address address, u.avatar avatar, u.phone phone, u.created_at created_at, u.updated_at updated_at, m.name_major name_major, m.id_major id_major, d.name_degree name_degree, d.id_degree id_degree, p.name_position name_position, p.id_position id_position 
        FROM teacher t
        JOIN user u
        ON u.username = t.username
        JOIN major m
        ON t.id_major = m.id_major
        JOIN degree d
        ON d.id_degree = t.id_degree
        JOIN position p
        ON p.id_position = t.id_position
        WHERE u.status = 1
        AND u.username = "'.$username.'"
    '
    );
}