<?php
include "../php/db.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    if (isset($_SESSION['auth'])) {
        if (intval($_SESSION['role']) === 1) { // If user is admin
            $find_calcualtion = mysqli_query($conn, "SELECT * FROM `building` WHERE id=$id"); // Check if exists
            if (mysqli_num_rows($find_calcualtion) > 0) {
                mysqli_query($conn, "DELETE FROM `building` WHERE id=$id"); // If yes than delete
                if (isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?m=Deleted Successfully!'); 
                }
            }
        }
    }
}
if (isset($_SERVER['HTTP_REFERER'])) { // Get prevoius location
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
