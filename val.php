<?php
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];

    if(empty($fname)){
        $fname_error = "please use a valid input";
    }elseif(strlen($fname) <5){
        $fname_error = "username should have a min of six letters";

    }
    if(empty($lname)){
        $lname_error= "use a valid input";
    }
    if(empty($mail)){
        $mail_error= "use a valid input";
    }

    include('reg.php');


?>