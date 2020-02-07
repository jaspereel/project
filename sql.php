<?php
session_start();
// $db = new PDO("mysql:host=127.0.0.1;dbname=s1080406;charset=utf8","s1080406","s1080406");
$db = new PDO("mysql:host=127.0.0.1;dbname=project;charset=utf8","root","");
date_default_timezone_set("Asia/Taipei");

//select SQL
function select($tablename, $where)
{
    global $db;
    $sql = "SELECT * FROM " . $tablename . " where " . $where;
    // print_r($sql);
    return $db->query($sql)->fetchAll();
}

//insert SQL
function insert($ary, $tablename)
{
    global $db;
    $feild = "id";
    $data = "null";
    foreach ($ary as $key => $value) {
        $feild .= "," . $key;
        $data .= ",'" . $value . "'";
    }
    $sql = "INSERT INTO " . $tablename . " (" . $feild . ") VALUES (" . $data . ")";
    // print_r($sql);
    $db->query($sql);
    return $db->lastInsertId();
}

//update SQL
function update($tablename,$value,$key)
{
    global $db;
    $sql = "UPDATE " . $tablename . " SET " . $value ." WHERE id=" . $key;
    $db->query($sql);
    // echo $sql;
}

//delete SQL
function delete($tablename, $value)
{
    global $db;
    $sql = "DELETE FROM " . $tablename . " WHERE id=" . $value;
    $db->query($sql);
      
}
//php轉址
function plo($link)
{
    return header("location:" . $link);
}

//JS轉址
function jlo($link)
{
    return "location.href='" . $link . "'";
}

//file upload
function addfile_room($file)
{
    $newname = time() . "_" . $file['name'];
    copy($file['tmp_name'], "images/room/" . $newname);
    return $newname;
}

function addfile_news($file)
{
    $newname = time() . "_" . $file['name'];
    copy($file['tmp_name'], "images/news/" . $newname);
    return $newname;
}

//分頁導覽PageNav 提共資料表名稱 條件 一頁要幾個 目前在哪頁
function navpage($tablename, $where, $range, $nowpage)
{
    $result = select($tablename, $where);

    $total = count($result);

    $many = ceil($total / $range);

    $pg['<'] = ($nowpage == 1) ? 1 : $nowpage - 1;
    for ($i = 1; $i <= $many; $i++) $pg[$i] = $i;
    $pg['>'] = ($nowpage == $many) ? $many : $nowpage + 1;
    return $pg;
}



?>