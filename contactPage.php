<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="signUp&in.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <title>Contact Page</title>
</head>

<body style="background-color: #000000">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <?php include "navBar.php"; ?>


                <div class="col-12 contact-title mt-4 p-2">
                    <h1>Contact</h1>
                </div>
                <div class="col-12 contact-main-box">
                    <!-- <div class="col-12 contact-box"> -->

                    <div class="formcarry-container" id="contact">
                        <form action="https://api.web3forms.com/submit" method="POST" class="formcarry-form">

                            <input type="hidden" name="access_key" value="c730df63-7d3c-4d4b-9fb3-bec78256f437">
                            <label for="name" class="text-light">Full Name</label>
                            <input type="text" id="name" name="fullName" required />

                            <label for="text" class="text-light">Mobile Number</label>
                            <input type="text" id="number" name="Number" required />

                            <label for="email" class="text-light">Email Address</label>
                            <input type="email" id="email" name="email" required />

                            <label for="message" class="text-light">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10"></textarea>

                            <button type="submit">Send</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>


    <script src="script.js"></script>

</body>

</html>