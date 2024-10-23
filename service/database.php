<?php 
$hostname = "localhost"; 
$username = "root"; 
$password = "";
$database = "tugasweb3";

$db = mysqli_connect($hostname, $username, $password, $database); 
if($db->connect_error)
{
    echo "Koneksi ke database gagal"; 
    die("error");
}
?>