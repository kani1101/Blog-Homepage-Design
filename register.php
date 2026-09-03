<?php

include 'db.php';

$message = "";

if(isset($_POST['register']))
{
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query(
        $conn,
        "SELECT * FROM users WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0)
    {
        $message = "Email already registered!";
    }
    else
    {
        mysqli_query(
            $conn,
            "INSERT INTO users(fullname,email,password)
            VALUES('$fullname','$email','$password')"
        );

        $message = "Registration Successful!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>KaniVerse Registration</title>

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
rgba(0,0,0,0.5),
rgba(0,0,0,0.5)
),

url('https://images.unsplash.com/photo-1506744038136-46273834b3fb');

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

color:#ff4da6;
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

background:#ff4da6;

color:white;

font-size:18px;

border-radius:10px;

cursor:pointer;
}

button:hover{

background:#e60073;
}

.message{

text-align:center;

margin-bottom:15px;

font-weight:bold;

color:green;
}

.login-link{

text-align:center;

margin-top:15px;
}

.login-link a{

text-decoration:none;

color:#2575fc;

font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h1>KaniVerse Register</h1>

<div class="message">
<?php echo $message; ?>
</div>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Enter Full Name"
required>

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

<button name="register">
Register
</button>

</form>

<div class="login-link">

Already have an account?

<br><br>

<a href="login.php">
Login Here
</a>

</div>

</div>

</body>
</html>