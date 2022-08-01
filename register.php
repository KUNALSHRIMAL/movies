<?php
include 'db/db.php';
mysqli_query($con,"CREATE DATABASE movies");
mysqli_select_db($con,'movies');
if (mysqli_query($con,"CREATE TABLE signup (
    ID int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(255),
    email varchar(255),
    pass varchar(255)
)")) {
    # code...
echo "string";
} 

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$chack=$_POST['check'];
if($chack=='on'){

    $email = stripcslashes($email);
    $email = mysqli_real_escape_string($con,$email);

    $username = stripcslashes($username);
    $username = mysqli_real_escape_string($con,$username);


    $result = mysqli_query($con,"select * from signup where email = '$email'") or die("failed to query database".mysqli_error());
    $row = mysqli_fetch_array($result);

    if($row['email'] == $email) {
        echo '<script type ="text/javascript"> alert("This email is already registered \n Please try with a different email");window.location= "hello.html"</script>';
        die();
    }

        $result = mysqli_query($con,"select * from signup where username = '$username'") or die("failed to query database".mysqli_error());
        $row = mysqli_fetch_array($result);
    if ($row["username"] == $username) {
        echo '<script type ="text/javascript"> alert("This username is taken \n Please try with a different username");window.location= "hello.html"</script>';
        die();
    }elseif (($row['email'] !== $email)) {
        // code...
    $query = mysqli_query($con," insert into signup (username, email, pass) 
    values ('$username', '$email', '$pass')");
    
    echo '<script type ="text/javascript"> alert("Registered Successfully");window.location= "p1.html"</script>';

    }else {
        // code...
        echo '<script type ="text/javascript"> alert("Password Dont match");window.location= "hello.html"</script>';
    }
}
else{
    echo '<script type ="text/javascript"> alert("Plz.. agree to terms and conditions");window.location= "hello.html"</script>';

}
 ?>