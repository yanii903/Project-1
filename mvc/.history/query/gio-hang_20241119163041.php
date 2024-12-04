<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function insert_cart($tk_id)
{
    $sql = "INSERT INTO cart (gh_totalamount, gh_quantity, id_tk) VALUES (0, 0, ?)";
    pdo_execute($sql, $tk_id); // Thêm giỏ hàng cho tài khoản
} //trả về danh sách sản phẩm
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
