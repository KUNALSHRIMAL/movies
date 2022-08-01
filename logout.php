<?php

session_start();
session_destroy();
echo '<script type ="text/javascript"> alert("Logout successfully");window.location= "hello.html"</script>';
?>