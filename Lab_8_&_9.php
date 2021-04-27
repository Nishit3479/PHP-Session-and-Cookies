<?php
session_start();
?>
<?php
$day = 60 * 60 * 24 + time();
date_default_timezone_set("Asia/Kolkata");
setcookie('lastVisit', date("d-m-Y H:i:s a"), $day);
if(isset($_COOKIE['lastVisit']))
{
    $visit = $_COOKIE['lastVisit'];
    echo "<p id = pr>"."You visited this website previously on ". $visit."</p>";
}
else
{
    echo "<p id = pr>"."You've got some stale cookies!"."</p>";
}
?>
<?php
if(isset($_SESSION['lastaction']))
{
    $inactive = time() - $_SESSION['lastaction'];
    $expire = 300;
    echo "<p id = pr>"."Inactive Time : ".$inactive."s"."</p>";
    if($inactive > $expire)
    {
        session_unset();
        session_destroy();
    }
    if (isset($_SESSION['info']) && $_SESSION['info'])
    {
        echo "<p id = pr>"."Session is Active"."</p>";
    }
    else
    {
        echo "<p id = pr>"."Session is Not Active"."</p>";
    }
}
$_SESSION['lastaction'] = time();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Info Form</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_8_&_9.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <form method="POST"  action="lab_8_9.php" enctype="multipart/form-data">
        <H1 id="head1">Info Form</H1>
        <label for="name">Username :</label><br>
        <input type="text" id="name" name="name" placeholder="Enter Username" required><br><br>
        <label for="pass">Password :</label><br>
        <input type="password" id="pass" name="pass" placeholder="Enter Password" required><br><br>
        <label for="email">Email :</label><br>
        <input type="text" id="email" name="email" placeholder="Enter Email" required><br><br>
        <label for="photo">Profile Photo :</label>  <br><br>
        <input type="file" id="photo" name="photo" required><br><br><br>
        <input type="submit" id="bt1" name="bt1" class="bt1" value="Submit"/>
        <H1 id="head2">
            <?php 
            if (isset($_SESSION['info']) && $_SESSION['info'])
            {
                echo $_SESSION['info'];
            } 
            ?><br><br>
        </H1>
        <p id="pg">
            <?php 
            if (isset($_SESSION['name']) && $_SESSION['name'])
            {
                echo $_SESSION['name'];
            } 
            ?><br><br>
            <?php 
            if (isset($_SESSION['em']) && $_SESSION['em'])
            {
                echo $_SESSION['em'];
            } 
            ?><br><br>
            <?php 
            if (isset($_SESSION['msg']) && $_SESSION['msg'])
            {
                echo $_SESSION['msg'];
            } 
            ?><br><br>
        </p> 
    </form>
    </body>
</html>