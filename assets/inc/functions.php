<?php //
session_start();
//   db conection 
 $conn = mysqli_connect("localhost", "root", "", "flipkart_db") or die("db could not connected"); 
// build the query
// excute the query
function getSetting(){
    global $conn;
    $sql = "SELECT * FROM settings_tbl";
    $result =  mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_assoc($result);
    // var_dump($row);
    return  $row['value'];
}
function baseUrl($url){
  return "http://localhost/flipkart/admin/".$url;
}
function fillterString($action){
    global $conn;
    return mysqli_real_escape_string($conn, $action);
}
?>