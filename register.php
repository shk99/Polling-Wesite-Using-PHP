<?php
    require_once 'config.php';
    $u=$_POST['username'];
    $p=$_POST['password'];

    //checking if usernamealready exists  or not
    $no=$db->query("SELECT username FROM users WHERE username='$u'");
    $count=$no->rowCount();
    if($count>0)
    {
      echo "<h2>User already exists, please try again or login</h2>";
      echo "<a href='index.php'>Go Back</a>";
    }
    else
    {
      //inserting user values to the database
      $db->exec("INSERT INTO users ValUES ('$u','$p')");
      echo "<h2>Registered Successfully please login to continue</h2>";
      echo "<a class='button' href='index.html'>Go Back</a>";
    }
?>
<html>
    <head>
        <title>Create</title>
        <link rel="stylesheet" href="style.css">
    </head>
</html>