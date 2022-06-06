<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./assets/css/bootstrap.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
      /* Absolute Center Spinner */
.loading {
  position: fixed;
  z-index: 999;
  height: 2em;
  width: 2em;
  overflow: show;
  margin: auto;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
}
.files input {
  outline: 2px dashed #92b0b3;
  outline-offset: -10px;
  -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
  transition: outline-offset .15s ease-in-out, background-color .15s linear;
  padding: 120px 0px 85px 35%;
  text-align: center !important;
  margin: 0;
  width: 100% !important;
}
.files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
  -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
  transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
}
.files{ position:relative}
.files:after {  pointer-events: none;
  position: absolute;
  top: 60px;
  left: 0;
  width: 50px;
  right: 0;
  height: 56px;
  content: "";
  background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
  display: block;
  margin: 0 auto;
  background-size: 100%;
  background-repeat: no-repeat;
}
.color input{ background-color:#f1f1f1;}
.files:before {
  position: absolute;
  bottom: 10px;
  left: 0;  pointer-events: none;
  width: 100%;
  right: 0;
  height: 57px;
  content: " or drag it here. ";
  display: block;
  margin: 0 auto;
  color: #2ea591;
  font-weight: 600;
  text-transform: capitalize;
  text-align: center;
}
/* Transparent Overlay */
.loading:before {
  content: '';
  display: block;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

  background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
}

/* :not(:required) hides these rules from IE9 and below */
.loading:not(:required) {
  /* hide "loading..." text */
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0;
}

.loading:not(:required):after {
  content: '';
  display: block;
  font-size: 10px;
  width: 1em;
  height: 1em;
  margin-top: -0.5em;
  -webkit-animation: spinner 150ms infinite linear;
  -moz-animation: spinner 150ms infinite linear;
  -ms-animation: spinner 150ms infinite linear;
  -o-animation: spinner 150ms infinite linear;
  animation: spinner 150ms infinite linear;
  border-radius: 0.5em;
  -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
}
      .top {
        height: 50vh;
        background-image: url("./assets/images/squares.png"),
          url("./assets/images/login-bg.png");
        background-position: top 10% center, center center;
        background-repeat: no-repeat, no-repeat;
        background-size: 85%, cover;
        overflow: hidden;
      }

      .form-container {
        max-width: 537px;
        height: 497px;
        margin: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 416px;
        left: 50%;
        transform: translateX(-50%);
        background-color: white;
        width: 100%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      }

      .form-container form {
        max-width: 85%;
        margin: 0 auto;
      }

      .welcome-text {
        position: absolute;
        top: 25%;
        left: 0;
        width: 100%;
      }

      @media screen and (max-width: 1366px) {
        .form-container {
          top: 210px;
          height: 402px;
        }

        .welcome-text{
          top: 15%;
        }
      }

      @media screen and (max-width: 996.67px){
        .form-container{
          height: 422px;
          padding-left: 1rem;
          padding-right: 1rem;
        }
      }
    </style>
  </head>
  <body class="100-vh">
    <header class="bg-white px-5 py-2">
      <img
        src="./assets/images/logo.png"
        width="220px"
        class="img-fluid"
        alt=""
      />
    </header>

    <div class="main">
      <div class="welcome-text text-white text-center">
        <h1 style="font-size: 40px">Welcome</h1>
        <p style="font-size: 1.25rem">Please login to access your account</p>
      </div>
      <div class="top"></div>
      <div class="form-container">
        <h3 class="mb-5 fs-25 fw-semibold">Login</h3>
        <form id="loginform">
          <div class="row g-4">
            <div class="col-12">
              <div class="form-item">
                <input
                  name="email"
                  type="text"
                  class="form-control"
                  placeholder="Email"
                />
                <!-- <label for="">User Name</label> -->
              </div>
            </div>
            <div class="col-12">
              <div class="form-item">
                <input
                  name="password"
                  type="password"
                  class="form-control"
                  placeholder="Password"
                />
                <!-- <label for="">Password</label> -->
              </div>
            </div>
            <div class="col-12 text-start">
              <input
                type="checkbox"
                name=""
                id=""
                class="form-check-input me-1"
              />
              <label for="">Keep me signed in</label>
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary d-block w-100 text-uppercase btn-lg" type="submit"
              >
                Login
              </button>
              <div onclick="forgot()" class="text-center mt-3">
                <a
                  
                  class="text-info text-decoration-none fs-14"
                  >Forget Password?</a
                >
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <button type="button" style="visibility: hidden;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  ..
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
        <button type="button" id="clodemodelbutton" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="forgotpassword">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="forgotpasswordemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          <div id="emailHelp" class="form-text">An email will be sent to your address. <br> We'll never share your email with anyone else.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
  </div>
</div>
<div class="loading" id="loader1" style="visibility: hidden;">Loading&#8230;</div>
    <div id="div11"></div>
    <script>
    var request;

        $("#loginform").submit(function (event) {

            // Prevent default posting of form - put here to work in case of errors
            event.preventDefault();

            // Abort any pending request
            if (request) {
                request.abort();
            }
            // setup some local variables
            var $form = $(this);

            // Let's select and cache all the fields
            var $inputs = $form.find("input, select, button, textarea");

            // Serialize the data in the form
            var serializedData = $form.serialize();
            $.ajax({
                type: "post",
                data: serializedData,
                url: "logincall.php",
                success: function (result) {
                    $("#div11").html(result);
                }
            });
        });
        $("#forgotpassword").submit(function (event) {

          // Prevent default posting of form - put here to work in case of errors
          event.preventDefault();

          // Abort any pending request
          if (request) {
              request.abort();
          }
          // setup some local variables
          var $form = $(this);

          // Let's select and cache all the fields
          var $inputs = $form.find("input, select, button, textarea");

          // Serialize the data in the form
          var serializedData = $form.serialize();
          // close();
          document.getElementById("clodemodelbutton").click();
          document.getElementById("loader1").style.visibility = "visible";
          $.ajax({
              type: "post",
              data: serializedData,
              url: "controllers.php",
              success: function (result) {
                  $("#div11").html(result);
                  document.getElementById("loader1").style.visibility = "hidden";
              }
          });
          });
        function forgot(){
          var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
          myModal.show();
          // var x50 = "x50";
          // $.ajax({
          //       type: "post",
          //       data:{x50:x50},
          //       url: "controller.php",
          //       success: function (result) {
          //           $("#div11").html(result);
          //       }
          //   });
        }
    </script>
  </body>
</html>
