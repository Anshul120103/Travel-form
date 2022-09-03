<?php
$insert=false;
if (isset($_POST['name'])) {
    $server = 'localhost:3307';
    $username = 'root';
    $password = '';
    $db = 'trip_data';

    $con = mysqli_connect($server, $username, $password, $db);

    if (!$con) {
        die('Connection failed due to ' . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `customers` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Description`, `Date_and_Time`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($con->query($sql)==true){
        $insert=true;
    }

    else{
        echo "Error: ".$con->error;
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
    <title>Anshul Tours and Travels</title>
    <link rel="stylesheet" href="Css.css">
</head>
<body>
    <img src="./Multimedia/Background.webp" alt="">
    <div class="container">
        <h1>Welcome to Anshul's US Trip Form</h1>
        <p id="para">Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert){
        echo '<p id="submitmsg">Thanks for submitting your form. We are happy to see you joining us for the trip</p>';
        }
        ?>
        <form action="index.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Enter your Name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your Gender">
            <input type="text" name="email" id="email" placeholder="Enter your Email">
            <input type="text" name="phone" id="phone" placeholder="Enter your Phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <input type="submit" class="submit" value="Submit">
        </form>
    </div>
</body>
</html>