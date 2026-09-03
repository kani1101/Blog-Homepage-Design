<?php

session_start();

include 'db.php';

if(!isset($_SESSION['user_id']))
{
header("Location: login.php");
exit();
}

$user_id=$_SESSION['user_id'];

$result=mysqli_query($conn,"
SELECT *
FROM followers
WHERE user_id='$user_id'
ORDER BY id DESC
");

?>

<!DOCTYPE html>
<html>
<head>

<title>Followers</title>

<style>

body{
margin:0;
font-family:Segoe UI;
background:linear-gradient(135deg,#141e30,#243b55);
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

.card{
background:white;
padding:20px;
margin-bottom:15px;
border-radius:15px;
display:flex;
align-items:center;
}

.avatar{
width:60px;
height:60px;
border-radius:50%;
background:#ff4da6;
color:white;
display:flex;
align-items:center;
justify-content:center;
font-size:22px;
margin-right:20px;
}

.name{
font-size:20px;
font-weight:bold;
}

.date{
color:gray;
font-size:13px;
}

</style>

</head>

<body>

<div class="header">
My Followers
</div>

<div class="container">

<?php

while($row=mysqli_fetch_assoc($result))
{

$first_letter=strtoupper(substr($row['follower_name'],0,1));

?>

<div class="card">

<div class="avatar">
<?php echo $first_letter; ?>
</div>

<div>

<div class="name">
<?php echo $row['follower_name']; ?>
</div>

<div class="date">
Followed On :
<?php echo $row['follow_date']; ?>
</div>

</div>

</div>

<?php
}
?>

</div>

</body>

</html>