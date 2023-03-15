<head>
    <title>Relateable</title>
    <link rel="stylesheet" type="text/css" href="site.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
  
</head>

<div align="center" class="posting-box">
    <form method="post">
        <div class="form-group col-md-4">
            <label class="control-label labelFont">Email</label>
            <input class="form-control" type="text" name="Email">
        </div>
        <div class="form-group col-md-4">
            <label class="control-label labelFont">Password</label>
            <input class="form-control" type="text" name="Password">
        </div>
        <div class="form-group col-md-4">
            <input class="btn btn-primary" type="submit" value="Login" name="submit">
        </div>
        <div class="form-group col-md-3"><a href="ForgotPassword.php" class="forgot-password">Forgot Password</a></div>
        <div class="form-group col-md-3"><a href="CreateAccount.php" class="create-account">Create Account</a></div>
    </form>
</div>

<?php
$db = new SQLite3('C:\xampp\htdocs\GreenSpace\GreenSpace.db');

if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $query = "SELECT * FROM Authorisation WHERE Email='$Email' AND Password='$Password'";
    $result = $db->query($query);
    $user = $result->fetchArray();

    if ($user) {
        session_start();
        $_SESSION['Email'] = $user['Email'];

        header('location: http://localhost/GreenSpace/HomePage.php');
    } else {
        echo 'Incorrect username or password';
    }
}
?>


