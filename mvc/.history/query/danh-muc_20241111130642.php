<?php
function load_all_category()
{
    $sql = "select * from category order by dm_id desc";
    $list_category = pdo_query($sql);
    return $list_category;
}

function load_one_category($dm_id)
{
    $sql = "select * from category where dm_id ='" . $dm_id . "';";
    $one_category = pdo_query_one($sql);
    return $one_category;
}

function insert_category($dm_name)
{
    $sql = "insert into category(dm_name) value('$dm_name')";
    pdo_execute($sql);
}

function update_category($dm_id, $dm_name)
{
    $sql = "update category set dm_name = '" . $dm_name . "' where dm_id ='" . $dm_id . "';";
    pdo_execute($sql);
}

function delete_category($dm_id)
{
    $sql = "delete from category where dm_id ='" . $dm_id . "';";
    pdo_execute($sql);
}
