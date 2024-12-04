<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
