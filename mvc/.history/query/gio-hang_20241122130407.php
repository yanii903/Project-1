<?php
function load_all_cart()
{
    $sql = "select * from cart";
    $list_cart = pdo_query($sql);
    return $list_cart;
} //trả về danh sách sản phẩm
function insert_cart($id_tk)
{
    $sql = "INSERT INTO `cart`(`id_tk`) VALUES ('$id_tk')";
    pdo_execute($sql);
}
function addOneCart($id)
{
    $sql = "UPDATE cart SET gh_quantity = gh_quantity + 1 WHERE id = $id;";
}
function delete_cartdetail($cd_id)
{
    $sql = "DELETE FROM `cartdetail` where cd_id = '$cd_id';";
    pdo_execute($sql);
} //xóa sản phẩm
function insert_cartDetail($id_gh, $id_sp)
{
    $sql = "INSERT INTO `cartdetail`(`id_gh`,`id_sp`) VALUES ('$id_gh','$id_sp')";
    pdo_execute($sql);
}
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
