<?php

$conn = mysqli_connect(
"localhost",
"root",
"",
"blog_website"
);

if(!$conn)
{
die("Database Connection Failed");
}

?>