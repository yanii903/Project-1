<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function insert_cart()
{
    $sql = "insert into cart(dm_name) value('$dm_name')";
    pdo_execute($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
