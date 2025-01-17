<?php

/**
 * Lấy danh sách dự án
 * @return array
 */
function get_all_project() {
    return pdo_query(
        'SELECT p.name_project name_project,p.slug_project slug_project, p.image_project image_project ,p.description_project description_project ,p.status_project status_project, p.created_at created_at , p.updated_at updated_at ,s.username student_username, u1.avatar student_avatar, u1.email student_email, t.username teacher_username, u1.full_name student_name, u2.full_name teacher_name,u2.avatar teacher_avatar,u2.email teacher_email , m.name_major name_major
        FROM project p
        JOIN student s
        ON  s.id_student = p.id_student
        JOIN teacher t
        ON t.id_teacher = p.id_teacher
        JOIN user u1
        ON u1.username = s.username
        JOIN user u2
        ON u2.username = t.username
        JOIN major m
        ON m.id_major = s.id_major
        WHERE p.status_project'
    );
}

function get_one_project_by_slug($slug) {
    return pdo_query(
        'SELECT p.name_project name_project,p.image_project image_project ,p.description_project description_project ,p.status_project status_project, p.created_at created_at , p.updated_at updated_at ,s.username student_username, u1.avatar student_avatar, u1.email student_email, t.username teacher_username, u1.full_name student_name, u2.full_name teacher_name,u2.avatar teacher_avatar,u2.email teacher_email , m.name_major name_major
        FROM project p
        JOIN student s
        ON  s.id_student = p.id_student
        JOIN teacher t
        ON t.id_teacher = p.id_teacher
        JOIN user u1
        ON u1.username = s.username
        JOIN user u2
        ON u2.username = t.username
        JOIN major m
        ON m.id_major = s.id_major
        WHERE p.status_project
        AND slug_project = "'.$slug.'"'
    );
}