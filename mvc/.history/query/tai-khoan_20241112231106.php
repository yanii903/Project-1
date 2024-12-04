<?php

function load_all_account()
{
    $sql = "select * from account order by tk_id desc";
    $list_account = pdo_query($sql);
    return $list_account;
} //trả về danh sách tài khoản

function load_one_account($tk_id)
{
    $sql = "select * from account where tk_id ='" . $tk_id . "';";
    $one_account = pdo_query_one($sql);
    return $one_account;
} //trả về 1 trường tài khoản khi tìm kiếm

function insert_account($tk_user, $tk_password, $tk_email, $tk_address, $role_id)
{
    $sql = "insert into account value('$tk_user', '$tk_password', '$tk_email', '$tk_address', '$role_id')";
    pdo_execute($sql);
} //thêm mới tài khoản

function update_account($tk_id, $tk_user, $tk_password, $tk_email, $tk_address, $role_id) {} //cập nhật tài khoản

function delete_account($tk_id)
{
    $sql = "delete from account where tk_id ='" . $tk_id . "';";
    pdo_execute($sql);
} //xóa tài khoản
