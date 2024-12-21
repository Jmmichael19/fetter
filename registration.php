<?php
    session_start();
    if (isset($_SESSION["user"])) {
        header("Location: index.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetter | Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    body{
        padding: 10px 10px;
            background: #E6EEFA;
           
        }
     .rounded {
        max-width: 500px;
        padding: 10px;
        background: white;
       
        
         

}   


.form-group {
    margin-bottom: 20px;

   
} 
.form-control {
    margin: 0%;
    border: 1px solid #000000;
}
.h1 {
    padding: 10px;
}
.for-btn {
    background: #BD7FC0;
    width: 80%;
    margin-left: 10%;
}
.cursor-pointer{
    cursor: pointer;
}
.show_hide_text {
    position: absolute;
    bottom: 29%;
    right: 37%;
    font-size: 15px;
}


</style>

<div>

    <div class="h1 text-center fw-bold">
         <h1>Fetter</h1>
    </div>

    

    <div class="container rounded " style="box-shadow: 5px 5px 1px lightgrey;">

    <?php 
    if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $Username = $_POST["username"];
    $gender = $_POST["gender"];
    $OrderDate = $_POST["birthdate"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordReapeat = $_POST["repeat-password"];

    $passwordhash = password_hash($password, PASSWORD_DEFAULT);


    $errors = array();

    if (empty($name) OR empty($Username) OR empty($OrderDate) OR empty($gender) OR empty($email) OR empty($password) OR empty($passwordReapeat)) {
        array_push($errors,"ALL fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors,"Email is not valid");
    }
    if (strlen($password)<8) {
        array_push($errors,"Password must be at least 8 characters long");
    }
    if ($password!==$passwordReapeat) {
        array_push($errors,"Password does not match");
    }
    require_once "database.php";
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount>0) {
        array_push($errors,"Email aready exist!");
    }
    if (count($errors)>0) {
        foreach ($errors as $error) {
            echo"<div class='alert alert-danger'>$error</div>";
        }
    }else{
 
        $sql = "INSERT INTO users (name, Username, gender, OrderDate, email, password) VALUES ( ?, ?, ?, ?, ?, ? )";
        $stmt = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        if ($prepareStmt) {
            mysqli_stmt_bind_param($stmt,"ssssss",$name, $Username, $gender, $OrderDate,$email,$passwordhash);
            mysqli_stmt_execute($stmt);
            echo "<div class='alert alert-success'>You are registered successfully.</div>";
        }else{
            die("Something went wrong!" );
        }
    }



    }


?>

        <h3 class=" text-center fw-bold">Create new account</h3>
        <h4 class=" text-center fs-5 p-1">It's quick and <br> easy.</h4>
        <form action="registration.php" method="post">
            <div class="form-group ">
                <input type="fullname" class="form-control" name="name" placeholder="Full name">
            </div>
            <div class="form-group ">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                Gender:<br>
                <select id="text" class="form-select form-control" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                </select>
            </div>
            <div class="form-group">
            Birthdate:<br>
                <input type="date" id="birthday" class="form-control" name="birthdate" placeholder="Birthdate">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                <span class="show_hide_text cursor-pointer" id="show_hide_password">Show</span>
            </div>
            <div class="form-group">
                <input type="repeat-password" class="form-control" name="repeat-password" placeholder="Repeat assword">
            </div>
            
    <div class="for-btn text-center rounded">
            <input type="submit" class="btn text-white fw-bold" value="Sign up" name="submit">
            </div>
        </form>
    </div>

    
    <div class="container p-1" style="max-width: 500px;">
    <p>People who use our service may have uploaded your <br> contact information to Fetter.</p>
    </div>

    <div class="text-center ">
        <div><p>Already registered?<a href="login.php" style="padding-left:5px;">Login Here</p></div>
    </div>
    
    <script src="js/common.js"></script>
</body>
</html>