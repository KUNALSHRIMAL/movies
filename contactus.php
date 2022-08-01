<?php
    $name=$_POST['name'];
    $mail=$_POST['mail'];
    $number=$_POST['number'];
    $feed=$_POST['message'];

    //database connection
    if($name=='' and $mail=='' and $number=='' and $feed==''){
        echo '<script type ="text/javascript"> alert("enter all the details");window.location= "index.html"</script>';
    }
    else{
        $conn = new mysqli('localhost','root','','movies');
        if($conn->connect_error){
            echo("connection faild");
        }
        else{
            // NSERT INTO `contactus` (`id`, `person_name`, `email`, `phone_no`, `feedback`)
            $stmt=$conn->prepare("INSERT INTO `contactus` (`person_name`, `email`, `phone_no`, `feedback`)  VALUES ( ?, ?, ?,?);");
            $stmt->bind_param("ssss",$name,$mail,$number,$feed);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo '<script type ="text/javascript"> alert("Send Successfully!!");window.location= "index.html"</script>';
            
        }
    }

?>