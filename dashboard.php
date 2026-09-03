<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>KaniVerse Dashboard</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{

background:
linear-gradient(
135deg,
#141e30,
#243b55
);

min-height:100vh;

color:white;
}

/* NAVBAR */

.navbar{

height:80px;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(15px);

display:flex;

justify-content:space-between;

align-items:center;

padding:0 50px;

box-shadow:0 4px 20px rgba(0,0,0,.2);
}

.logo{

font-size:32px;

font-weight:bold;

color:#ff4da6;
}

.user{

font-size:18px;
}

/* CONTAINER */

.container{

display:flex;

padding:30px;
}

/* SIDEBAR */

.sidebar{

width:260px;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(15px);

border-radius:20px;

padding:25px;

height:700px;
}

.sidebar a{

display:block;

padding:15px;

margin-bottom:15px;

background:rgba(255,255,255,0.1);

text-decoration:none;

color:white;

border-radius:12px;

transition:.3s;
}

.sidebar a:hover{

background:#ff4da6;
}

/* CONTENT */

.content{

flex:1;

margin-left:25px;
}

/* WELCOME CARD */

.welcome{

background:rgba(255,255,255,0.08);

padding:30px;

border-radius:20px;

backdrop-filter:blur(15px);
}

.welcome h1{

font-size:40px;
}

/* STATS */

.stats{

display:flex;

gap:20px;

margin-top:25px;
}

.card{

flex:1;

padding:25px;

border-radius:20px;

background:rgba(255,255,255,0.08);

backdrop-filter:blur(15px);

text-align:center;
}

.card h2{

font-size:40px;

color:#ff4da6;
}

.card p{

margin-top:10px;
}

/* RECENT BLOGS */

.blogs{

margin-top:30px;

background:rgba(255,255,255,0.08);

padding:25px;

border-radius:20px;

backdrop-filter:blur(15px);
}

.blog{

padding:20px;

background:rgba(255,255,255,0.07);

border-radius:12px;

margin-top:15px;
}

.blog h3{

margin-bottom:10px;
}

/* PROFILE CARD */

.profile{

margin-top:25px;

padding:25px;

background:rgba(255,255,255,0.08);

border-radius:20px;
}

.profile img{

width:80px;

height:80px;

border-radius:50%;
}

</style>

</head>

<body>

<div class="navbar">

<div class="logo">
KaniVerse
</div>

<div class="user">
Welcome, <?php echo $_SESSION['fullname']; ?>
</div>

</div>

<div class="container">

<div class="sidebar">

<a href="dashboard.php">
🏠 Dashboard
</a>

<a href="create_blog.php">
✍ Create Blog
</a>

<a href="view_blogs.php">
📚 View Blogs
</a>

<a href="profile.php">
👤 My Profile
</a>

<a href="logout.php">
🚪 Logout
</a>

</div>

<div class="content">

<div class="welcome">

<h1>
Welcome Back,
<?php echo $_SESSION['fullname']; ?>
</h1>

<p>
Manage your blogs, connect with readers and grow your audience.
</p>

</div>

<div class="stats">

<div class="card">
<h2>12</h2>
<p>Total Blogs</p>
</div>

<div class="card">
<h2>248</h2>
<p>Followers</p>
</div>

<div class="card">
<h2>590</h2>
<p>Likes</p>
</div>

<div class="card">
<h2>78</h2>
<p>Comments</p>
</div>

</div>

<div class="profile">

<h2>Author Profile</h2>

<br>

<img src="https://i.pravatar.cc/150?img=12">

<h3>
<?php echo $_SESSION['fullname']; ?>
</h3>

<p>Creative Blogger | Story Writer</p>

</div>

<div class="blogs">

<h2>Recent Blogs</h2>

<div class="blog">

<h3>The Silent Beauty of Early Mornings</h3>

<p>
Discover how quiet mornings inspire creativity and focus.
</p>

</div>

<div class="blog">

<h3>Why Every Story Matters</h3>

<p>
A journey into the power of storytelling in everyday life.
</p>

</div>

<div class="blog">

<h3>Traveling Beyond Maps</h3>

<p>
Exploring destinations through experiences rather than locations.
</p>

</div>

</div>

</div>

</div>

</body>
</html>