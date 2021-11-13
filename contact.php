<?php

session_start();



$con = mysqli_connect('localhost','root');
mysqli_select_db($con, 'portfolio_msg');

$name = $_POST['name'];
$Email = $_POST['Email'];
$Message = $_POST['Message'];

$q = "select * from msg where name = '$name' && Email = '$Email' && Message = '$Message'";
$result = mysqli_query($con, $q);
$num = mysqli_num_rows($result);

if($num == 1){
    ?>
    <script>
        alert ('user name already exists');
    </script>

    <?php
    
}else{
    $reg = "INSERT INTO `msg`( `name`, `Email`,`Message`) VALUES ('[$name]','[$Email]','[$Message]')";
    mysqli_query($con , $reg);
    
    ?>

        <script>
            alert ('MSG Sent Successful');
            header('location: index.php');
        </script>
        

    <?php
    
}
?>