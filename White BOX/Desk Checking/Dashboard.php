<?php
session_start();
require_once '../includes/config.php';
require_once '../includes/functions.php';

if(!is_logged_in()) {
    redirect('login.php');
}

$username = $_SESSION['username'];
?>
