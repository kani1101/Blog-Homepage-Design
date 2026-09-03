<?php
include 'db.php';
?>

<!DOCTYPE html>

<html>

<head>

<title>KaniVerse</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f5f7fa;
}

.header{
background:#111827;
padding:20px;
color:white;
display:flex;
justify-content:space-between;
}

.logo{
font-size:32px;
font-weight:bold;
color:#ff4da6;
}

.menu a{
color:white;
text-decoration:none;
margin-left:20px;
}

.hero{
height:400px;
background:linear-gradient(rgba(0,0,0,.5),
rgba(0,0,0,.5)),
url('https://images.unsplash.com/photo-1499750310107-5fef28a66643');

background-size:cover;

color:white;

text-align:center;

padding-top:120px;
}

.hero h1{
font-size:60px;
}

.hero p{
font-size:22px;
}

.container{
width:90%;
margin:auto;
}

.cards{
display:flex;
flex-wrap:wrap;
gap:20px;
margin-top:40px;
}

.card{
width:300px;
background:white;
border-radius:15px;
overflow:hidden;
box-shadow:0 5px 20px rgba(0,0,0,.2);
}

.card img{
width:100%;
height:200px;
}

.card h3{
padding:15px;
}

.card p{
padding:15px;
}

.card a{
display:block;
background:#ff4da6;
color:white;
text-decoration:none;
padding:12px;
text-align:center;
}

</style>

</head>

<body>

<div class="header">

<div class="logo">
KaniVerse
</div>

<div class="menu">

<a href="index.php">Home</a>

<a href="register.php">Register</a>

<a href="login.php">Login</a>

</div>

</div>

<div class="hero">

<h1>
Welcome to KaniVerse
</h1>

<p>
Share Stories • Discover Ideas
</p>

</div>

<div class="container">

<h2>Latest Blogs</h2>

<div class="cards">

<?php

$result=
mysqli_query(
$conn,
"SELECT * FROM blogs"
);

while(
$row=
mysqli_fetch_assoc($result)
)
{
?>

<div class="card">

<img src="https://picsum.photos/400/300">

<h3>
<?php echo $row['title']; ?>
</h3>

<p>
<?php echo substr($row['content'],0,100); ?>
</p>

<a href="view_blog.php?id=<?php echo $row['id']; ?>">
Read More
</a>

</div>

<?php
}
?>

</div>

</div>

</body>
</html>