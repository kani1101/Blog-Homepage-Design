<?php

session_start();

include 'db.php';

$view = "grid";

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}

$result = mysqli_query(
$conn,
"SELECT * FROM blogs ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>View Blogs - KaniVerse</title>

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

/* TITLE */

.title{

text-align:center;

margin-top:30px;

font-size:40px;

color:#243b55;
}

/* VIEW BUTTONS */

.view-buttons{

text-align:center;

margin:30px;
}

.view-buttons a{

background:#243b55;

color:white;

padding:12px 25px;

text-decoration:none;

border-radius:10px;

margin:10px;

font-weight:bold;
}

.view-buttons a:hover{

background:#ff4da6;
}

/* GRID */

.grid-layout{

width:90%;

margin:auto;

display:grid;

grid-template-columns:repeat(auto-fit,minmax(350px,1fr));

gap:25px;

padding-bottom:50px;
}

.blog-card{

background:white;

padding:20px;

border-radius:20px;

box-shadow:0px 5px 15px rgba(0,0,0,0.2);
}

.blog-image{

width:100%;

height:250px;

object-fit:cover;

border-radius:15px;

margin-bottom:15px;
}

.blog-card h2{

color:#243b55;

margin-bottom:10px;
}

.blog-card p{

line-height:1.8;

color:#555;
}

/* LANDSCAPE */

.landscape-layout{

width:90%;

margin:auto;

display:flex;

flex-direction:column;

gap:25px;

padding-bottom:50px;
}

.landscape-card{

display:flex;

background:white;

border-radius:20px;

overflow:hidden;

box-shadow:0px 5px 15px rgba(0,0,0,0.2);
}

.landscape-card img{

width:350px;

height:250px;

object-fit:cover;
}

.landscape-content{

padding:20px;

flex:1;
}

.landscape-content h2{

color:#243b55;

margin-bottom:10px;
}

.landscape-content p{

line-height:1.8;

color:#555;
}

/* BUTTON */

.readmore{

display:inline-block;

margin-top:15px;

background:#ff4da6;

color:white;

padding:10px 20px;

text-decoration:none;

border-radius:10px;
}

.readmore:hover{

background:#243b55;
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

<a href="create_blog.php">✍️ Create Blog</a>

<a href="profile.php">👤 Profile</a>

<a href="logout.php">🚪 Logout</a>

</div>

</div>

<h1 class="title">
📖 View Blogs
</h1>

<div class="view-buttons">

<a href="view_blogs.php?view=grid">
🔲 Grid View
</a>

<a href="view_blogs.php?view=landscape">
🖼️ Landscape View
</a>

</div>

<?php

if($view=="grid")
{
?>

<div class="grid-layout">

<?php

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="blog-card">

<?php
if(!empty($row['image']))
{
?>

<img
src="uploads/<?php echo $row['image']; ?>"
class="blog-image">

<?php
}
?>

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
<?php echo substr($row['content'],0,180); ?>
...
</p>

<a
class="readmore"
href="blog_details.php?id=<?php echo $row['id']; ?>">

Read More

</a>

</div>

<?php
}
?>

</div>

<?php
}
else
{
?>

<div class="landscape-layout">

<?php

mysqli_data_seek($result,0);

while($row=mysqli_fetch_assoc($result))
{
?>

<div class="landscape-card">

<?php
if(!empty($row['image']))
{
?>

<img
src="uploads/<?php echo $row['image']; ?>">

<?php
}
?>

<div class="landscape-content">

<h2>
<?php echo $row['title']; ?>
</h2>

<p>
<?php echo substr($row['content'],0,300); ?>
...
</p>

<a
class="readmore"
href="blog_details.php?id=<?php echo $row['id']; ?>">

Read More

</a>

</div>

</div>

<?php
}
?>

</div>

<?php
}
?>

</body>

</html>