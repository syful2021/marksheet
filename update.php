
<?php

require 'db_con.php';

//User Status Active
if(isset($_GET['user_active'])){
    $id = $_GET['user_active'];
    
    mysqli_query($con, "UPDATE `marksheets` SET `status`='1' WHERE `id` = '$id'");
    $_SESSION['success'] = "Active Successfully";
    header('location: index.php');
    exit(0);
}

//User Status Deactive
if(isset($_GET['user_deactive'])){
    $id = $_GET['user_deactive'];
    
    mysqli_query($con, "UPDATE `marksheets` SET `status`='0' WHERE `id` = '$id'");
    $_SESSION['success'] = "Dective Successfully";
    header('location: index.php');
    exit(0);
}

//User Delete
if(isset($_GET['user_delete'])){
    $id = $_GET['user_delete'];
    
    mysqli_query($con, "DELETE FROM `marksheets` WHERE `id` = '$id'");
    $_SESSION['success'] = "Delete Successfully";
    header('location: index.php');
    exit(0);
}
?>