<?php
    include("_includes/config.inc");
    include("_includes/dbconnect.inc");
    include("_includes/functions.inc");

    global $conn;

    echo template("templates/partials/header.php");

    $sql = "select * from student;";
    $result = mysqli_query($conn,$sql);

    echo "<div class='col-10 p-4 m-auto'>";
    echo "<form action='delete_student.php' method='post'>";
    echo "<table class='table'>";
    echo "<thead class='bg-dark text-light'><tr><th></th><th scope='col'>Student Name</th><th scope='col'>ID</th><th scope='col'>DOB</th><th scope='col'>Address</th></tr></thead>";
    while($row = mysqli_fetch_assoc($result))
    {
        $student = createStudent($row);
        echo "<tbody><tr><td><input type='checkbox' value='" . $student->id . "' name='students[]'></td><td>" . $student->name ."</td><td>" . $student->id . "</td><td>" 
        . $student->dob . "</td><td>" . $student->address . "</td></tr></tbody>";
    }
    echo "</table><input type='submit' name='submit' value='Delete Selected' />";
    echo "</form></div>";

    echo template("templates/partials/footer.php");

?>