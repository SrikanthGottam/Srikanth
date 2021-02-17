<?php
   
require_once "controllerUserData.php"; 
require "connection.php";
   $query="INSERT INTO comments (user_id, post_id, comment_data,comment_person) VALUES ('".$_SESSION['id']."','".$_POST['post_id']."','".$_POST['comment_data']."','".$_POST['comment_person']."')";
   
    $res=mysqli_query($con,$query);
    // header("Location:home.php?uploadSuccess");
    if($res==1){
       return "done";
    }
    else{
        return "failed";
    }

?>