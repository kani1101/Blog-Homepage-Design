<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = mysqli_query($conn,"
SELECT comments.*, blogs.title
FROM comments
JOIN blogs ON comments.blog_id = blogs.id
WHERE blogs.user_id = '$user_id'
ORDER BY comments.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Comments</title>

<style>

body{
font-family:Segoe UI;
background:linear-gradient(135deg,#141e30,#243b55);
margin:0;
}

.header{
background:#111;
color:white;
padding:20px;
font-size:28px;
}

.container{
width:90%;
margin:auto;
padding:30px;
}

.comment-box{
background:white;
padding:20px;
margin-bottom:20px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.2);
}

.blog-title{
color:#ff4da6;
font-size:22px;
font-weight:bold;
}

.user{
font-weight:bold;
margin-top:10px;
}

.date{
color:gray;
font-size:13px;
}

</style>

</head>

<body>

<div class="header">
Comments On My Blogs
</div>

<div class="container">

<?php

while($row=mysqli_fetch_assoc($query))
{
?>

<div class="comment-box">

<div class="blog-title">
<?php echo $row['title']; ?>
</div>

<div class="user">
<?php echo $row['user_name']; ?>
</div>

<p>
<?php echo $row['comment_text']; ?>
</p>

<div class="date">
<?php echo $row['created_at']; ?>
</div>

</div>

<?php
}
?>

</div>

</body>
</html>