<?php require_once "scripts/session.php"; ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
     <link rel="stylesheet" href="css/styles.css">

</head>
<body>



 <style>
        nav a.nav-link {
            color: #fff !important;
        }
        h1,p {
            color: black !important;
        }
        .list-group-item:hover {
        background-color: black;
        color: white;
}
    </style>

    <title>Home Services</title>
</head>

<body>
    <!-- <nav class="nav bg-dark">
        <?php if (!isset($_SESSION['user'])): ?>
        <a class="nav-link active" href="index.php">Find Service</a>
        <a class="nav-link" href="login.php">Login</a>
        <a class="nav-link" href="register.php">Register Service Provider</a>
        <a class="nav-link" href="about.php">About</a>

        <?php elseif ($_SESSION['user']->name == 'admin'): ?>
        <a class="nav-link" href="managehall.php">Manage Providers</a>
        <a class="nav-link" href="admin.php">Manage Booking</a>
        <a class="nav-link" href="logout.php">Log Out</a>

        <?php else: ?>
        <a class="nav-link" href="logout.php">Log Out</a>
        <?php endif; ?>

    </nav> 
   -->


    <div id="wrapper">
        <!-- Sidebar -->

        <div id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        
        <a href="index.php" class="list-group-item list-group-item-action py-3">Find Service</a>
        <a href="login.php" class="list-group-item list-group-item-action py-3">Login</a>
        <a href="register.php" class="list-group-item list-group-item-action py-3">Register Service Provider</a>
        <a href="about.php" class="list-group-item list-group-item-action py-3">About</a>
        <a href="contact.php" class="list-group-item list-group-item-action py-3">Contact</a>
      </div>
    </div>
 
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper"  >
            <button class="btn btn-toggle  bg-dark text-white" id="menu-toggle" style="font-family:Verdana, Geneva, Tahoma, sans-serif; border-color:white;">☰ Home Service</button>
            <div class="container">
                <h1 class="mt-4">Home Service</h1>
                <p>Book your online home services</p>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->




    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>
</html>


