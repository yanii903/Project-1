<?php
function load_all_comment()
{
    $sql = "SELECT a.*, b.tk_user, c.sp_name FROM comment a
            JOIN account b ON a.id_tk = b.tk_id   
            JOIN product c ON a.id_sp = c.sp_id
            ORDER BY a.bl_id ASC";
    $list_comment = pdo_query($sql);
    return $list_comment;
}
function delete_comment($bl_id)
{
    $sql = "DELETE FROM `comment` where bl_id = '$bl_id';";
    pdo_execute($sql);
} //xóa bình luận
