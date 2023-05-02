<?php

    include("_includes/config.inc");
    include("_includes/dbconnect.inc");

    global $conn;

    if(isset($_POST['submit']))
    {
        $fname = real_escape_string($_POST['fname']);
        $lname = real_escape_string($_POST['lname']);
        $id = real_escape_string($_POST['id']);
        $dob = real_escape_string($_POST['dob']);
        $house = real_escape_string($_POST['house']);
        $town = real_escape_string($_POST['town']);
        $county = real_escape_string($_POST['county']);
        $country = real_escape_string($_POST['country']);
        $postcode = real_escape_string($_POST['postcode']);
        $pwd = real_escape_string($_POST['pwd']);

        // Obtain the file sent to the server within the response.
        $photo = $_FILES['photo']['tmp_name']; 

        // Get the file binary data
        $imagedata = addslashes(fread(fopen($photo, "r"), filesize($photo)));
    
        $sql = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`, `photo`) 
        VALUES ('". $id . "', '" . password_hash($pwd, PASSWORD_DEFAULT) . "', '". $dob . "', '". $fname . "', '". $lname . "', '". $house . "', '". $town . "', '". $county . "', '". $country . "', '". $postcode . "', '". $imagedata . "');";
        mysqli_query($conn,$sql);
    }

    header("Location: index.php");

?>