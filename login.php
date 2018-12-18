<?php

    require_once 'config.php';

    //importing variables from form
    $u=$_POST['username'];
    $p=$_POST['password'];

    //checking user credentials in db
    $no=$db->query("SELECT username FROM users WHERE username='$u' AND password='$p'");
    $count=$no->rowCount();
    if($count>0)
    {
        $_SESSION['username']=$u;
        header("Location:dashboard.php");
    }
    else
    {
        echo "<h2>Invalid username or password please try again</h2>";
        echo "<a class='button' href='index.html'>Go Back</a>";
    }
?>
<html>
    <head>
        <title>Create</title>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
