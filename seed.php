<?php

    include("_includes/dbconnect.inc");

    function seedDatabse()
    {
        global $conn;
        $sql = "select * from student;";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);

        $student1 = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) 
        VALUES ('20000001', '" . password_hash("test", PASSWORD_DEFAULT) . "', '2004-11-10', 'James', 'Bond', '5 London Road', 'High Wycombe', 'Bucks', 'UK', 'HP11 2HP');";
        
        $student2 = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) 
        VALUES ('20000002', '" . password_hash("test", PASSWORD_DEFAULT) . "', '2002-04-29', 'Leticia', 'Rodrigues', '45 Bridge Street', 'Slough', 'London', 'UK', 'SL09 2ET');";

        $student3 = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) 
        VALUES ('20000003', '" . password_hash("test", PASSWORD_DEFAULT) . "', '2000-12-31', 'Leo', 'McGyver', '4 Liverpool Street', 'Slough', 'London', 'UK', 'SL09 2ET');";

        $student4 = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) 
        VALUES ('20000004', '" . password_hash("test", PASSWORD_DEFAULT) . "', '2002-08-09', 'Catherine', 'Janeway', '50 Regent Street', 'Slough', 'London', 'UK', 'SL09 2ET');";

        $student5 = "INSERT INTO `student` (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`) 
        VALUES ('20000005', '" . password_hash("test", PASSWORD_DEFAULT) . "', '2006-09-06', 'James', 'Kirk', '58 Oxford Street', 'Slough', 'London', 'UK', 'SL09 2ET');";
                

        // Check if the query has only the initial student configured
        if(mysqli_num_rows($result) == 1 && $row['studentid'] == 20000000)
        {
            mysqli_query($conn,$student1);
            mysqli_query($conn,$student2);
            mysqli_query($conn,$student3);
            mysqli_query($conn,$student4);
            mysqli_query($conn,$student5);
        }
    }

?>