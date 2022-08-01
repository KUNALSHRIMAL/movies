<?php
    $mname=$_POST['name'];
    $mtype=$_POST['mtype'];
    $about=$_POST['about'];
    $sel=$_POST['sel'];

    //database connection
    if ($mname=='' and $about=='' and $mtype=='') {
        echo '<script type ="text/javascript"> alert("enter all the details");window.location= "upload.html"</script>';
    }
    else{
    $conn = new mysqli('localhost','root','','movies');
    if($conn->connect_error){
        echo("connection faild");
    }
    else{
        $stmt=$conn->prepare("INSERT INTO `uploadreq`(`movie_name`, `industry`, `type`, `about`)  VALUES ( ?, ?, ?,?);");
        $stmt->bind_param("ssss",$mname,$sel,$mtype,$about);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        echo '<script type ="text/javascript"> alert("Send Successfully!!");window.location= "p1.html"</script>';
        
    }
}

?>