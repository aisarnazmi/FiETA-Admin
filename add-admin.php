<?php

include("connection.php");

if(isset($_POST["aid"]) && isset($_POST["pwd"])){
    
    $pwd = md5($_POST["pwd"]);
    
    $sql = "INSERT INTO admin(aID, aPassword) 
        values('$_POST[aid]', '".$pwd."')";

    $result = mysqli_query($connect, $sql);

    if(!$result)
    {
        echo "<script type=\"text/javascript\">
                alert(\"Registration Failed! This ID Already Registered.\");
                window.location = \"input-venue.php\"
            </script>";

    }
    else
    {
        echo "<script type=\"text/javascript\">
                alert(\"Registration Successful.\");
                window.location = \"input-venue.php\"
            </script>";
    }

}	 
?>