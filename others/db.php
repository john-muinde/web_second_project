<?php
$_DB_HOST = "localhost";
$_DB_USER = "root";
$_DB_PASS = "";
$_DB_NAME = "groupa";

$_DB = mysqli_connect($_DB_HOST, $_DB_USER, $_DB_PASS, $_DB_NAME);

if($_DB->connect_error) {
    die("Connection failed: " . $_DB->connect_error);
}
