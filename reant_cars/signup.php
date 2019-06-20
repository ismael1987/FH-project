<?php
session_start();
include_once('data.php');

$sql = "INSERT INTO `user`(`Role`, `DriverLicense`, `Age`, `Firstname`, `Lastname`, `Username`, `Pwd`)
VALUES (1,'".time()."','22','" . $_GET['fullname'] . "','Lastname','" . $_GET['username'] . "','" . $_GET['password'] . "')";
echo $sql;
if ($conn->query($sql)) {
    echo 'true';
} else {
    echo 'false';
}
?>