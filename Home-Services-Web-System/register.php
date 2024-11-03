<?php include_once "./include/header.php"; ?>

<?php
$cities = ["Kalmunai", "Saindhamaruthu", "Maruthamunai", "Kathankudi", "Akkaraippatru",];
?>
<?php include_once "msg/register.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

<div class="container" style="margin-top: 30px; max-width: 800px;margin-bottom: 60px;">
    <div class="card  bg-dark">
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center text-white">Register as Service Provider</h3>
            </div>
            <hr>


            <form action="scripts/register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input id="name" name="name" type="text" class="form-control" placeholder="Name" required>
                </div>

                <div class="form-group">
                    <input id="contact"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        name="contact" type="text" class="form-control" placeholder="Phone Number" minlength="10"
                        maxlength="10" required>
                </div>

                <div class="form-group">
                    <input id="adder1" name="adder1" type="text" class="form-control" placeholder="Enter Address"
                        required>
                </div>

                <div class="form-group">
                    <select class="form-control" name="city" id="city">
                        <?php foreach ($cities as $city) : ?>
                        <option value="<?= $city ?>"> <?= $city ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Photo(Square Size)</label>
                    <input id="photo" name="photo" type="file" class="form-control-file" placeholder="Select Photo 1"
                        required>
                </div>

                <div class="form-group">
                    <textarea name="descr" id="descr" class="form-control" cols="30" rows="5"
                        placeholder="Describe about you..." required></textarea>
                </div>

                <div class="form-group">
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Enter 6 Character Password" minlength="4" required>
                </div>

                <div class="form-group">
                    <select class="form-control" name="profession" id="profession">
                        <option value="electrician">Electrician</option>
                        <option value="plumber">Plumber</option>
                        <option value="mobile">Mobile Repairer</option>
                    </select>
                </div>

                <button style="margin-top: 30px;" class="btn btn-block btn-success" type="submit" name="register"
                    id="register">Register</button>
            </form>

        </div>
    </div>
</div>

<?php include_once "./include/footer.php";
