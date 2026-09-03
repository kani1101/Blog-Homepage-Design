<?php

session_start();

include 'db.php';

if(!isset($_GET['id']))
{
    header("Location: view_blogs.php");
    exit();
}

$blog_id = $_GET['id'];

$result = mysqli_query(
$conn,
"SELECT * FROM blogs WHERE id='$blog_id'"
);

$blog = mysqli_fetch_assoc($result);

if(!$blog)
{
    echo "Blog Not Found";
    exit();
}

/* ADD COMMENT */

if(isset($_POST['post_comment']))
{

    $user_name = isset($_SESSION['fullname'])
    ? $_SESSION['fullname']
    : "Guest";

    $comment = mysqli_real_escape_string(
    $conn,
    $_POST['comment']
    );

    mysqli_query(
    $conn,

    "INSERT INTO comments
    (blog_id,user_name,comment_text)

    VALUES

    (
    '$blog_id',
    '$user_name',
    '$comment'
    )"
    );

    header(
    "Location: blog_details.php?id=".$blog_id
    );

    exit();
}

?>

<!DOCTYPE html>

<html>

<head>

<title>

<?php echo $blog['title']; ?>

</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Segoe UI,sans-serif;
}

body{

background:#f4f6f9;

}

/* HEADER */

.header{

background:#243b55;

padding:20px 40px;

display:flex;

justify-content:space-between;

align-items:center;

}

.logo{

font-size:30px;

font-weight:bold;

color:#ff4da6;

}

.header a{

color:white;

text-decoration:none;

margin-left:20px;

}

/* BLOG SECTION */

.container{

width:90%;

max-width:1200px;

margin:40px auto;

}

.blog-card{

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0px 5px 20px rgba(0,0,0,0.15);

}

.blog-image{

width:100%;

height:500px;

object-fit:cover;

}

.blog-content{

padding:35px;

}

.category{

display:inline-block;

background:#ff4da6;

color:white;

padding:8px 18px;

border-radius:20px;

margin-bottom:15px;

}

.blog-title{

font-size:40px;

color:#243b55;

margin-bottom:20px;

}

.blog-text{

font-size:18px;

line-height:2;

color:#444;

}

/* BUTTONS */

.action-buttons{

margin-top:25px;

}

.edit-btn{

display:inline-block;

background:#243b55;

color:white;

padding:12px 25px;

text-decoration:none;

border-radius:10px;

margin-right:10px;

}

.edit-btn:hover{

background:#ff4da6;

}

/* COMMENTS */

.comment-section{

background:white;

margin-top:30px;

padding:30px;

border-radius:20px;

box-shadow:0px 5px 20px rgba(0,0,0,0.15);

}

.comment-section h2{

margin-bottom:20px;

color:#243b55;

}

textarea{

width:100%;

height:120px;

padding:15px;

border:1px solid #ccc;

border-radius:10px;

resize:none;

}

.comment-btn{

margin-top:15px;

background:#ff4da6;

color:white;

border:none;

padding:12px 25px;

border-radius:10px;

cursor:pointer;

}

.comment{

background:#f8f8f8;

padding:15px;

border-radius:10px;

margin-top:15px;

}

.comment-user{

font-weight:bold;

color:#243b55;

}

.comment-date{

font-size:12px;

color:gray;

margin-top:5px;

}

</style>

</head>

<body>

<div class="header">

<div class="logo">

KaniVerse

</div>

<div>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="view_blogs.php">📖 View Blogs</a>

<a href="profile.php">👤 Profile</a>

<a href="logout.php">🚪 Logout</a>

</div>

</div>

<div class="container">

<div class="blog-card">

<?php
if(!empty($blog['image']))
{
?>

<img
src="uploads/<?php echo $blog['image']; ?>"
class="blog-image">

<?php
}
?>

<div class="blog-content">

<div class="category">

<?php echo $blog['category']; ?>

</div>

<h1 class="blog-title">

<?php echo $blog['title']; ?>

</h1>

<div class="blog-text">

<?php echo nl2br($blog['content']); ?>

</div>

<div class="action-buttons">

<a
href="edit_blog.php?id=<?php echo $blog['id']; ?>"
class="edit-btn">

✏️ Edit Blog

</a>

</div>

</div>

</div>

<div class="comment-section">

<h2>

💬 Comments

</h2>

<form method="POST">

<textarea
name="comment"
placeholder="Write your comment..."
required></textarea>

<br>

<button
type="submit"
name="post_comment"
class="comment-btn">

Post Comment

</button>

</form>

<?php

$comments = mysqli_query(
$conn,

"SELECT * FROM comments
WHERE blog_id='$blog_id'
ORDER BY id DESC"
);

while($row=mysqli_fetch_assoc($comments))
{
?>

<div class="comment">

<div class="comment-user">

<?php echo $row['user_name']; ?>

</div>

<p>

<?php echo $row['comment_text']; ?>

</p>

<div class="comment-date">

<?php echo $row['created_at']; ?>

</div>

</div>

<?php
}
?>

</div>

</div>

</body>

</html>