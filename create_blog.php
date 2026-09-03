<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$msg="";

if(isset($_POST['publish']))
{
    $title=$_POST['title'];
    $category=$_POST['category'];
    $content=$_POST['content'];

    $user_id=$_SESSION['user_id'];

    $image=$_FILES['image']['name'];

    $temp=$_FILES['image']['tmp_name'];

    move_uploaded_file(
        $temp,
        "uploads/".$image
    );

    mysqli_query(
        $conn,
        "INSERT INTO blogs
        (user_id,title,category,content,image)
        VALUES
        ('$user_id',
        '$title',
        '$category',
        '$content',
        '$image')"
    );

    $msg="Blog Published Successfully!";
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Create Blog</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI';
}

body{

background:
linear-gradient(
135deg,
#141e30,
#243b55
);

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

.container{

width:900px;

margin:40px auto;

background:white;

padding:40px;

border-radius:20px;
}

h1{

margin-bottom:25px;

color:#243b55;
}

input,
textarea,
select{

width:100%;

padding:15px;

margin-bottom:20px;

border:1px solid #ccc;

border-radius:10px;
}

button{

background:#ff4da6;

color:white;

border:none;

padding:15px 40px;

border-radius:10px;

cursor:pointer;

font-size:18px;
}

.success{

color:green;

font-weight:bold;

margin-bottom:20px;
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

<a href="profile.php">Profile</a>

<a href="logout.php">Logout</a>

</div>

</div>

<div class="container">

<h1>Create New Blog</h1>

<div class="success">
<?php echo $msg; ?>
</div>

<form
method="POST"
enctype="multipart/form-data">

<input
type="text"
name="title"
placeholder="Blog Title"
required>

<select name="category">

<option>
Technology
</option>

<option>
Travel
</option>

<option>
Lifestyle
</option>

<option>
Education
</option>

<option>
Photography
</option>

</select>

<input
type="file"
name="image"
required>

<textarea
name="content"
rows="12"
placeholder="Write your blog here..."
required>
</textarea>

<button
name="publish">
Publish Blog
</button>

</form>

</div>

</body>
</html>