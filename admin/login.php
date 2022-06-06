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
              <div class="text-center mt-3" onclick="forgot()">
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
