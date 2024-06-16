<?php
 function sesionStart () {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../views/login.php');
    }
 }