<?php
function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
    }
}

// Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
//sql
//sql,...,id
//"insert into loai(ten_loai) values(?)"."laptop"
//"update loai set ten_loai=? where ma_loai=?", "Laptop" , "1"
//"delete from loai where ma_loai=?", "1"

function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function pdo_get_last_insert_id()
{
    $conn = pdo_get_connection();
    return $conn->lastInsertId(); // Trả về ID của bản ghi mới chèn vào
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}


/**
 * Thực thi câu lệnh sql truy vấn 1 giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql 
 * @return giá trị 
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($rows)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
