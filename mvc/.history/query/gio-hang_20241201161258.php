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
function addOneCartdetail($id)
{
    $sql = "UPDATE `cartdetail` SET cd_quantity = cd_quantity + 1 WHERE cd_id = $id";
    pdo_execute($sql);
}
function lossOneCartdetail($id)
{
    $sql = "UPDATE `cartdetail` SET cd_quantity = cd_quantity - 1 WHERE cd_id = $id";
    pdo_execute($sql);
}
function delete_cartdetail($cd_id)
{
    $sql = "DELETE FROM `cartdetail` where cd_id = '$cd_id';";
    pdo_execute($sql);
} //xóa sản phẩm
function insert_cartDetail($id_gh, $id_sp, $cd_option, $cd_optionColor)
{
    $sql = "INSERT INTO `cartdetail`(`id_gh`,`id_sp`,`cd_option`,`cd_optionColor`) VALUES ('$id_gh','$id_sp',`$cd_option`, `$cd_optionColor` )";
    pdo_execute($sql);
}
function load_all_cartDetail()
{
    $sql = "select * from cartdetail";
    $list_cartDetail = pdo_query($sql);
    return $list_cartDetail;
} //trả về danh sách sản phẩm
