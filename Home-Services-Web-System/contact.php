<?php
include_once "./include/header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #fafafa;
        
        }
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
       
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .contact-form h2 {
            margin-bottom: 20px;
            color: white;
            text-align: center;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .btn-primary {
            background-color: #14c440;
            border-color: #15c440;
        }
        .btn-primary:hover {
            background-color: #14b43c;
            border-color: #14c440;
        }
    </style>
</head>
<body>


    

    <div class="container">
        <div class="contact-form bg-dark">
            <h2>Contact Us</h2>
            <div id="form-message" class="alert" role="alert" style="display: none;"></div>
            <form id="contactForm" method="post" action="contact.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Sender Email"  value="Homeservices@gmail.com" disabled>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Enter Your Message" required></textarea>
                </div>
                <button style="margin-top: 30px;" class="btn btn-block btn-success" type="submit" name="login"
                id="login">Submit</button>            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'contact.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#form-message').removeClass('alert-danger').addClass('alert-success').text('Your message has been sent successfully!').show();
                    },
                    error: function() {
                        $('#form-message').removeClass('alert-success').addClass('alert-danger').text('There was an error sending your message. Please try again later.').show();
                        
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php include_once "./include/footer.php";
