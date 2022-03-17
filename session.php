<?php
    session_start();

    if(!isset($_SESSION['user_id']) || !isset($_SESSION['role'])){
        header('location: index.php');
    }

    if($_SESSION['role'] != 1){
        header('location: index.php');
    }