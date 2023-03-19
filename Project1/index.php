<?php
    $insert=false;
    if(isset($_POST["name"]))
    {
        // set connection variables
        $server="localhost";
        $username="root";
        $password="";

        // create a connection
        $con=mysqli_connect($server, $username, $password);

        // check for connection success
        if(!$con){
            die("connection to this database is failed due to".mysqli_connect_error());
        }
        // echo "Success connecting to the db";

        // collect post variables
        $name = $_POST["name"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $desc = $_POST["desc"];

        $sql="INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES 
        ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
        // echo $sql;

        // for inserting data to the database
        if($con->query($sql)==true){        //  '->' is object operator
            // echo "Successfully inserted";
            $insert=true;
        }
        else{
            echo "ERROR: $sql <br> $con->error   ";
        }

        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travell form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Welcome to Trip and Tours</h3>
        <p>Please enter your details and submit this form</p><br>
    </div> 

    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="number" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any another information here"></textarea>
        <button class="btn">Submit</button>
        <?php
            if($insert==true){
                "<p>Thanks for submitting the form</p>"; 
            }
        ?>
    </form>

    <script src="index.js"></script>
</body>
</html>