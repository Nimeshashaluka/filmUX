<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="signUp&in.css" />

    <title>Admin Login</title>
</head>

<body class="body-img">

    <div class="col-12 d-none" style="position: absolute;display:flex; align-items: end; justify-content: end;"
        id="msgdiv3">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg3">

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
                                <h2 class="fw-bold mb-2 text-uppercase">Admin Login</h2>
                                <p class="text-white-50 mb-5">Please enter your email and password!</p>

                                <?php

                                $email3 = "";
                                $password3 = "";

                                if (isset($_COOKIE["user_name"])) {
                                    $email3 = $_COOKIE["user_name"];
                                }
                                if (isset($_COOKIE["password"])) {
                                    $password3 = $_COOKIE["password"];
                                }

                                ?>

                                <div data-mdb-input-init class="form-outline form-white">
                                    <input type="email" id="email3" class="form-control form-control-sm"
                                        placeholder="Email" />
                                    <label class="form-label" for="typeEmailX"></label>
                                </div>

                                <div data-mdb-input-init class="form-outline form-white">
                                    <input type="password" id="password3" class="form-control form-control-sm"
                                        placeholder="Password" />
                                    <label class="form-label" for="typePasswordX"></label>
                                </div>

                                <p class="small mb-1 pb-lg-2"><a class="text-white-50" href="#!">Forgot Password?</a>
                                </p>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-danger btn-lg px-5" type="submit"
                                    onclick="adminLogin();">Login</button>

                                    

                            </div>
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