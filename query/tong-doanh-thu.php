<?php
function thang_1()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 1
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_2()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 2
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_3()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 3
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_4()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 4
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_5()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 5
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_6()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 6
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_7()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 7
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_8()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 8
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_9()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 9
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_10()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 10
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_11()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 11
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}

// --------------------------------------------------------

function thang_12()
{
    $sql = "SELECT 
    SUM(dh_totalamount) AS tong_doanh_thu
FROM 
    `order`
WHERE 
    YEAR(dh_orderdate) = 2024 AND MONTH(dh_orderdate) = 12
GROUP BY 
    YEAR(dh_orderdate), MONTH(dh_orderdate);
";
    return pdo_query($sql);
}
