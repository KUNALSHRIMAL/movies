<?php
session_start();
include 'db/db.php';
$database = mysqli_select_db($con,'movies');
// if (!$database) {
//    echo '<script type ="text/javascript"> alert("Server Down.\nPlease try again later.");window.location= "signin.php"</script>';
//   die();
// }

$username = $_POST['username'];
$pass = $_POST['password'];

$username = stripcslashes($username);
$pass = stripcslashes($pass);

$username = mysqli_real_escape_string($con,$username);
$pass = mysqli_real_escape_string($con,$pass);

$result = mysqli_query($con,"select * from signup where username = '$username'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);
if (($row['username'] !== $username)) {
    // code...
    echo '<script type ="text/javascript"> alert("Username does nor exists.\nPlease Make Your account first.");window.location= "hello.html"</script>';
    die();

}

$result = mysqli_query($con,"select * from signup where username = '$username' and pass = '$pass'") or die("failed to query database".mysqli_error());
$row = mysqli_fetch_array($result);

if ($row['username'] == $username && $row['pass'] == $pass) {
    $_SESSION['username']=$username;

    echo '<script type ="text/javascript"> alert("login Successfully!! welcome ");window.location= "p1.html"</script>';

}else{
    // code...
    echo '<script type ="text/javascript"> alert("Either Username or Password is incorrect");window.location= "hello.html"</script>';
}
 ?>
