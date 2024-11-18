<?php

function load_all_product()
{
    $sql = "select * from product";
    $list_product = pdo_query($sql);
    return $list_product;
} //trả về danh sách sản phẩm

function load_one_product($sp_id)
{
    $sql = "select * from product where sp_id=" . $sp_id;
    $one_product = pdo_query_one($sql);
    return $one_product;
} //trả về 1 sản phẩm khi tìm kiếm

function insert_product($sp_name, $sp_image, $sp_price, $sp_title, $sp_quantity, $sp_describe, $dm_id)
{
    $sql = "INSERT INTO `product`(`sp_name`, `sp_image`, `sp_price`, `sp_title`, `sp_quantity`, `sp_describe`, `dm_id`)
    VALUES
    ('$sp_name','$sp_image','$sp_price','$sp_title', '$sp_quantity','$sp_describe', '$dm_id');";
    pdo_execute($sql);
} //thêm mới sản phẩm

function delete_product($sp_id)
{
    $sql = "DELETE FROM `product` where sp_id = '$sp_id';";
    pdo_execute($sql);
} //xóa sản phẩm

function update_product($sp_name, $sp_image, $sp_price, $sp_title, $sp_quantity, $sp_describe, $dm_id)
{
    if ($sp_image != "") {
    } else {
    }
} //cập nhật sản phẩm
