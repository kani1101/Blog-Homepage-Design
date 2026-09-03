<?php

session_start();

include 'db.php';

$id=$_GET['id'];

$result=mysqli_query(
$conn,
"SELECT * FROM blogs WHERE id='$id'"
);

$blog=mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

$title=$_POST['title'];

$category=$_POST['category'];

$content=$_POST['content'];

mysqli_query(
$conn,

"UPDATE blogs SET

title='$title',

category='$category',

content='$content'

WHERE id='$id'"

);

header(
"Location: blog_details.php?id=$id"
);

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Blog</title>

<style>

body{

font-family:Segoe UI;

background:linear-gradient(
135deg,
#141e30,
#243b55
);

margin:0;

}

.container{

width:900px;

margin:50px auto;

background:white;

padding:40px;

border-radius:20px;

}

h1{

color:#243b55;

margin-bottom:20px;

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

padding:15px 30px;

border-radius:10px;

cursor:pointer;

font-size:16px;

}

button:hover{

background:#243b55;

}

</style>

</head>

<body>

<div class="container">

<h1>

✏️ Edit Blog

</h1>

<form method="POST">

<input

type="text"

name="title"

value="<?php echo $blog['title']; ?>"

required>

<select name="category">

<option>

<?php echo $blog['category']; ?>

</option>

<option>Technology</option>

<option>Travel</option>

<option>Lifestyle</option>

<option>Education</option>

<option>Photography</option>

</select>

<textarea

name="content"

rows="15"

required><?php echo $blog['content']; ?></textarea>

<button
name="update">

Update Blog

</button>

</form>

</div>

</body>

</html>