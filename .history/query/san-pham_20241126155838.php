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

function insert_product($sp_name, $sp_image, $sp_price, $sp_quantity, $sp_describe, $id_dm, $sp_pricedel)
{
    $sql = "INSERT INTO `product`(`sp_name`, `sp_image`, `sp_price`, `sp_quantity`, `sp_describe`, `id_dm`, `sp_pricedel`)
    VALUES
    ('$sp_name','$sp_image','$sp_price', '$sp_quantity','$sp_describe', '$id_dm');";
    pdo_execute($sql);
} //thêm mới sản phẩm

function delete_product($sp_id)
{
    $sql = "DELETE FROM `product` where sp_id = '$sp_id';";
    pdo_execute($sql);
} //xóa sản phẩm


function update_product($sp_id, $sp_name, $sp_image, $sp_price, $sp_quantity, $sp_describe, $id_dm)
{
    $sql = "UPDATE `product` SET  `sp_name` = '" . $sp_name . "', `sp_image` = '" . $sp_image . "', `sp_price` = '" . $sp_price . "', `sp_quantity` = '" . $sp_quantity . "',  `sp_describe` = '" . $sp_describe . "',  `id_dm` = '" . $id_dm . "'WHERE `sp_id` = '" . $sp_id . "'";
    pdo_execute($sql);
} //cập nhật sản phẩm


// Biến thể sản phẩm


function load_all_product_color()
{
    $sql = "select * from productcolor";
    $list_product_color = pdo_query($sql);
    return $list_product_color;
}
function load_one_product_color($pc_id)
{
    $sql = "select * from productcolor where pc_id=" . $pc_id;
    $one_product_color = pdo_query_one($sql);
    return $one_product_color;
}
function update_product_color($pc_id, $pc_name, $id_dm)
{
    $sql = "UPDATE `productcolor` 
            SET `pc_name` = '" . $pc_name . "', 
                `id_sp_c` = '" . $id_dm . "' 
            WHERE `pc_id` = '" . $pc_id . "'";
    pdo_execute($sql);
}
function insert_product_color($pc_name, $id_dm)
{
    $sql = "INSERT INTO `productcolor`(`pc_name`, `id_sp_c`)
            VALUES ('$pc_name', '$id_dm');";
    pdo_execute($sql);
}
function delete_product_color($pc_id)
{
    $sql = "DELETE FROM `productcolor` where pc_id = '$pc_id';";
    pdo_execute($sql);
}
function load_all_product_memory()
{
    $sql = "select * from productmemory";
    $list_product_memory = pdo_query($sql);
    return $list_product_memory;
}
function load_one_product_memory($pm_id)
{
    $sql = "select * from productmemory where pm_id=" . $pm_id;
    $one_product_memory = pdo_query_one($sql);
    return $one_product_memory;
}

function insert_product_memory($pm_name, $id_dm)
{
    $sql = "INSERT INTO `productmemory`(`pm_name`, `id_sp_m`)
            VALUES ('$pm_name', '$id_dm');";
    pdo_execute($sql);
}
function update_product_memory($pm_id, $pm_name, $id_dm)
{
    $sql = "UPDATE `productmemory` 
            SET `pm_name` = '$pm_name', 
                `id_sp_m` = '$id_dm' 
            WHERE `pm_id` = '$pm_id';";
    pdo_execute($sql);
}

function delete_product_memory($pm_id)
{
    $sql = "DELETE FROM `productmemory` where pm_id = '$pm_id';";
    pdo_execute($sql);
} //xóa sản phẩm