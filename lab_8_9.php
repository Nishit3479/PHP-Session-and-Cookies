<?php
session_start();
    $msg = "";
    $target_dir = "Uploads/";
    $target_file = $target_dir . $_POST['name'].'-'.basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $info = $name = $em = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $email = $_POST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $info = "Information Provided";
            $name = "Name : ".$_POST["name"];
            $em = "Email : ".$email; 
        }
        else
        {
            exit('<script>alert("Invalid Email Format..!!");document.location="http://127.0.0.1/Lab_8_&_9.php"</script>');
        } 
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
        {
            $msg = "Invalid file format. Only JPG, JPEG and PNG files are accepted. ";
            $uploadOk = 0;
        }
    else
    {
        if ($_FILES["photo"]["size"] > 200000) 
        {
            $msg = "Size limit reached. Files below 200KB is accepted. ";
            $uploadOk = 0;
        }
        else
        {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
            {
                $msg = "The image file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
            } 
            else 
            {
                $msg = "File could not be uploaded.";
            }
        }
    }
    $_SESSION['msg'] = $msg;
    $_SESSION['info'] = $info;
    $_SESSION['name'] = $name;
    $_SESSION['em'] = $em;
    header("Location: Lab_8_&_9.php");
?>