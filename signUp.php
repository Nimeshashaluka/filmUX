<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="signUp&in.css" />
    <link rel="icon" href="images/FUX.png" />

    <title>Sign Up Page</title>
</head>

<body class="body-img">

    <div class="col-12 d-none"style="position: absolute;display:flex; align-items: end; justify-content: end;" id="msgdiv">
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert" id="msg">
               
            </div>
        </div>

    </div>

    <section class="vh-100 gradient-custom">
        <div class="container py-3 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">

                    <div class="card border-1 border-danger text-light "
                        style="border-radius: 1rem; background-color: rgba(0, 0, 0, 0.8);">
                        <div class="card-body p-5 text-center">

                            <div class="pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">SIGN UP</h2>
                                <p class="text-white-50 mb-5">Please Create Your Account!</p>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <input type="text" id="fname" class="form-control form-control-sm"
                                        placeholder="First Name" />

                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <input type="text" id="lname" class="form-control form-control-sm"
                                        placeholder="Last Name" />

                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <input type="email" id="email" class="form-control form-control-sm"
                                        placeholder="Email" />

                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <input type="password" id="password" class="form-control form-control-sm"
                                        placeholder="Password" />

                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-3">
                                    <input type="text" id="mobile" class="form-control form-control-sm"
                                        placeholder="Mobile" />

                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-outline-danger btn-lg px-5 mt-1" type="submit"
                                    onclick="signUp();">SignUp</button>



                            </div>

                            <div>
                                <p class="mb-0">Do you already have an account? <a href="signIn.php"
                                        class="text-white-50 fw-bold">Sign In</a>
                                </p>
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