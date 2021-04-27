<!DOCTYPE html>
<html>
    <head>
        <title>Info Form</title>
        <link rel="stylesheet" href="http://127.0.0.1/Lab_6_&_7_php.css">
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
        $nm = $dc = $info = $name = $cor = $desc = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $d = $_POST["desc"];
            $n = $_POST["name"];
            if (empty($n)) 
            {
                $nm = "Name is Mandatory";
            } 
            else 
            {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$n)) 
                {
                    $nm = "Enter only alphabets and whitespace";
                }
            }
            if(empty($d))
            {
                $dc = "Description is Mandatory";
            }
            else
            {
                if (!preg_match("#native#",$d)) 
                {
                    $dc = "FALSE";
                }
                else
                {
                    $dc = "TRUE";
                }
            }
            if($nm=="" & $dc=="TRUE")
            {
                $info = "Information Provided";
                $name = "Name : ".$_POST["name"];
                $cor = "Country : ".$_POST["cor"];
                $desc = "About favourite place : ".$_POST["desc"];
            }
        }
    ?>
        <form method="POST">
        <H1 id="head1">Info Form</H1>
        <p><span class="error">* required fields</span></p>
        <label for="name">Name :</label><br>
        <input type="text" id="name" name="name" placeholder="Enter name">
        <span class="error">* <?php echo $nm;?></span>
        <br><br>
        <label>Country of Residence :</label><br>
		<input type="radio" name="cor" value="India" id="India">
        <label for="India">India</label><br>
		<input type="radio" name="cor" value="USA" id="USA">
        <label for="USA">USA</label><br>
		<input type="radio" name="cor" value="UK" id="UK">
        <label for="UK">UK</label><br>
        <input type="radio" name="cor" value="Canada" id="Canada">
        <label for="Canada">Canada</label><br>
        <input type="radio" name="cor" value="Japan" id="Japan">
        <label for="Japan">Japan</label><br>
        <input type="radio" name="cor" value="Brasil" id="Brasil">
        <label for="Brasil">Brasil</label><br><br>
        <label for="desc">Describe about your favourite place :</label><br>
		<textarea name="desc" id="desc" rows="3" cols="40" placeholder="Describe about you favourite place here"></textarea>
        <span class="error">* <?php echo $dc;?></span><br>
        <input type="submit" id="bt1" name="bt1" class="bt1" value="Submit"/>
        <H1 id="head2"><?php echo $info; ?></H1>
        <p id="pg">
            <?php echo $name; ?><br><br>
            <?php echo $cor; ?><br><br>
            <?php echo $desc; ?>
        </p>
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") 
            {  
                if($nm=="" & $dc=="TRUE")
                {   
                    echo '<script>alert("Form submitted successfully")</script>';
                }   
            }
        ?>
    </body>
</html>