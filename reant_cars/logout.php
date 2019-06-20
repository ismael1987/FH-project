<?php
session_start();

if(session_destroy()) {
    header("Location: login-4.html");
}
?>