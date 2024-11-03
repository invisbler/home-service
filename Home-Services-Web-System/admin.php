<?php
    include_once "scripts/checklogin.php";
    include_once "scripts/DB.php";
    include_once "include/header.php";

    if (!check("admin")) {
        header('Location: logout.php');
        exit();
    }

    $sql = "SELECT b.*, p.name AS provider_name FROM bookings AS b, providers AS p WHERE b.provider_id = p.id ORDER BY b.date DESC";

    $bookings = DB::query($sql)->fetchAll(PDO::FETCH_OBJ);


    include_once "msg/admin.php";
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
            color:black;
        }
        .container a:hover {
            color:blue;
        }

        

        #booking{
            color:white;
            background-color:black;
        }
        
    </style>

<body style="background-color:#fafafa; color:black !important;">
    


<div class="container d-flex">
        <?php if (!isset($_SESSION['user'])): ?>
     

        <?php elseif ($_SESSION['user']->name == 'admin'): ?>
        <a class="nav-link"  href="managehall.php" id="provider">Manage Providers</a>
        <a class="nav-link" href="admin.php" id="booking">Manage Booking</a>
        <a class="nav-link" href="logout.php" id="logout">Log Out</a>

        <?php else: ?>
        <a class="nav-link" href="logout.php">Log Out</a>
        <?php endif; ?>

    </div>


<div class="container" style="margin-top: 30px; margin-bottom: 60px; color:black">
    <h2 class="text-center"> Bookings </h2>
    <div class="table-responsive">
        <table class="table" style="color: black">
            <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Address</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Queries</th>
                <th>Provider Name</th>
                <th>Action</th>
            </tr>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td>
                    <?= $booking->fname; ?> <?= $booking->lname; ?>
                </td>
                <td>
                    <?= $booking->contact; ?>
                </td>
                <td>
                    <?= $booking->adder; ?>
                </td>
                <td>
                    <?= $booking->date; ?>
                </td>
                <td>
                    <?= $booking->payment; ?>
                </td>
                <td>
                    <?= $booking->queries; ?>
                </td>
                <td>
                    <?= $booking->provider_name; ?>
                </td>
                <td>
                    <a class="btn btn-danger text-white"
                        href="deletebooking.php?id=<?= $booking->id; ?>">Remove</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>

<?php include_once "include/footer.php";
