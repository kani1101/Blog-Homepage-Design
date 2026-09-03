<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$id=$_SESSION['user_id'];

$result=mysqli_query(
$conn,
"SELECT * FROM users
WHERE id='$id'"
);

$user=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Profile</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#141e30,#243b55);
min-height:100vh;
}

.navbar{
height:80px;
background:rgba(255,255,255,.08);
display:flex;
justify-content:space-between;
align-items:center;
padding:0 50px;
backdrop-filter:blur(10px);
}

.logo{
font-size:30px;
font-weight:bold;
color:#ff4da6;
}

.navbar a{
color:white;
text-decoration:none;
margin-left:20px;
}

.profile-box{

width:700px;

margin:60px auto;

background:white;

border-radius:20px;

padding:40px;

text-align:center;

box-shadow:0 10px 30px rgba(0,0,0,.3);
}

.profile-box img{

width:150px;

height:150px;

border-radius:50%;

margin-bottom:20px;
}

.profile-box h1{

color:#243b55;

margin-bottom:10px;
}

.info{

margin-top:25px;

font-size:18px;

line-height:2;
}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">
KaniVerse
</div>

<div>
<a href="dashboard.php">Dashboard</a>
<a href="view_blogs.php">Blogs</a>
<a href="followers.php">Followers</a>
<a href="logout.php">Logout</a>
</div>

</div>

<div class="profile-box">

<img src="https://i.pravatar.cc/200?u=<?php echo $user['email']; ?>">

<h1>
<?php echo $user['fullname']; ?>
</h1>

<div class="info">

<p>
<b>User ID :</b>
<?php echo $user['id']; ?>
</p>

<p>
<b>Email :</b>
<?php echo $user['email']; ?>
</p>

<p>
<b>Status :</b>
Active Blogger
</p>

<p>
<b>Website :</b>
KaniVerse Blogging Platform
</p>

</div>

</div>

</body>

</html>