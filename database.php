<?php

$dh_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "businessone";
$conn = "";

try{
    $conn = mysqli_connect($dh_server,$db_user,$db_pass,$db_name);

}
catch(mysqli_sql_exception){
    echo "no";

}

?>