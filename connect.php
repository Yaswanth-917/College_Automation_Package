<?php
$HOSTNAME = '127.0.0.1';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'qiscet';
$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);
if (!$con) {
    die(mysqli_connect_error());
}
?>