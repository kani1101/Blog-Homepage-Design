<?php

session_start();

include 'db.php';

$error = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE email='$email'
        AND password='$password'"
    );

    if(mysqli_num_rows($result) == 1)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $row['id'];

        $_SESSION['fullname'] = $row['fullname'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $error = "Incorrect Email or Password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>KaniVerse Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, sans-serif;
}

body{

height:100vh;

display:flex;

justify-content:center;

align-items:center;

background:

linear-gradient(
rgba(0,0,0,0.6),
rgba(0,0,0,0.6)
),

url('https://images.unsplash.com/photo-1516321318423-f06f85e504b3');

background-size:cover;
background-position:center;
background-repeat:no-repeat;
}

.container{

width:420px;

background:rgba(255,255,255,0.92);

padding:40px;

border-radius:20px;

box-shadow:0px 10px 30px rgba(0,0,0,0.4);

backdrop-filter:blur(10px);
}

h1{

text-align:center;

margin-bottom:25px;

color:#7b2ff7;
}

input{

width:100%;

padding:12px;

margin-bottom:15px;

border:1px solid #ccc;

border-radius:10px;

font-size:16px;
}

button{

width:100%;

padding:12px;

border:none;

background:#7b2ff7;

color:white;

font-size:18px;

border-radius:10px;

cursor:pointer;
}

button:hover{

background:#5e17eb;
}

.error{

text-align:center;

margin-bottom:15px;

font-weight:bold;

color:red;
}

.register-link{

text-align:center;

margin-top:15px;
}

.register-link a{

text-decoration:none;

color:#2575fc;

font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h1>KaniVerse Login</h1>

<div class="error">
<?php echo $error; ?>
</div>

<form method="POST">

<input
type="email"
name="email"
placeholder="Enter Email"
required>

<input
type="password"
name="password"
placeholder="Enter Password"
required>

<button name="login">
Login
</button>

</form>

<div class="register-link">

Don't have an account?

<br><br>

<a href="register.php">
Register Here
</a>

</div>

</div>

</body>
</html>