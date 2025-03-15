<?php

  $db=mysqli_connect("localhost","root","","lost_and_found_hub");

    if(!$db){
        die("Connection failed: " . mysqli_connect_error());
    }
    else{
        echo "Connected successfully";
    }


?>




