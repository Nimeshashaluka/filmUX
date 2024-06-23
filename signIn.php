<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="signUp&in.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Sign In Page</title>
</head>

<body class="body-img">

    <div class="col-12 d-none" style="position: absolute; display:flex; align-items: end; justify-content: end;"
        id="msgdiv2">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg2">

            </div>
        </div>
    </div>

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                    <div class="card border-1 border-danger text-light "
                        style="border-radius: 1rem; background-color: rgba(0, 0, 0, 0.8);">
                        <div class="card-body p-5 text-center">


                            <div class="mb-md-5 mt-md-4 pb-5">
                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }
                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div data-mdb-input-init class="form-outline form-white">
                                    <input type="email" id="email2" class="form-control form-control-sm"
                                        placeholder="Email" />
                                    <label class="form-label" for="typeEmailX"></label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white">
                                    <input type="password" id="password2" class="form-control form-control-sm"
                                        placeholder="Password" />
                                    <label class="form-label" for="typePasswordX"></label>
                                </div>

                                <div class="col-4 col-md-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme" />
                                        <label class="form-check-label text-start text-white-30">Remember Me</label>
                                    </div>
                                </div>

                                <p class="small mb-1 pb-lg-2"><a class="text-white-50" href="#!"
                                        onclick="forgotPassword();">Forgot Password?</a>
                                </p>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-danger btn-lg px-5" type="submit"
                                    onclick="login();">Login</button>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="signUp.php"
                                        class="text-white-50 fw-bold">Sign
                                        Up</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal" tabindex="-1" id="forgotPasswordAlert">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-12">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="tfp"/>
                                        <button class="btn btn-warning" id="ntp" type="button" onclick="showPassword1();">Show</button>
                                    </div>
                                </div>

                                <!-- <div class="col-6">
                                    <label class="form-label">Re-Type Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rePassword"/>
                                        <button class="btn btn-outline-secondary" type="button">Show</button>
                                    </div>
                                </div> -->

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input type="text" class="form-control" id="vecode"/>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="savePassword();">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
</body>

</html>