<?php 
include('koneksi.php');//mengkoneksikan database 
 
$id = $_GET['rating']; //mengambil id yang di parsing dari halaman list.php 
 
$delete = mysqli_query ($connect, "DELETE FROM playdex WHERE id='$id'");
 
if($delete) {
    header('Location : simpelajh.html');  
} else {
    echo 'Delete data gagal'; 
}