<?php

  include("../_includes/config.inc");
  include("../_includes/dbconnect.inc");
  
  global $conn;

  $sql = "SELECT firstname FROM student WHERE studentid='" . $_SESSION['id'] . "';";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);

  echo $row['firstname'];
?>
