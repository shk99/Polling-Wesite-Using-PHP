<?php
    require_once 'config.php';

    if(isset($_POST['create']))
    {
        $q=$_POST['question'];
        $ch1=$_POST['ch1'];
        $ch2=$_POST['c'];
    
        $db->exec("INSERT INTO polls (question) VALUES ('$q')");
        $sql=$db->query(" SELECT id FROM polls WHERE question='$q' ");

        $poll=$sql->fetchObject();
        $id=$poll->id;
        
        $db->exec("INSERT INTO polls_choices (poll,name) VALUES ('$id','$ch1')");

        foreach($ch2 as $ch)
        {
            $db->exec("INSERT INTO polls_choices (poll,name) VALUES ('$id','$ch')");
        }
        
        echo "<div class='header'><h2>Poll Succesfully created</h2></div>";
        echo "<a class='button' href='dashboard.php'>Go Back</a>";
    }    

?>
<html>
<head>
<title>Create</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
</body>
</html>