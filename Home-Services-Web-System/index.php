<?php

include_once "./include/header.php";
$cities = ["Kalmunai", "Saindhamaruthu", "Maruthamunai", "Kathankudi", "Akkaraippatru","Badulla","Colombo","kandy","Nuwaraliya","Batticola","Mannar","Polanaruwa"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

    <style>
        h1,p{ font-family:'Segoe UI', Tahoma, Verdana, sans-serif; letter-spacing: 2px;}
        h2{ font-family:Verdana, Geneva, Tahoma, sans-serif; }

        .list-group-item:hover {
            background-color: black;
            color: white;
}

    </style>
</head>

<body style="background-color:#fafafa;">


 <!-- banner -->
 <div class="container">
        <div class="banner mt-4">
            <img src="./images/Banner.png" alt="Banner Image 1" class="active">
            <img src="./images/Banner3.jpg" alt="Banner Image 2">
            <img src="./images/Banner2.webp" alt="Banner Image 3">
        </div>
    </div>

    
<h2 class="text-center text-black" style="margin-top: 20px;">Find providers</h2>



        <!-- City Selection -->
        <div class="container" style="margin-top:20px; margin-bottom: 60px;">
    <div class="row">
        <!-- City Selection -->
        <div class="form-group col-lg-5 col-md-6 col-sm-12 mb-3">
            <label for="city">City</label>
            <select class="form-control bg-dark text-white" name="city" id="city">
                <option value="none">-- Select City --</option>
                <?php foreach ($cities as $city) : ?>
                <option value="<?= $city ?>"> <?= $city ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Profession Selection -->
        <div class="form-group col-lg-5 col-md-6 col-sm-12 mb-3">
            <label for="profession">Who's Required</label>
            <select class="form-control bg-dark text-white" style="" name="profession" id="profession">
                <option value="none">Select Profession</option>
                <option value="electrician">Electrician</option>
                <option value="plumber">Plumber</option>
                <option value="mobile">Mobile Repairer</option>
            </select>
        </div>

        <!-- Search Button -->
        <div class="form-group col-lg-2 col-md-12 col-sm-12 mb-3">
            <label for="">Action</label>
            <button id="search" class="form-control btn btn-success" type="button">Search</button>
        </div>
    </div>

    <!-- Responsive Table -->
    <div class="table-responsive">
        <table id="providers" class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #343a40; color: white;">
               
              
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
       


<!-- Bootstrap Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">Alert</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Don't leave fields empty!
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="okButton" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>



<script>
    document.getElementById('okButton').addEventListener('click', function () {
  location.reload(); // This will refresh the page
});

    $(function() {
        $("#search").click(function() {
            var city = $("#city").val();
            var profession = $("#profession").val();

            if (city == "none" || profession == "none") {
    // Set the message in the modal body if needed (optional, if you want to modify dynamically)
    document.querySelector(".modal-body").innerHTML = "Don't leave fields empty!";
    
    // Show the modal
    var myModal = new bootstrap.Modal(document.getElementById('alertModal'));
    myModal.show();

    // Handle table update
    tbody = "<tr><td colspan='5'>please </td></tr>";
}

            else {
                $.post('scripts/searchproviders.php', {
                    city: city,
                    profession: profession
                }, function(res) {
                    var providers = JSON.parse(res);
                    var tbody = "";

                    if (providers.failed == true) {
                        tbody = "<tr><td colspan='5'>No Service Providers found...</td></tr>";
                    } else {
                        providers.forEach(function(provider, i) {
                            tbody += "<tr>" +
                                "<td><img style='height:150px' src='storage/" + provider
                                .photo +
                                "'/></td>" +
                                "<td>" + provider.name + "</td>" +
                                "<td>" + provider.adder1 + ",<br>" + provider.adder2 +
                                ",<br>" +
                                provider.city + "</td>" +
                                "<td>" + provider.profession + "</td>" +
                                "<td><a href='booking.php?provider=" + provider.id +
                                "' class='btn b_btn btn-success btn-block'>Book</a></td>";
                        });
                    }
                    $("#providers tbody").html(tbody);
                });
            }
        });
    });
</script>

<!-- custom js -->
<script src="js/script.js"></script>
<script src="js/jquery.js"></script>


<?php include_once "./include/footer.php";
