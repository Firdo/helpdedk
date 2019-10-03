<?php

          include'db/dbconfig.php';

          if(isset($_POST['username']) && isset($_POST['password'])){
          $username=$_POST['username'];
          $password=$_POST['password'];
          $stmt=$con->prepare("SELECT * from login WHERE username=? AND password=?");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$password);
             $stmt->execute();

             $row=$stmt->fetch();
             $user=$row['username'];
             $pass=$row['password'];
             $name=$row['name'];
             $id=$row['id'];
             $type=$row['type'];
             $email=$row['email'];
             $mobile=$row['mobile'];
             if($username==$user && $pass==$password){
              session_start();
              $_SESSION['username']=$user;
              $_SESSION['name']=$name;
              $_SESSION['password']=$pass;
              $_SESSION['type']=$type;
              $_SESSION['id']=$id; 
              $_SESSION['email']=$email; 
              $_SESSION['mobile']=$mobile; 
              ?>
              
            <script>window.location.href='index.php'</script> 
     
        <?php
             }  else{
             ?>
              <script>alert("Please Check your Username and Password !!!");</script>
<?php } }?>

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
   
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<style>
    
    /*
    DEMO STYLE
*/

@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a,
a:hover,
a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}

/* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

.wrapper {
    display: flex;
    width: 100%;
}

#sidebar {
    width: 350px;
    position: fixed;
    top: 0;
    right: 0;
    height: 100vh;
    z-index: 999;
    background: #ff0000;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #ff0000;
}

#sidebar ul.components {
    padding: 20px 0;
    
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 20px;
    font-size: 1.1em;
    display: block;
}

#sidebar ul li a:hover {
    color: #ff0000;
    background: #fff;
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #ff0000;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article,
a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

/* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

#content {
    width: calc(100% - 350px);
    padding: 40px;
    min-height: 100vh;
    transition: all 0.3s;
    position: absolute;
    top: 0;
    left: 0;
    background-color:#f1f1f1;
}

#content.active {
    width: 100%;
}

/* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
    #content {
        width: 100%;
    }
    #content.active {
        width: calc(100% - 250px);
    }
    #sidebarCollapse span {
        display: none;
    }
}

.btn-info {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000;
}

.btn-info:hover{
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000;
}

.box{
 padding-right: 20px;
  margin-bottom: 25px;
  width:100%;
  min-height:150px;  
  border-style:groove;
  border-width: 1px;

  text-align: center;
  justify-content: center;
  box-shadow: 5px 3px #A9A9A9;
}
.box:hover{
  box-shadow: 2px 1.5px #f1f1f1;
}
p{
padding-top:30px;
color:#ff0000;
}
.dept p{
    padding-top:50px;
    text-align: center;
  justify-content: center;
    font-weight:500;
}

.color{
 background-color:#ff0000;
 color:#fff;
}

label{
     color:#ff0000;
}
</style>
<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header"><br>
                <h3>DGPS <br>IT System Management</h3><br><br><br><br>
            </div>
            <div class="container">
            <form method="POST" action="login.php">
                <div class="form-row">
                <input type="text" name="username" class="form-control" placeholder="Username" ></div><br><br>
                <div class="form-row">
                <input type="password" name="password" class="form-control" placeholder="Password"><br></div><br><br>
                <div class="form-row">
                <input type="submit" name="submit" class="form-control"><br>
                </div>
            </form>
            </div>
            
        </nav>

        <!-- Page Content  -->
       
        <div id="content">
             <div class="container">
<div class="row">
          <div class="col-md-4">
              </div>
       <div class="col-md-4">
       <br><br>
       <br><br><br>
         <img style="font-size:165px" src="image/server.png">
        </div>
    <div class="col-md-4">
        </div>
        </div>
</div>
</div>

<!-- Content Ends Here-->

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        
        
        
    </script>
</body>

</html>
                