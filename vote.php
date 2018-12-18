<?php
    require_once 'config.php';
    if(!isset($_POST['choice']))
    {
        echo "<script type='text/javascript'>alert('Please Enter a choice');</script>";
    }
    else
    {
        $user=$_SESSION['username'];
        $choice=$_POST['choice'];
        $poll=$_POST['poll'];
    
        //checking if user voted on this poll
        $q=$db->query("SELECT id FROM polls_answers WHERE user='$user' AND poll='$poll'");
        $count=$q->rowCount();
        if($count>0)
        {
            echo "<div class='header'><h2>You have already voted on this poll<h2></div>";
        }
        else
        {
            //inserting votes
            $sql="INSERT INTO polls_answers (user,poll,choice) VALUES ('$user','$poll','$choice')";
            $db->exec($sql);
            echo "<div class='header'><h2>Thank you for Voting<h2></div>";
        }
    }


?>

<html>
    <head>
        <title>Vote</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="result.php" method="post">
            <button class="button" name="poll" value= "<?php echo $poll;?>" type="submit" >View Results</button>
        </form>
    </body>
</html>


