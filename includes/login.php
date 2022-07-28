<?php
require_once('database.php');
//get data from form
$username = $_POST['username'];
$password = $_POST['password'];

//Set SQL query
$conn = database::connect()->prepare("SELECT * FROM users WHERE username = ?");
$conn->execute(array($username));

if($conn->rowCount() == 0) {
    header('Location: ../adminLogin.php?notfound');
    exit();
}
//Select password using username
$pwdDB = $conn->fetchAll(PDO::FETCH_ASSOC);


//Check if password match
//set session
if($password == $pwdDB[0]['password']) {
    session_start();
    $_SESSION['user_id'] = $pwdDB[0]['id'];
    $_SESSION['username'] = $pwdDB[0]['username'];
    header('Location: ../admin.php?loggedin');
    exit();
}
else {
    header('Location: ../adminLogin.php?wrongpassword');
    exit();
}



