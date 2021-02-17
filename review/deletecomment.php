<?php
   
require_once "controllerUserData.php"; 
require "connection.php";
   $query="DELETE FROM comments WHERE comment_id=".$_POST['comment_id'];
   
    $res=mysqli_query($con,$query);
    // header("Location:home.php?uploadSuccess");
    if($res==1){
       return "done";
    }
    else{
        return "failed";
    }

?>