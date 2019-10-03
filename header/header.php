<?php if(!isset($_SESSION)){session_start();}
   if(!isset($_SESSION['username'])) {?>
<script>document.location.href="login.php"</script>
<?php }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>DGPS IT System Management</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Our Custom CSS -->
      <link rel="stylesheet" href="style.css">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
   </head>
   <body>
      <div class="wrapper">
      <!-- Sidebar  -->
      <?php if($_SESSION['type']=='admin'){ ?>
      <nav id="sidebar" class="wedoo">
         <div class="sidebar-header">
            <h3>DGPS IT System Management</h3>
         </div>
         <ul class="list-unstyled components">
            <!--<p>IT Department</p> -->
            <li>
               <a href="dashboard.php">Dashboard</a>
            </li>
           
            <li>
               <a href="profile.php">Profile</a>
            </li>
            <!--<li>
               <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ticket Creation</a>
               <ul class="collapse list-unstyled" id="pageSubmenu">
                   <li>
                       <a href="problemticket.php">Problem Ticket</a>
                   </li>
                   <li>
                       <a href="changeticket.php">Change Ticket</a>
                   </li>
                   <li>
                       <a href="incidentticket.php">Incident Ticket</a>
                   </li>
                                  </ul>
               </li> -->
            <li>
               <a href="adduser.php">Add User</a>
            </li>
            <li>
               <a href="incident.php">Create Ticket</a>
            </li>
           <li>
               <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Report</a>
               <ul class="collapse list-unstyled" id="pageSubmenu">
                   <li>
                       <a href="report.php">Category Report</a>
                   </li>
                   <li>
                       <a href="report3.php">All Teacher Report</a>
                   </li>
                   <li>
                       <a href="report1.php">Technician Report</a>
                   </li>
               </ul>
               </li>
         <!--  <li>
               <a href="report.php">Report</a>
            </li>--->
         </ul>
      </nav>
      <?php } ?>
      <?php if($_SESSION['type']=='primary' ||$_SESSION['type']=='secondary' || $_SESSION['type']=='admin1'){ ?>
      <nav id="sidebar">
         <div class="sidebar-header">
            <h3>DGPS IT System Management</h3>
         </div>
         <ul class="list-unstyled components">
            <!--<p>IT Department</p> -->
            <li>
               <a href="index.php">Dashboard</a>
            </li>
            <!--<li>
               <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
               <ul class="collapse list-unstyled" id="pageSubmenu">
                   <li>
                       <a href="#">Page 1</a>
                   </li>
                   <li>
                       <a href="#">Page 2</a>
                   </li>
                   <li>
                       <a href="#">Page 3</a>
                   </li>
               </ul>
               </li>-->
            <li>
               <a href="profile.php">Profile</a>
            </li>
            <li>
               <a href="">TroubleShoot Document</a>
            </li>
         </ul>
      </nav>
      <?php } ?>
      <!-- Page Content  -->
      <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span></span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="nav navbar-nav ml-auto">
                  <li class="nav-item active">
                     <p class="nav-link">Welcome <?php echo $_SESSION['name']; ?></p>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="logout.php"><i class="fa fa-power-off fa-2x"></i></a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <br>