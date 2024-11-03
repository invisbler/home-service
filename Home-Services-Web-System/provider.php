<?php
include_once "scripts/checklogin.php";
include_once "include/header.php";

if (!check()) {
    header('Location: logout.php');
    exit();
}

$provider = $_SESSION['user'];

$cities = ["Kalmunai", "Saindhamaruthu", "Maruthamunai", "Kathankudi", "Akkaraippatru",];
?>
<body style="background-color: #fafafa;">
    
</body>
<div class="container" style="margin-top: 30px; margin-bottom: 60px;">
    <div class="card bg-dark">
    <div style="margin:0;">
                <a href="orders.php" class="btn btn-danger  btn-flex">View your Orders</a>
            </div>
        <div class="card-body">
        
            <div class="card-title">
                <h3 class="text-center text-white">View Orders & Update Information</h3>
            </div>
            <hr>

            <form action="scripts/updatehall.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input value="<?= $provider->name; ?>" id="name"
                        name="name" type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input value="<?= $provider->contact; ?>"
                        id="contact" name="contact" type="text" class="form-control" placeholder="Contact"
                        minlength="10" maxlength="10" required>
                </div>

                <div class="form-group">
                    <input value="<?= $provider->adder1; ?>"
                        id="adder1" name="adder1" type="text" class="form-control" placeholder="Enter Address line-1"
                        required>
                </div>  

                <div class="form-group">
                    <label for="">City</label>
                    <select value="<?= $provider->city; ?>"
                        class="form-control" name="city" id="city">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city ?>"> <?= $city ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-2 text-center">
                            <img style=" height: 100px;"
                                src="storage/<?= $provider->photo; ?>">
                            <div class="text-center">Old Photo</div>
                        </div>
                        <div class="col">
                            <label for="">New Photo</label>
                            <input id="photo" name="photo" type="file" class="form-control-file"
                                placeholder="Select Photo 1" required>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 15px;">
                    <label for="">Description</label>
                    <textarea name="descr" id="descr" class="form-control" cols="30" rows="5"
                        placeholder="Add Discription About Your Hall"
                        required><?= $provider->descr; ?></textarea>
                </div>

                <div class="form-group">
                    <input value="<?= $provider->password; ?>"
                        id="password" name="password" type="password" class="form-control"
                        placeholder="Enter 6 Charectar Password" minlength="4" required>
                </div>

                <div class="form-group">
                    <select class="form-control" name="profession" id="profession">
                        <option value="electrician">Electrician</option>
                        <option value="plumber">Plumber</option>
                        <option value="mobile">Mobile Repairer</option>
                    </select>
                </div>

                <button style="margin-top: 20px;" class="btn btn-success btn-block" type="submit" name="register"
                    id="register">Update</button>
             
            </form>

        </div>
    </div>
</div>

<?php include_once "./include/footer.php";
