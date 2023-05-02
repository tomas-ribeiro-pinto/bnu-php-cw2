<?php
    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");

    global $conn;

    echo template("templates/partials/header.php");

    if(isset($_SESSION['id']))
    {
        echo template("templates/partials/header.php");
        echo template("templates/partials/nav.php");
     
        echo "<div class='container-fluid'>
        <div class='d-sm-flex justify-content-between align-items-center mb-4'>
           <h2 class='text-dark mb-0'>Profile Details</h2>
        </div>
        <div class='row'>
           <div style='height:auto;' class='col-lg-10 mb-4 overflow-auto'>";

        $student = mysqli_query($conn, "SELECT is_admin FROM student where studentid='" . $_SESSION['id'] . "';");
        $details = mysqli_fetch_assoc($student);

        if(!$details['is_admin'])
        {
            header("Location: modules.php");
        }

        $sql = "select * from student where is_admin = 0;";
        $result = mysqli_query($conn,$sql);

        echo "<div class='col-12 p-4 m-auto'>";
        echo "<form action='delete_student.php' method='post'>";
        echo "<table class='table'>";
        echo "<thead class='bg-dark text-light'><tr><th></th><th scope='col'>Student Name</th><th scope='col'>ID</th><th scope='col'>DOB</th><th scope='col'>Address</th></tr></thead>";
        while($row = mysqli_fetch_assoc($result))
        {
            $student = createStudent($row);
            echo "<tbody><tr><td><input type='checkbox' value='" . $student->id . "' name='students[]'></td><td>" . $student->name ."</td><td>" . $student->id . "</td><td>" 
            . $student->dob . "</td><td>" . $student->address . "</td></tr></tbody>";
        }
        echo "</table><input class='btn btn-danger' style='font-size:0.7em;' type='submit' name='submit' value='Delete Selected' />";
        echo "</form></div>";
        echo "</div></div></div></div></div></div>";
        }

        echo template("templates/partials/footer.php");

?>