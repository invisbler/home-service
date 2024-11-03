
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Online Home Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Arial', sans-serif;
    }

    /* Sidebar Styles */
    #sidebar-wrapper {
      min-height: 100vh;
      margin-left: -250px;
      transition: margin 0.25s ease-out;
      background-color: white;
    }

    #sidebar-wrapper .list-group {
      width: 250px;
    }

    #page-content-wrapper {
      min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
      margin-left: 0;
    }

    .list-group-item {
      background-color: white;
      color: black;
      border: none;
    }

    .list-group-item:hover {
      background-color: black;
      color: white;
    }

    .about-section {
      padding: 60px 20px;
    }

    .about-section h2 {
      font-size: 36px;
      font-weight: bold;
    }

    .about-section p {
      font-size: 18px;
      line-height: 1.6;
    }

    .highlight {
      color: #fd7e14;
    }

    /* Responsive layout */
    @media (min-width: 768px) {
      #page-content-wrapper {
        min-width: 0;
        width: 100%;
      }
      #sidebar-wrapper {
        margin-left: 0;
      }
    }

    .toggle-btn {
      position: relative;
      top: 20px;
      left: 15px;
      z-index: 1;
    }

  </style>
</head>
<body>

  <div class="d-flex" id="wrapper">
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
    <div id="page-content-wrapper">
      <button class="btn btn-dark toggle-btn" id="menu-toggle" style="font-family:Verdana, Geneva, Tahoma, sans-serif;">☰ Home Service</button>
      <section class="about-section text-center">
        <div class="container">
          <h2>About Us</h2>
          <p class="mt-4">Welcome to <span class="highlight">Online Home Service</span>, your go-to solution for all your home maintenance and improvement needs. Our mission is to provide top-quality service with a focus on <span class="highlight">reliability, professionalism</span>, and customer satisfaction.</p>
          <p>With years of experience in the industry, we understand the importance of having a reliable partner to handle your home service needs. Whether it's plumbing, electrical work, cleaning, or any other home service, our team of skilled professionals is here to ensure your home is in the best hands.</p>
          <p>At Online Home Service, we pride ourselves on our commitment to excellence. We carefully vet all our service providers to ensure they meet our high standards, so you can have peace of mind knowing that the job will be done right the first time.</p>
        </div>
      </section>
    </div>
  </div>

  <!-- Bootstrap and JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Toggle the sidebar menu
    var toggleButton = document.getElementById("menu-toggle");
    var wrapper = document.getElementById("wrapper");
    
    toggleButton.addEventListener("click", function () {
      wrapper.classList.toggle("toggled");
    });
  </script>
</body>
</html>
