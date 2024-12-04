<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function insert_cart()
{
    INSERT INTO `cart`(`gh_id`, `gh_totalamount`, `gh_quantity`, `id_tk`, `id_sp`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]')
    pdo_execute($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
