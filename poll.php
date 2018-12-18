<?php
    require_once 'config.php';

    $id=$_POST['poll'];

    //select poll
    $sql=$db->query("SELECT id,question FROM polls WHERE id=$id");
    $poll=$sql->fetchObject();

    //fetch choices of the poll
    $sql=$db->query("SELECT polls.id,polls_choices.id 
    AS choice_id,polls_choices.name 
    FROM polls 
    JOIN polls_choices 
    ON polls.id=polls_choices.poll 
    WHERE polls.id=$id");

    while($row=$sql->fetchObject())
    {
        $choices[]=$row;
    }
?> 

<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function validate()
        {
            var choice=document.forms[0];
            var i;
            for(i=0;i<choice.length;i++)
            {
                if(choice[i].checked)
                {
                    return true;
                }
            }
            alert("Please select a choice");  
            return false;
        }
    </script>
</head>
<body>
    <div class="content">
        <div class="logout"><a class="button" href='dashboard.php'>Go Back</a></div>
        <div class="header"><h1><?php echo $poll->question;?></h1></div>
        <form onsubmit="return validate()" class="myform" action="vote.php" method="post">
            <?php foreach($choices as $index => $choice):?>
            <div class="radiolist">
            <input type="radio" name="choice" value="<?php echo $choice->choice_id?>" id="c<?php echo $index;?>">
            <label for="c<?php echo $index;?>"><h2><?php echo $choice->name?></h2></label>
            </div> 
            <?php endforeach;?>
            <button class="button" name="poll" type="submit" value="<?php echo $id;?>">Vote</button>  
        </form>  
    </div>
</body>
</html>