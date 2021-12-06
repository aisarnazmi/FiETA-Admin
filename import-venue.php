<?php

include("connection.php");

if(isset($_POST["campcode"])){

    
    $folder_path = './document/';

    $camp = $_POST["campcode"];
    $filename = $_FILES["venfile"]["tmp_name"];

    $filen = basename($_FILES['venfile']['name']);
    $newname = $folder_path . $filen;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    if($FileType == 'csv')
    {
        if($_FILES["venfile"]["size"] > 0)
        {

            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                 $subj = $emapData[0];
                 $venue = $emapData[1];


                //It wiil insert a row to our subject table from our csv file`
                $sql = "INSERT INTO venue(campusCode, subjectCode, venue) 
                    values('".$camp."','".$subj."','".$venue."')";

                //we are using mysql_query function. it returns a resource on true else False on error
                $result = mysqli_query($connect, $sql);

                if(!$result )
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Examination Venue Record Failed to be Imported.\");
                            window.location = \"input-venue.php\"
                        </script>";

                }
            }
            fclose($file);

            //throws a message if data successfully imported to mysql database from excel file
            echo "<script type=\"text/javascript\">
                    alert(\"Examination Venue Record has been Successfully Imported.\");
                    window.location = \"input-venue.php\"
                </script>";

            //close of connection
            mysql_close($conn); 



        }
    }
    else
    {
        echo "<script type=\"text/javascript\">
                alert(\"Invalid File: Please Upload CSV File.\");
                window.location = \"input-venue.php\"
            </script>";
    }

}	 
?>