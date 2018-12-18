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
        <title>Results</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="content">
            <div class="header"><h1>Results</h1></div>
            <table>
                <?php foreach($choices as $choice):?>
                    <?php 
                    $sql="SELECT id FROM polls_answers WHERE poll=$id";
                    $no=$db->query($sql);
                    $tot=$no->rowCount();
                    $sql="SELECT id FROM polls_answers WHERE poll=$id AND choice=$choice->choice_id";
                    $no=$db->query($sql);
                    $vot=$no->rowCount();
                    if($tot==0)
                    {
                        $vot=0;
                        $tot=1;
                    }
                    ?>
                    <tr>
                        <td><h2><?php echo $choice->name;?></h2></td>
                        <td><meter value="<?php echo ($vot/$tot); ?>"></meter></td>
                    </tr>
                <?php endforeach;?>
            </table>
            <a class="button" href="dashboard.php">Go Back</a>
        </div>
    </body>
</html>
