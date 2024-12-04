<?php

function load_all_category()
{
    $sql = "select * from category ";
    $list_category = pdo_query($sql);
    return $list_category;
} //trả về danh sách danh mục

function load_one_category($dm_id)
{
    $sql = "select * from category where dm_id ='" . $dm_id . "';";
    $one_category = pdo_query_one($sql);
    return $one_category;
} //trả về 1 cột danh mục khi tìm kiếm

function insert_category($dm_name)
{
    $sql = "insert into category(dm_name) value('$dm_name')";
    pdo_execute($sql);
} //thêm mới danh mục

function update_category($dm_id, $dm_name)
{
    $sql = "update category set dm_name = '" . $dm_name . "' where dm_id ='" . $dm_id . "';";
    pdo_execute($sql);
} //cập nhật danh mục

function delete_category($dm_id)
{
    $sql = "delete from category where dm_id ='" . $dm_id . "';";
    pdo_execute($sql);
} //xóa danh mục
