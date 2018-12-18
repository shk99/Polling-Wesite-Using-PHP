<?php
    require_once 'config.php';

    //fetching polls from database
    $sql=$db->query("SELECT id,question FROM polls");
    while($row=$sql->fetchObject())
    {
        $polls[]=$row;
    }
?> 
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">
        <div class="logout"><a class="button" href="index.html">Logout</a></div>
        <div class="pc"><a class="button" href="create.html">Create your own poll</a></div>
        <div class="header">
            <h1>Homepage</h1>
            <h2>Welcome: <?php echo $_SESSION['username'];?></h2>
        </div>
        <h2>Select a poll to vote on </h2>
        <?php foreach($polls as $poll): ?>
        <form action="poll.php" method="post">
        <button class="button" name ="poll" type="submit" value=<?php echo $poll->id;?>><?php echo $poll->question;?></button>
        </form>
        <?php endforeach;?>
    </div>
</body>
</html>