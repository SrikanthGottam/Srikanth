<?php

require_once "controllerUserData.php"; 
require "connection.php";

if(isset($_POST['upload_post'])){
    $post_data=$_POST['post_data'];
    //echo $post_data;
    //echo $_SESSION['user_id'];
    //echo $_SESSION['user_name'];
    //get the post content
    $file=$_FILES['post_image'];
    $fileName=$_FILES['post_image']['name'];
    $fileTmpName=$_FILES['post_image']['tmp_name'];
    $fileSize=$_FILES['post_image']['size'];
    $fileType=$_FILES['post_image']['type'];
    $fileError=$_FILES['post_image']['error'];
    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));
    $allowed=array("jpg","jpeg","png","");

    if(in_array($fileActualExt,$allowed)){

        if( $fileError === 0){

                //this is where we are going to store the images 
                $fileNewName=uniqid("",true).".".$fileActualExt;
                $fileDestination= 'uploads/'.$fileNewName;
                move_uploaded_file($fileTmpName,$fileDestination);
                $query="INSERT INTO posts ( user_id, post_data, post_image,post_person) VALUES ('".$_SESSION['id']."','".$post_data."','".$fileDestination."','".$_SESSION['name']."')";

                $res=mysqli_query($con,$query);
               //header("Location:home.php?uploadSuccess");
               if($res==1){
                   //echo "<script>alert('succefully uploaded the post');</script>";
                   header("Location:home.php?uploadSuccess");
               }
               else{
                $query1="INSERT INTO posts ( user_id, post_data, post_image,post_person) VALUES ('".$_SESSION['id']."','".$post_data."','','".$_SESSION['name']."')";

                $res1=mysqli_query($con,$query1);
               }
            
    


        }else{
 $query1="INSERT INTO posts ( user_id, post_data, post_image,post_person) VALUES ('".$_SESSION['id']."','".$post_data."','','".$_SESSION['name']."')";

                $res1=mysqli_query($con,$query1);
                header('location:home.php');
        }


    }else{
         
        echo "This type of file extensions are not allowed";

    }

}
location:"home.php";
?>
<!--<script>
    window.location.href = "home.php";
    
</script>-->
