<?php
session_start();
if (empty($_SESSION['id_user']) || empty($_SESSION['level'])) {
    if (basename($_SERVER['PHP_SELF'])!="index.php") {
        header("Location:index.php");
    }
}