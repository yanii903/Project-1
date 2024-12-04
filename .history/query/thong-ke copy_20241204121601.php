<?php
// -----------------------------------------------------------------------
function count_product()
{
    $sql = "SELECT COUNT(*) FROM product;";
    return pdo_query($sql);
}

function count_iphone()
{
    $sql = "SELECT COUNT(*) FROM product where id_dm = 1;";
    return pdo_query($sql);
}

function count_samsung()
{
    $sql = "SELECT COUNT(*) FROM product where id_dm = 2;";
    return pdo_query($sql);
}

function count_oppo()
{
    $sql = "SELECT COUNT(*) FROM product where id_dm = 21;";
    return pdo_query($sql);
}
// -----------------------------------------------------------------------
function count_category()
{
    $sql = "SELECT COUNT(*) FROM category;";
    return pdo_query($sql);
}

function count_account()
{
    $sql = "SELECT COUNT(*) FROM account;";
    return pdo_query($sql);
}

function count_order()
{
    $sql = "SELECT COUNT(*) FROM `order`;";
    return pdo_query($sql);
}

function count_profit()
{
    $sql = "SELECT SUM(dh_totalamount) AS tong_gia FROM `order`;";
    return pdo_query($sql);
}
