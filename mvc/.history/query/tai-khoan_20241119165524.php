<?php

function load_all_account()
{
    // Sửa lại truy vấn để JOIN bảng account với bảng role
    $sql = "SELECT a.*, r.role_name FROM account a
            JOIN role r ON a.id_role = r.role_id";
    $list_account = pdo_query($sql);
    return $list_account;
}
function load_all_role()
{
    $sql = "select * from role";
    $list_role = pdo_query($sql);
    return $list_role;
} //trả về danh sách role
function load_one_account($tk_id)
{
    $sql = "select * from account where tk_id ='" . $tk_id . "';";
    $one_account = pdo_query_one($sql);
    return $one_account;
} //trả về 1 trường tài khoản khi tìm kiếm

function insert_account($tk_user, $tk_password, $tk_email, $tk_address, $id_role)
{
    $sql = "INSERT INTO `account`(`tk_user`, `tk_password`, `tk_email`, `tk_address`, `id_role`) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $tk_user, $tk_password, $tk_email, $tk_address, $id_role);

    // Lấy ID của tài khoản vừa chèn
    return pdo_last_insert_id();
}

function update_account($tk_id, $tk_user, $tk_password, $tk_email, $tk_address, $id_role)
{
    $sql = "UPDATE `account` SET  `tk_user` = '" . $tk_user . "', `tk_password` = '" . $tk_password
        . "', `tk_email` = '" . $tk_email . "', `tk_address` = '" . $tk_address . "', `id_role` = '" . $id_role . "'WHERE `tk_id` = '" . $tk_id . "'";
    pdo_execute($sql);
} //cập nhật tài khoản

function delete_account($tk_id)
{
    $sql = "delete from account where tk_id ='" . $tk_id . "';";
    pdo_execute($sql);
} //xóa tài khoản
function check_duplicate_account($tk_user)
{
    $sql = "SELECT COUNT(*) AS count FROM account WHERE tk_user = ?";
    $result = pdo_query_one($sql, $tk_user); // Truyền tham số trực tiếp, không phải là một mảng
    return $result['count'] > 0;
}
