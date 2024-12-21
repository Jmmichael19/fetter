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
    <title>Fetter | Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <style>
        body {
            background: #E6EEFA;
    padding: 50px;
}
h1 {
    max-width: 600px;
    margin:0 auto;
    padding: 50px;
   
}
.container {
    max-width: 600px;
    padding: 50px;

}
.form-group {
    margin-bottom: 30px;
    
}
.form-control {
    border: 1px solid #000000;

}
.form-btn {
    background: #BD7FC0;
}
.cursor-pointer{
    cursor: pointer;
}
.show_hide_text {
    position: absolute;
    top: 33.5%;
    right: 36%;
    font-size: 15px;
}
h1 {
    text-align: center;
    padding-top: 1px;
}
h1 {
    font-size: 80px;
}

    </style>
<body>
    <h1>FETTER</h1>
    


    <div class="container">
    <?php 
    if (isset($_POST["login"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once "database.php";
        $sql = "SELECT * FROM users WHERE email ='$email'";
        $result= mysqli_query($conn,$sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])){
                session_start();
                $_SESSION["user"] = "yes";
                header("Location: index.php");
                die();
            
        } else {
            echo "<div class='alert alert-danger'>Password does not match</div>";
        }    
        }else{
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    }

    
?>
        <form action="login.php" method="post" >
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" class="form-control">
            </div>
            <div class="form-group ">
                <input type="password" placeholder="Password" name="password" class="form-control">
                <span class="show_hide_text cursor-pointer" id="show_hide_password"style="padding-top:11%; padding-left: 40px;">Show</span>
            </div>
            <div class="form-btn text-center rounded  m-5 ">
                <input type="submit"  class="btn text-white fw-bold" value="Log in" name="login" class="btn ">
            </div>
        </form>
        <div class="p-1" style="text-align: center;"><p>Not registered yet?<a href="registration.php" style="padding-left:10px;">Register Here</a></p></div>
    </div>
    
</body>
</html>