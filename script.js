function signUp() {
  // alert('ok2');

  var f = document.getElementById("fname");
  var l = document.getElementById("lname");
  var e = document.getElementById("email");
  var p = document.getElementById("password");
  var m = document.getElementById("mobile");

  var form = new FormData();
  form.append("f", f.value);
  form.append("l", l.value);
  form.append("e", e.value);
  form.append("p", p.value);
  form.append("m", m.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var text = r.responseText;

      if (text == "Success") {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msg").className = "alert alert-success";
        document.getElementById("msgdiv").className = "d-block";
        setTimeout(() => {
          window.location.reload(true);
          // document.getElementById("msg").innerHTML = "Please LogIn Now";
          // document.getElementById("msg").className = "alert alert-success";
          // document.getElementById("msgdiv").className = "d-block";
        }, 3000);
        // window.location.href = "signIn.php";
      } else {
        document.getElementById("msg").innerHTML = text;
        document.getElementById("msg").className = "alert alert-warning";
        document.getElementById("msgdiv").className = "d-block";
      }
    }
  };

  r.open("POST", "signUpProcess.php", true);
  r.send(form);
}

function login() {
  // alert('ok');
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var rememberme = document.getElementById("rememberme");

  var f = new FormData();
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("rm", rememberme.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var text = r.responseText;
      if (text == "Success") {
        window.location = "index.php";
      } else {
        document.getElementById("msg2").innerHTML = text;
        document.getElementById("msgdiv2").className = "d-block";
      }
    }
  };
  r.open("POST", "signInProcess.php", true);
  r.send(f);
}

var forgotPasswordAlert;

function forgotPassword() {
  // alert("forgot");

  var email = document.getElementById("email2");
  // alert(email);
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      // alert("methan t enwa 1");

      if (response == "Success") {
        alert(
          "Verification Code has Send Successfully. Please Check Your Email."
        );

        // alert("methan t enwa 2");

        var modal = document.getElementById("forgotPasswordAlert");
        forgotPasswordAlert = new bootstrap.Modal(modal);
        forgotPasswordAlert.show();
      } else if (
        response == "Please Enter your Email Address in Email Field."
      ) {
        // alert("methan t enwa 3");

        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-block";
      } else {
        // alert("methan t enwa 4");

        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-block";
      }
    }
  };

  request.open("GET", "forgotPassword.php?e=" + email.value, true);
  request.send();
}
function savePassword() {
  var password = document.getElementById("tfp");
  var Verifi_code = document.getElementById("vecode");

  var form = new FormData();

  form.append("tp", password.value);
  form.append("tc", Verifi_code.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg2").innerHTML =
          "Your Password Reset Successfully";
        document.getElementById("msg2").className = "alert alert-success";
        document.getElementById("msgdiv2").className = "d-block";
        setTimeout(() => {
          window.location.reload(true);
        }, 3000);
      } else {
        document.getElementById("msg2").innerHTML = response;
        document.getElementById("msgdiv2").className = "d-block";
      }
    }
  };

  request.open("POST", "userPasswordReset.php", true);
  request.send(form);
}

function showPassword1() {
  // alert("ok password");
  var textFild = document.getElementById("tfp");
  var button = document.getElementById("ntp");

  if (textFild.type == "password") {
    textFild.type = "text";
    button.innerHTML = "Hide";
  } else {
    textFild.type = "password";
    button.innerHTML = "Show";
  }
}

function blockUser(email) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ub" + email).innerHTML = "Unblock";
        document.getElementById("ub" + email).classList = "btn btn-success";
        window.location.reload(true);
      } else if (txt == "unblocked") {
        document.getElementById("ub" + email).innerHTML = "Block";
        document.getElementById("ub" + email).classList = "btn btn-danger";
        window.location.reload(true);
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "userBlockProcess.php?email=" + email, true);
  request.send();
}

function hideSidebar() {
  // alert("hide");
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "none";
}
function showSidebar() {
  // alert("show");
  const sidebar = document.querySelector(".sidebar");
  sidebar.style.display = "flex";
}
function ViewAllBox() {
  // alert("ok");
  const showBox = document.querySelector(".showBox");
  showBox.style.display = "flex";
}
function upArrow() {
  // alert("ok");
  const showBox = document.querySelector(".showBox");
  showBox.style.display = "none";
}
function CAIViewAllBox() {
  // alert("ok");
  const CAIshowBox = document.querySelector(".CAIshowBox");
  CAIshowBox.style.display = "flex";
}
function CAIupArrow() {
  // alert("ok");
  const CAIshowBox = document.querySelector(".CAIshowBox");
  CAIshowBox.style.display = "none";
}
function NewArrivalBtn() {
  // alert("ok 1");
  window.location.href = "body.php";
}
function ContactBtn() {
  // alert("ok 2");
  window.location.href = "footer.php";
}

function wishlistCh() {
  // alert("ok Wish");
  window.location.href = "wishList.php";
}

function homepageCh() {
  // alert("home al");
  window.location.href = "index.php";
}
function profileCh() {
  // alert('ok us');
  window.location.href = "userAccount.php";
}

function contactPageCh() {
  // alert("ok ct");
  window.location.href = "contactPage.php";
}

function adminDashborad() {
  // alert("admin Dashborad");
  window.location.href = "adminPanle.php";
}
function newFilmAdd() {
  // alert("new add ok");
  window.location.href = "addNewFilm.php";
}

function allUserDetails() {
  // alert("Details ok");
  window.location.href = "allUserDetails.php";
}

function allPaymentDetails() {
  // alert("ok");
  window.location.href = "allPaymentHistory.php";
}

function searchBtn(x) {
  // alert("od");
  var typedText = document.getElementById("search_input");
  var category = document.getElementById("search_select");

  var form = new FormData();
  form.append("typedText", typedText.value);
  form.append("category", category.value);
  form.append("page", x);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // console.log(response);
      // alert(response);
      document.getElementById("searchResult").innerHTML = response;
    }
  };

  request.open("POST", "SearchProcess.php", true);
  request.send(form);
}

function addCamingSoonFilm() {
  // alert("Caming Soon Page");
  window.location.href = "addCamingSoonFilm.php";
}
function allWishList() {
  // alert("Ok wishList");
  window.location.href = "allWishList.php";
}
function allFilm() {
  // alert("all view");
  window.location.href = "allFilmLoad.php";
}
function allCamingSoonFilm() {
  // alert("ok soon");
  window.location.href = "allCamingSoonFilm.php";
}

function addNewFilm() {
  // alert("ok add film");
  var filmNew = document.getElementById("newfilmimg");
  var Title = document.getElementById("title");
  var Price = document.getElementById("price");
  var TextBox = document.getElementById("textb");
  var Date = document.getElementById("date");
  var Category = document.getElementById("category");
  var VideoUrl = document.getElementById("vUrl");
  var FilmVideoUrl = document.getElementById("fvUrl");

  //
  var form = new FormData();
  //
  form.append("t", Title.value);
  form.append("p", Price.value);
  form.append("tb", TextBox.value);
  form.append("dt", Date.value);
  form.append("ct", Category.value);
  form.append("vr", VideoUrl.value);
  form.append("fvr", FilmVideoUrl.value);

  if (filmNew.files.length == 0) {
  } else {
    form.append("filmNew", filmNew.files[0]);
  }

  var request = new XMLHttpRequest();
  // alert("ok 4");

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert("ok 3");
      if (response == "Success") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msg5").className = "alert alert-success";
        document.getElementById("msgdiv5").className = "d-block";
        setTimeout(() => {
          window.location.reload(true);
        }, 3000);
      } else if (
        response ==
        "Film with the same Title or same Release Year already exists."
      ) {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      } else {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      }
    }
  };
  request.open("POST", "addNewFilmProcess.php", true);
  request.send(form);
}

function changeProfileImg() {
  // alert("hari");
  var img = document.getElementById("profileimg");

  img.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    // document.getElementById("img").src = url;
  };
}

function loadMainImg(id) {
  var sample_img = document.getElementById("filmImg" + id).scroll;
  var main_img = document.getElementById("mainImg");

  main_img.style.backgroundImage = "url(" + sample_img + ")";
}
function logOutBt() {
  // alert("done");
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var response = r.responseText;
      if (response == "success") {
        window.location.reload();
      }
    }
  };
  r.open("GET", "siginOutProcess.php", true);
  r.send();
}

function adlogin() {
  // alert('ok');
  var email = document.getElementById("email2");
  // alert('ok2');
  var password = document.getElementById("password2");
  // alert('ok3');
  var rememberme = document.getElementById("rememberme");
  // alert('ok4');

  var f = new FormData();
  // alert('ok5');
  f.append("e", email.value);
  f.append("p", password.value);
  f.append("rm", rememberme.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.status == 200 && r.readyState == 4) {
      var text = r.responseText;
      if (text == "Success") {
        window.location = "adminPanle.php";
      } else {
        document.getElementById("msg3").innerHTML = text;
        document.getElementById("msgdiv3").className = "d-block";
      }
    }
  };
  r.open("POST", "adminLoginProcess.php", true);
  r.send(f);
}

var forgotPasswordAlert2;

function adforgotPassword() {
  var email = document.getElementById("email2");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "Success") {
        alert(
          "Verification Code has Send Successfully. Please Check Your Email."
        );

        var modal = document.getElementById("forgotPasswordAlert");
        forgotPasswordAlert2 = new bootstrap.Modal(modal);
        forgotPasswordAlert2.show();
      } else if (
        response == "Please Enter your Email Address in Email Field."
      ) {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgdiv3").className = "d-block";
      } else {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgdiv3").className = "d-block";
      }
    }
  };

  request.open("GET", "adforgotPassword.php?e=" + email.value, true);
  request.send();
}
function adsavePassword() {
  // alert("ok");

  var password = document.getElementById("tfp");
  var Verifi_code = document.getElementById("vecode");

  var form = new FormData();
  form.append("tp", password.value);
  form.append("tc", Verifi_code.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "Success") {
        document.getElementById("msg3").innerHTML =
          "Your Password Reset Successfully";
        document.getElementById("msg3").className = "alert alert-success";
        document.getElementById("msgdiv3").className = "d-block";
        setTimeout(() => {
          window.location.reload(true);
        }, 3000);
      } else {
        document.getElementById("msg3").innerHTML = response;
        document.getElementById("msgdiv3").className = "d-block";
      }
    }
  };

  request.open("POST", "adPasswordReset.php", true);
  request.send(form);
}

function adshowPassword() {
  // alert("ok password");
  var textFild = document.getElementById("tfp");
  var button = document.getElementById("ntp");

  if (textFild.type == "password") {
    textFild.type = "text";
    button.innerHTML = "Hide";
  } else {
    textFild.type = "password";
    button.innerHTML = "Show";
  }
}

function payNow(id) {
  // alert(id);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);

      var obj = JSON.parse(response);

      var mail = obj["umail"];
      var userid = obj["userid"];
      var amount = obj["amount"];

      if (response == 1) {
        alert("Please Login");
        window.location = "signIn.php";
      } else if (response == 2) {
        alert("Please Create Your Account");
        window.location = "signUp.php";
      } else {
        // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          // Note: validate the payment and show success or failure page to the customer

          alert("Payment Completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, userid);
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
          // Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          // sandbox: true,
          merchant_id: obj["mid"], // Replace your Merchant ID
          return_url: "http://localhost/FilmUX/singleProductView.php?id=" + id, // Important
          cancel_url: "http://localhost/FilmUX/singleProductView.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "USD",
          hash: obj["hash"], // *Replace with generated hash retrieved from backend
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: "No." + obj["address"],
          delivery_city: obj["city"],
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
        // document.getElementById("payhere-payment").onclick = function (e) {
        payhere.startPayment(payment);
        // };
      }
    }
  };

  request.open("GET", "buyNowProcess.php?id=" + id, true);
  request.send();
}

function addToCart(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "Add To Cart") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgdiv4").className = "d-block";
      } else if (response == "Already added to Cart") {
        //kelimm yawann
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };
  request.open("GET", "addToCartProcess.php?id=" + id, true);
  request.send();
}
function addToWishlist(id) {
  // alert('ok');
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "Added") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgdiv4").className = "d-block";
        // window.location.reload();
      } else if (response == "Already added to wishlist") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
        // window.location.reload();
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };
  request.open("GET", "addToWishlistProcess.php?id=" + id, true);
  request.send();
}

// cart remove process

function cartRemove(id) {
  // alert("Ok Remove");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "Remove from Cart Successful") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msg5").className = "alert alert-success";
        document.getElementById("msgdiv5").className = "d-block";
        window.location.reload();
      } else if (response == "This item is not in the cart") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      } else {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      }
    }
  };
  request.open("GET", "removeCart.php?id=" + id, true);
  request.send();
}

function playVideo() {
  // alert("playVideo");
  document.getElementById("poupVideo").className = "d-block";
}

// remove wishlist process

function removeWishList(id) {
  // alert("Remove wishList Ok");
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      if (response == "Remove from WishList Successful") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgdiv4").className = "d-block";
        window.location.reload();
      } else if (response == "This item is not in the WishList") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };

  request.open("GET", "wishListRemove.php?id=" + id, true);
  request.send();
}

// film edit process

function filmEdit(id) {
  // alert(id);
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
      } else if (response == "This film not a database") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };
  request.open("GET", "filmEditProcess.php?id=" + id, true);
  request.send();
}

// add coming soon film on this site

function addNewComingFilm() {
  // alert("Ok Coming soon film");
  var profilm_picture = document.getElementById("img");
  var C_Title = document.getElementById("ctitle");
  var C_Date = document.getElementById("cdate");

  var form = new FormData();

  form.append("ct", C_Title.value);
  form.append("cd", C_Date.value);
  // form.append("filmComingNew", profilm_picture);

  if (profilm_picture.files.length == 0) {
  } else {
    form.append("profilm_picture", profilm_picture.files[0]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    // alert("ok");
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msg5").className = "alert alert-success";
        document.getElementById("msgdiv5").className = "d-block";
      } else if (
        response ==
        "Film with the same Title or same Release Year already exists."
      ) {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      } else {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      }
    }
  };
  request.open("POST", "addCamingSoonFilmProcess.php", true);
  request.send(form);
}

// edit user

function userEdit(uid) {
  // alert("ok");
  var email = document.getElementById("uemail");
  var fname = document.getElementById("ufname");
  var lname = document.getElementById("ulname");
  var password = document.getElementById("upassword");
  var mobile = document.getElementById("unumber");

  var form = new FormData();
  form.append("uemail", email.value);
  form.append("ufname", fname.value);
  form.append("ulanme", lname.value);
  form.append("upassword", password.value);
  form.append("umobile", mobile.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "User details updated successfully") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msg5").className = "alert alert-success";
        document.getElementById("msgdiv5").className = "d-block";
      } else if (request == "Please Try Again") {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      } else {
        document.getElementById("msg5").innerHTML = response;
        document.getElementById("msgdiv5").className = "d-block";
      }
    }
  };

  request.open("POST", "userDetailsUpdate.php?id=" + uid, true);
  request.send(form);
}
//  status block film
function blockFilm(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ub" + id).innerHTML = "Unblock";
        document.getElementById("ub" + id).classList = "btn btn-success";
        window.location.reload(true);
      } else if (txt == "unblocked") {
        document.getElementById("ub" + id).innerHTML = "Block";
        document.getElementById("ub" + id).classList = "btn btn-danger";
        window.location.reload(true);
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "filmBlockProcess.php?id=" + id, true);
  request.send();
}

//  status block coming soon film
function blockComingSoonFilm(id) {
  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var txt = request.responseText;
      if (txt == "blocked") {
        document.getElementById("ub" + id).innerHTML = "Unblock";
        document.getElementById("ub" + id).classList = "btn btn-success";
        window.location.reload(true);
      } else if (txt == "unblocked") {
        document.getElementById("ub" + id).innerHTML = "Block";
        document.getElementById("ub" + id).classList = "btn btn-danger";
        window.location.reload(true);
      } else {
        alert(txt);
      }
    }
  };

  request.open("GET", "filmBlockComingSoon.php?id=" + id, true);
  request.send();
}

// invoice view on tha page

function saveInvoice(OrderId, id, mail, amount, userid) {
  var form = new FormData();
  form.append("o", OrderId);
  form.append("i", id);
  form.append("m", mail);
  form.append("a", amount);
  form.append("ui", userid);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;

      if (response == "Success") {
        window.location = "invoice.php?id=" + OrderId;
      } else {
        alert(response);
      }
    }
  };

  request.open("POST", "saveInvoiceProcess.php", true);
  request.send(form);
}

function viewMyFilm() {
  window.location.href = "myFilm.php";
}
function changeUpdateFilm(id) {
  // alert(id);
  window.location.href = "editFilmDetails.php?id=" + id;
}
function changeComingSoonUpdateFilm(id) {
  // alert(id);
  window.location.href = "editComingSoonFilmDetails.php?id=" + id;
}

// main film update process

function updateFilm() {
  alert("ok1");
  var fid = document.getElementById("id");
  var ftitle = document.getElementById("title");
  var fviewlink = document.getElementById("viewLink");
  var fyear = document.getElementById("date");
  var fprice = document.getElementById("price");
  var fintroV = document.getElementById("introV");
  var fcategory = document.getElementById("select");
  var fdescrip = document.getElementById("descrip");
  var film_picture = document.getElementById("editImage");
  alert("ok2");

  // alert(fid.value);
  // alert(ftitle.value);
  // alert(fviewlink.value);
  // alert(fyear.value);
  // alert(fprice.value);
  // alert(fintroV.value);
  // alert(fcategory.value);
  // alert(fdescrip.value);

  var form = new FormData();
  alert("ok3");

  form.append("fid", fid.value);
  form.append("ft", ftitle.value);
  form.append("fvl", fviewlink.value);
  form.append("fy", fyear.value);
  form.append("fp", fprice.value);
  form.append("fiv", fintroV.value);
  form.append("fc", fcategory.value);
  form.append("fd", fdescrip.value);
  // form.append("uimage", film_picture);
  alert(film_picture.files.length);
  if (film_picture.files.length == 0) {
  } else {
    form.append("uimage", film_picture.files[0]);
    alert("ok5");
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      alert("ok6");

      if (response == "Success") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgdiv4").className = "d-block";
      } else if (request == "Film Update Fail") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };

  request.open("POST", "filmUpdateProcess.php", true);
  request.send(form);
}

// ---------------------------------Another button added to the image upload process------------------------------

// function updateSaveImg() {
//   // alert("ok");
//   var film_picture = document.getElementById("editImage").files[0];
//   var fid = document.getElementById("id");

//   var form = new FormData();
//   form.append("uimage", film_picture);
//   form.append("fid", fid.value);

//   var request = new XMLHttpRequest();
//   request.onreadystatechange = function () {
//     // alert("ok");
//     if (request.status == 200 && request.readyState == 4) {
//       var response = request.responseText;
//       // alert(response);
//       if (response == "Success") {
//         document.getElementById("msg4").innerHTML = response;
//         document.getElementById("msg4").className = "alert alert-success";
//         document.getElementById("msgdiv4").className = "d-block";
//       } else {
//         document.getElementById("msg4").innerHTML = response;
//         document.getElementById("msgdiv4").className = "d-block";
//       }
//     }
//   };
//   request.open("POST", "updateFilmImageProcess.php", true);
//   request.send(form);
// }

// ---------------------------------Another button added to the image upload process------------------------------

// update on to upload coming soon film process
function updateComingFilm() {
  // alert("ok");

  var csid = document.getElementById("cid");
  var cstitle = document.getElementById("ctitle");
  var csdate = document.getElementById("cdate");
  var cseditImage = document.getElementById("editImage");

  var form = new FormData();
  // form.append("fcimg", cseditImage);
  form.append("fcid", csid.value);
  form.append("fctitle", cstitle.value);
  form.append("fcdate", csdate.value);

  if (cseditImage.files.length == 0) {
  } else {
    form.append("cseditImage", cseditImage.files[0]);
  }

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      // alert(response);
      if (response == "Success") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msg4").className = "alert alert-success";
        document.getElementById("msgdiv4").className = "d-block";
      } else if (request == "Film Update Fail") {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      } else {
        document.getElementById("msg4").innerHTML = response;
        document.getElementById("msgdiv4").className = "d-block";
      }
    }
  };

  request.open("POST", "ComingSoonFilmProcess.php", true);
  request.send(form);
}

// admin page in the user table data search
function userSearchBtn() {
  // alert("ok");
  var searchinput = document.getElementById("userSearch");

  var form = new FormData();
  form.append("searchIn", searchinput.value);

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.status == 200 && request.readyState == 4) {
      var response = request.responseText;
      alert("shep");
      // if (response == "Success") {
      // userSearchResult
      // alert("wada");
      document.getElementById("userSearchResult").innerHTML = response;
      // } else {
      //   document.getElementById("msg3").innerHTML = response;
      //   document.getElementById("msgdiv3").className = "d-block";
      // }
    }
  };
  request.open("POST", "adminUserTableSearchProcess.php", true);
  request.send(form);
}
