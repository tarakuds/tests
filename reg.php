<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
</head>
<body>
<h1>Register</h1>
    <h2>Welcome, Kindly proceed with Registration Here</h2>
    <p><b>All forms are required</b></p>
       
        <form action="val.php" method="post">
        
        <p><label for="fname">Firstname:</label>
        <input type="text" name="fname"  id="" value="<?php echo htmlspecialchars($fname) ?>" placeholder="please enter your firstname" >
        <?php if(isset($fname_error)){  ?>
            <p><?php echo $fname_error; ?></p>
            <?php } ?>
                    
        </p>

        <p><label for="lname">lastname:</label>
        <input type="text" name="lname" id="" placeholder="please enter your lastname" ></p>
            <?php if(isset($lname_error)){  ?>
            <p><?php echo $lname_error; ?></p>
            <?php } ?>

        <p><label for="mail">email:</label>
        <input type="email" name="mail" id="" placeholder="give details of your email" ></p>
        <?php if(isset($mail_error)){  ?>
            <p><?php echo $mail_error; ?></p>
            <?php } ?>

        <!--<p><label for="password">Password</label>
        <input type="password" name="password" id=""></p>
        
        <p><label for="gender">Gender:</label>
            <select name="gender" id="" >
            <option>what is your gender</option>
            <option value="female">Female</option>
            <option value="Male">Male</option>
            <option value="rathernot">Rather not say</option>
        </select>
        </p>

        <p><label for="designation">Designation</label>
        <select name="designation" id="" >
            <option value="SD">select a designation</option>
            <option value="Medical Team">Medical Team(MT)</option>
            <option value="Super Admin"> Super Admin</option>
            <option value="Patient"> Patient</option>
        </select></p>

        <p><label for="departments">Department</label>
        <input type="text" name="departments" id="" placeholder="lets know your department"></p>-->

        <button type="submit" name="submit" >Register</button>

        </form>
</body>
</html>