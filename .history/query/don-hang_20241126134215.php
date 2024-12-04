<?php
function load_all_order()
{
    $sql = "SELECT * FROM `order`;";
    $list_order = pdo_query($sql);
    return $list_order;
} //trả về danh sách đơn hàng

function load_one_order($dh_id)
{
    $sql = "SELECT * FROM `order` WHERE dh_id = $dh_id;";
    $one_order = pdo_query_one($sql);
    return $one_order;
} //trả về 1 đơn hàng khi tìm kiếm

function insert_order($namePay, $emailPay, $phonePay, $addressPay, $countryPay, $cityPay, $districtPay, $communePay, $messagePay, $dh_status, $dh_totalamount, $id_tk, $sp_quantity)
{
    $sql = "INSERT INTO `order`(`dh_id`, `dh_nameUser`, `dh_emailUser`, `dh_phoneUser`, `dh_addressUser`, `dh_countryPay`, `dh_cityPay`, `dh_districtPay`, `dh_communePay`, `dh_messagePay`, `dh_orderdate`, `dh_status`, `dh_totalamount`, `id_tk`, `sp_quantity`) 
    VALUES (null, '$namePay', '$emailPay', '$phonePay', '$addressPay', '$countryPay', '$cityPay', '$districtPay', '$communePay', '$messagePay', CURRENT_TIMESTAMP, '$dh_status', '$dh_totalamount', '$id_tk', '$sp_quantity')";

    pdo_execute($sql);
}
//thêm mới đơn hàng

function delete_order($dh_id)
{
    $sql = "DELETE FROM `order` WHERE dh_id = $dh_id;";
    pdo_execute($sql); // Thực thi câu lệnh SQL
}
//xóa đơn hàng


function update_order($dh_id, $dh_status)
{
    $sql = "UPDATE `order` SET `dh_status`='$dh_status' WHERE dh_id = $dh_id;";

    pdo_execute($sql);
}
  //cập nhật đơn hàng
