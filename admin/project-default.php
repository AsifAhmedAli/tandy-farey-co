<?php
include("./admin_header.php");
?>

    <main>
      <aside>
        <div
          class="
            d-xl-none d-flex
            align-items-center
            justify-content-between
            py-1
            border-bottom
          "
        >
          <h5 class="fs-28 text-primary">Menu</h5>
          <button class="btn fs-28 p-0 text-primary" id="hide-sidebar-btn">
            <span class="material-icons">arrow_back</span>
          </button>
        </div>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li>
            <a href="" class="sidebar-item">
              <span class="material-icons">summarize</span>
              Overview
            </a>
          </li>
          <li>
            <a href="" class="sidebar-item">
              <span class="material-icons">widgets</span>
              Matrix
            </a>
          </li>
          <li>
            <a href="" class="sidebar-item">
              <span class="material-icons">holiday_village</span>
              Properties
            </a>
          </li>
          <li class="">
            <div class="dropdown">
              <button class="sidebar-item">
                <span class="material-icons">description</span>
                Documents
              </button>
              <ul class="list-unstyled ps-0 mb-0 sidebar-dropdown-list">
                <li class="">
                  <a href="">Floor Plans</a>
                </li>
                <li>
                  <a href="">Brochure</a>
                </li>
                <li>
                  <a href="">FloorPlates</a>
                </li>
                <li>
                  <a href="">Images</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="" class="sidebar-item">
              <span class="material-icons">video_library</span>
              Videos
            </a>
          </li>
          <li>
            <a href="" class="sidebar-item">
              <span class="material-icons">place</span>
              Map
            </a>
          </li>
        </ul>
      </aside>
      <div class="content">
        <h1 class="mainUserText">George Street</h1>
        <p class="fs-20 mb-3">363 George Street, Fitzroy VIC</p>

        <div
          id="carouselExampleControls"
          class="carousel slide"
          data-bs-ride="carousel"
        >
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="./assets/images/pictures/carousel-img.png"
                class="d-block w-100"
                alt=""
              />
            </div>
            <div class="carousel-item">
              <img
                src="./assets/images/pictures/carousel-img.png"
                class="d-block w-100"
                alt=""
              />
            </div>
            <div class="carousel-item">
              <img
                src="./assets/images/pictures/carousel-img.png"
                class="d-block w-100"
                alt=""
              />
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleControls"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleControls"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>

        <h5 class="fs-28 fw-normal mt-4 mb-3">Welcome to your new project!</h5>
        <p class="fs-20 mb-5" style="line-height: 40px">
          Below is an example document to get started with when getting your
          properties up and going.
          <br />
          Once your project has some properties this page will disappear.
        </p>
        <h5 class="fs-28 fw-normal mt-4 mb-3">Example Document</h5>
        <div class="table-responsive">
          <table class="table">
            <thead class="text-uppercase">
              <tr>
                <th scope="col">Document Name</th>
                <th scope="col" class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody class="fs-14">
              <tr>
                <td>
                  <img
                    src="./assets/images/icons/xls-icon.png"
                    width="52"
                    height="52"
                    class="d-inline-block me-3"
                    alt="Image"
                  />
                  Example Properties Spreadsheet Export
                </td>
                <td class="text-end">
                  <button class="btn btn-lg opacity-50">
                    <span class="material-icons"> more_vert </span>
                  </button>
                </td>
              </tr>
              <tr>
                <td>
                  <img
                    src="./assets/images/icons/xls-icon.png"
                    width="52"
                    height="52"
                    class="d-inline-block me-3"
                    alt="Image"
                  />
                  Example Properties Spreadsheet Export CSV
                </td>
                <td class="text-end">
                  <button class="btn btn-lg opacity-50">
                    <span class="material-icons"> more_vert </span>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <footer></footer>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>
    <script src="./assets/js/script.js"></script>
  </body>
</html>
