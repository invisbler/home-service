<?php
include_once "./include/header.php";
include_once "./scripts/DB.php";

// Fetch all bookings
$bookings = DB::query("SELECT * FROM bookings")->fetchAll(PDO::FETCH_OBJ);

// Check if an order has been confirmed
if (isset($_GET['confirm_id'])) {
    $confirm_id = intval($_GET['confirm_id']);
    DB::query("DELETE FROM bookings WHERE id = ?", [$confirm_id]);
    header('Location: orders.php');
    exit();
}
?>
<body style="background-color: #fafafa;">
<div class="container" style="margin-top: 30px;">
    <div class="card bg-dark text-white">
        <div class="card-body">
            <h3 class="text-center">Orders</h3>
            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact No.</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th>Payment</th>
                            <th>Queries</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bookings as $booking): ?>
                            <tr>
                                <td><?= htmlspecialchars($booking->fname); ?></td>
                                <td><?= htmlspecialchars($booking->lname); ?></td>
                                <td><?= htmlspecialchars($booking->contact); ?></td>
                                <td><?= htmlspecialchars($booking->adder); ?></td>
                                <td><?= htmlspecialchars($booking->date); ?></td>
                                <td><?= htmlspecialchars($booking->payment); ?></td>
                                <td><?= htmlspecialchars($booking->queries); ?></td>
                                <td>
                                    <a href="orders.php?confirm_id=<?= $booking->id; ?>" class="btn btn-danger btn-sm">Finish</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once "include/footer.php"; ?>
</body>
