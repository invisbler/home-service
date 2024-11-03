<?php
    include_once "scripts/checklogin.php";
    include_once "include/header.php";
    include_once "scripts/DB.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $stmt = DB::query("SELECT * FROM providers");

    $providers = $stmt->fetchAll(PDO::FETCH_OBJ);

    include_once "msg/managehall.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <title>Admin</title>

</head>

<style>
         .nav-link {
            color: black ;
        }

        .container a {
            color: black;
        }

        .container a:hover {
            color: blue;
      
        }

        #provider{
            color:white;
            background-color:black;
        }
        
    </style>

<body style="background-color:#fafafa; color:black  ;">
    


<div class="container d-flex">
        <?php if (!isset($_SESSION['user'])): ?>
     

        <?php elseif ($_SESSION['user']->name == 'admin'): ?>
        <a class="nav-link" href="managehall.php" id="provider">Manage Providers</a>
        <a class="nav-link" href="admin.php" id="booking">Manage Booking</a>
        <a class="nav-link" href="logout.php" id="logout">Log Out</a>

        <?php else: ?>
        <a class="nav-link" href="logout.php">Log Out</a>
        <?php endif; ?>

    </div>

<div class="container bg-dark" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th>Photo</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Profession</th>
                <th>Action</th>
            </tr>
            <?php foreach ($providers as $provider): ?>
            <tr>
                <td>
                    <img style="height: 150px"
                        src="storage/<?= $provider->photo; ?>"
                        alt="photo">
                </td>
                <td><?= $provider->name; ?>
                </td>
                <td><?= $provider->contact; ?>
                </td>
                <td>
                    <?= $provider->adder1; ?>,<br>
                    <?= $provider->adder2 ?>,<br>
                    <?= $provider->city; ?>
                </td>
                <td><?= $provider->profession; ?>
                </td>
                <td>
                    <form action="deletehall.php" method="post">
                        <input type="hidden" name="id"
                            value="<?= $provider->id ;?>">
                        <button type="submit" name="remove" class="btn btn-danger btn-block">Remove</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include_once "include/footer.php";
