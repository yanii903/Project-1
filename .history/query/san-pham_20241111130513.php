<?php
function load_all_product()
{
    $sql = "select * from product order by dm_id desc";
    $list_product = pdo_query($sql);
    return $list_product;
}

function load_one_product($sp_id)
{
    $sql = "select * from product where sp_id=" . $sp_id;
    $one_product = pdo_query_one($sql);
    return $one_product;
}

function insert_product($sp_name, $sp_image, $sp_price, $sp_title, $sp_quantity, $sp_describe, $dm_id)
{
    $sql = "INSERT INTO `product`(`sp_name`, `sp_image`, `sp_price`, `sp_title`, `sp_quantity`, `sp_describe`, `dm_id`)
    VALUES
    ('$sp_name','$sp_image','$sp_price','$sp_title', '$sp_quantity','$sp_describe', '$dm_id');";
    pdo_execute($sql);
}

function delete_product($sp_id)
{
    $sql = "DELETE FROM `product` where sp_id = '$sp_id';";
    pdo_execute($sql);
}

function update_product($sp_id, $sp_name, $sp_image, $sp_price, $sp_title, $sp_quantity, $sp_describe, $dm_id)
{
    if ($sp_image != "") {
        $sql = "UPDATE `product` SET `sp_name`='$sp_name',
        `sp_image`='$sp_image',`sp_price`='$sp_price',`sp_title`='$sp_title',`sp_quantity`='$sp_quantity',`sp_describe`='$sp_describe',
        `dm_id`='$dm_id' WHERE sp_id = '$sp_id';";
    } else {
        $sql = "UPDATE `product` SET `sp_name`='$sp_name',
        `sp_price`='$sp_price',`sp_title`='$sp_title',`sp_quantity`='$sp_quantity',`sp_describe`='$sp_describe',
        `dm_id`='$dm_id' WHERE sp_id = '$sp_id';";
    }
    pdo_execute($sql);
}
