<?php
session_start();
include_once('data.php');

$sql = "SELECT * FROM `user` where `Pwd`='" . $_GET['password'] . "' and `User_name`='" . $_GET['email'] . "'";

$result = $conn->query($sql);
if (mysqli_num_rows($result)!=0){
    $row = mysqli_fetch_array($result);
    $_SESSION['username'] = $row['User_name'];
    $_SESSION['user_id'] =  $row['User_id'];
    echo 'true';
}else{
    echo 'false';

}
?>