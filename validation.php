<?php
    session_start();
    //test run for validation
    $fname=$_POST['fname'];// != ""? $_POST['fname']:$errorCount++;
    $lname=$_POST['lname'];// != ""? $_POST['lname']:$errorCount++;
    $mail=$_POST['mail'];//!= ""? $_POST['mail']:$errorCount++;
    $pass=$_POST['password'];//!= ""? $_POST['password']:$errorCount++;
$gender=$_POST['gender'];// != ""? $_POST['gender']:$errorCount++;
$designation=$_POST['designation'];// != ""? $_POST['designation']:$errorCount++;
$dept=$_POST['departments'];// != ""? $_POST['departments']:$errorCount++;

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


    $_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['mail']=$mail;
$_SESSION['gender']=$gender;
$_SESSION['designation']=$designation;
$_SESSION['departments']=$dept;

$fname_error = $lname_error = "";

$errorCount=0;


if(isset($_POST["submit"])){

   if (empty($fname)|| empty($lname)||empty($mail)||empty($pass) ||empty($gender)|| empty($designation)||empty($dept)) {
       
       //$error = "this field need to be filled";
       header("Location: register.php");
        die();
    }
else{
    if((!preg_match("/^[a-zA-z\s]+$/", $fname) || (!preg_match("/^[a-zA-z\s]+$/", $lname)){
        //$error = "this field need to be filled";
        header("Location: register.php?message=fill well");
        //die();
    }
    else{
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            header("Location: register.php");
            die(); 
        }

    }
    /* if(strlen($name)<7){
    echo "name too short";
     }*/
}
}
else{

    //assigning a unique ID by counting users
    $allUsers = scandir("db/users/");
    

    $countAllUsers = count($allUsers);
    
    $newUserId= ($countAllUsers-1);


    //To save to database
    $userObject= [
        'id'=>$newUserId,
        'fname'=>$fname,
        'lname'=>$lname,
        'mail'=>$mail,
        'password'=>password_hash($pass, PASSWORD_DEFAULT),
        'gender'=>$gender,
        'designation'=>$designation,
        'departments'=>$dept

    ];

    for($counter=0; $counter< $countAllUsers; $counter++){
        $currentUser=$allUsers[$counter];
        if($currentUser == $mail.".json"){
            $_SESSION['error']= "Registration Failed. User already exists ";
            header("Location: register.php");
            die();
        }
    }

    //using loops to verify if email address already exist in db
    file_put_contents("db/users/".$mail. ".json", json_encode($userObject) );
    $_SESSION['message']= 'You can now login '.$fname;
    header("Location: login.php");
   // echo "successful";
}





?>