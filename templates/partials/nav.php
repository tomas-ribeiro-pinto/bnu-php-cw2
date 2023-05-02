<?php

global $conn;

$sql = "SELECT * FROM student WHERE studentid='" . $_SESSION['id'] . "';";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$name = $row['firstname'];
$is_admin = $row['is_admin'];
$id = $row['studentid'];
?>

<div style="font-size:1.3em;" class="d-flex h-100" id="wrapper">
        <nav class="p-4 navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-dark p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="index.php">
                    <div class="sidebar-brand-icon"><svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-fill">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                        </svg></div>
                    <div class="sidebar-brand-text"><span>Student Centre</span></div>
                </a>
                <hr class="sidebar-divider my-2">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="modules.php"><i class="fas fa-tachometer-alt mx-2"></i><span>Dashboard</span></a></li>
                    <?php 
                        if($is_admin)
                        {
                            echo "<li class='nav-item'><a class='nav-link' href='students.php'><i class='fas fa-list mx-2'></i></i><span>All Students</span></a></li>";
                            echo "<li class='nav-item'><a class='nav-link' href='addstudent.php'><i class='fas fa-folder-plus mx-2'></i></i><span>Add Student</span></a></li>";
                        }
                    ?>
                    <li class="nav-item"><a class="nav-link" href="assignmodule.php"><i class="fas fa-table mx-2"></i><span>Assign Module</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="details.php"><i class="fas fa-user mx-2"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-arrow-left mx-2"></i><span>Logout</span></a></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="w-100 d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="text-dark" style="margin-right: 0.5em;">Hello <?php echo $name ?>!</span><?php echo "<img class='border rounded-circle' src='templates/getjpg.php?id=" . $id . "'style='height:35px; width:35px;'></a>";?>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="details.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
