<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function insert_cart($tk_id)
{
    $sql = "INSERT INTO `cart`(`id_tk`) VALUES ('$tk_id')";
    return pdo_execute(
        $sql,
        $tk_id
    );
}
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
