<?php

include("connection.php");

if(isset($_POST["submit"])){
    
    $folder_path = './document/';

    $filename = $_FILES["studfile"]["tmp_name"];

    $filen = basename($_FILES['studfile']['name']);
    $newname = $folder_path . $filen;

    $FileType = pathinfo($newname,PATHINFO_EXTENSION);

    if($FileType == 'csv')
    {
        if($_FILES["studfile"]["size"] > 0)
        {

            $file = fopen($filename, "r");
            while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                 $id = $emapData[0];
                 $name = $emapData[1];
                 $camp = $emapData[2];
                 $prog = $emapData[3];
                 $subj = $emapData[4];
                 $pwd = $emapData[5];


                //It wiil insert a row to our subject table from our csv file`
                $sql = "INSERT INTO student(studID, studName, studCampus, studProgramme, studSubject, studPassword) 
                    values('".$id."','".$name."','".$camp."','".$prog."','".$subj."','".$pwd."')";

                //we are using mysql_query function. it returns a resource on true else False on error
                $result = mysqli_query($connect, $sql);

                if(!$result )
                {
                    echo "<script type=\"text/javascript\">
                            alert(\"Students Record Failed to be Imported.\");
                            window.location = \"input-venue.php\"
                        </script>";

                }
            }
            fclose($file);

            //throws a message if data successfully imported to mysql database from excel file
            echo "<script type=\"text/javascript\">
                    alert(\"Students Record has been Successfully Imported.\");
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