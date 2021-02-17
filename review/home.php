<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $user_id=$fetch_info['id'];
        $user_name=$fetch_info['name'];
        $_SESSION['id']=$user_id;
        $_SESSION['name']=$user_name;
    } else{
    header('Location: login-user.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $fetch_info['name'] ?> | Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: #6665ee;
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: #6665ee;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    .timeline-outer{
        width:70%;
        height:auto ;
       
        background:white;
        padding:30px;
    }
    .post-container{

        width:100%;



    }
    .post-content{
        width:100%;
        background:white;
        border:1px solid gray;
        min-height:40px;
        color:black;
        padding:20px 40px;


    }
    .post-buttons{
       position:relative;
    }
    .post-but{
        float:right;
        margin-left:30px;
    }
    .post-pic{
        display:block;
        margin-top:20px;
        width:400px;
        height:500px;
    }
    .timeline-content{
        overflow-wrap: break-word;
        width:80%;
        font-size:16px;
    }
    .posts{

        border:2px solid black;
        margin-top:100px;
    }
    .post{

        width:85%;
        margin:0px auto;
        background:whitesmoke;
        padding:50px;
        
    }
    .post-name{

        color:blue;
    }
    .comments{
        background:white;
    }
    .commentor{
        position:relative;
        font-size:15px;
    }
    .commentor h5{
    
        color:blue;
        font-weight:100;
        

    }
    .comment-cont{

        width:100%;

    }
    .del-icon{
        position:absolute;
        top:10px;
        right:10px;
        border:1px solid black;
        padding:5px;
        border-radius:20px;
        font-size:12px;

    }
    .del-icon:hover{
        background:red;
        color:white;
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">Project</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    <div class="container timeline-outer p-5" style="width:70%">
      <div class="post-container">
        <form action="uploadpost.php" method="POST" enctype="multipart/form-data" >
            <textarea class="post-content" name="post_data" placeholder="Write what's on your mind........"></textarea>
            <div class="post-images">
            
            </div>
            <div calss="post-buttons">
                <input type="file" name="post_image" id="input-image">
                <input type="submit"  class="btn btn-outline-primary post-but" name="upload_post" value="submit">
            </div>
        </form>
      </div>
      <!--posts section-->
      <div class="posts p-5">
        <?php
        $result = mysqli_query($con,"SELECT * FROM posts");
        while($row = mysqli_fetch_array($result))
        {
           $posts=mysqli_query($con,"SELECT user_id from posts where post_id=".$row['post_id']);
           $post_result=mysqli_fetch_array($posts);
           $img=$row['post_image'];
            echo  '
                    <div class="post mt-4" >
                        <h4 class="post-name">'.$row['post_person'].'</h4>
                        <div class="timeline-content">'.$row['post_data'].'</div>';
                      if($img!=""){
                        echo'<img class="post-pic" src="'.$row['post_image'].'">';}
                    
                      echo'  <div class="write-comment p-3 mt-4" style="background:white">
                            <textarea class="comment-cont" id="comment'.$row['post_id'].'" placeholder="Write your comment here"></textarea>
                            <button class="btn btn-primary" onclick="uploadcomment('.$row['post_id'].')">Post Commet</button>
                        </div>';
                        $comments_res = mysqli_query($con,"SELECT * FROM comments WHERE post_id=".$row['post_id']);
                        while($comment_row= mysqli_fetch_array($comments_res)){
                            echo '
                                <div class="comments mt-2 " id='.$comment_row['comment_id'].'>  
                                    <div class="commentor p-3">';

                                        if($comment_row['user_id']==$_SESSION['id'] || $_SESSION['user_id']== $post_result['user_id']){
                                            echo '  
                                        <div class="del-icon" onclick="deleteComment('.$comment_row['comment_id'].')">Delete</div>';
                                        }
                                        echo'
                                        <h5>'.$comment_row['comment_person'].'</h5>
                                        <p>'.$comment_row['comment_data'].'</p>
                                    </div>
                                </div>' ;
                        }
                        echo '

                    </div> ';
        }
        ?>
      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        function uploadcomment(post_id)
        {
            var comment_data=$('#comment'+post_id).val();
            var comment_person='<?php echo $_SESSION['name'] ?>';
            $.ajax({
                type: "POST",
                url: 'uploadcomment.php',
                data: {
                    post_id:post_id,
                    comment_person:comment_person,
                    comment_data:comment_data,   
                },
                success: function(response)
                {
                    alert("posted comment");
                    location.reload();
                }
           });
        }
        function deleteComment(comment_id)
        {
            alert("comment-id")
            $.ajax({
                type: "POST",
                url: 'deletecomment.php',
                data: {
                    comment_id:comment_id, 
                },
                success: function(response)
                {
                    alert("removed comment");
                    location.reload();
                }
           });
        }
    </script>
    
</body>
</html>