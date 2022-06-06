
<?php
include("./admin_header.php");
?>

    <main>
<?php
include("./properties_sidebar.php");
?>
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
                src="./assets/images/pictures/matrix-default-carousel-img.png"
                class="d-block w-100"
                alt=""
              />
            </div>
            <div class="carousel-item">
              <img
                src="./assets/images/pictures/matrix-default-carousel-img.png"
                class="d-block w-100"
                alt=""
              />
            </div>
            <div class="carousel-item">
              <img
                src="./assets/images/pictures/matrix-default-carousel-img.png"
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
        <div class="d-flex align-items-center justify-content-between flex-wrap">
          <h5 class="fs-28 fw-normal mt-4 mb-3">
            Matrix
            <span class="fs-18"> (0 properties) </span>
          </h5>
          <div class="row g-3">
            <div class="col-6">
              <div class="position-relative">
                <input
                  type="text"
                  class="form-control border border-dark rounded px-3"
                  placeholder="Search"
                />
                <p
                  class="fs-5 position-absolute mb-0 end-0 top-50"
                  style="transform: translate(-50%, -50%)"
                >
                  <span class="material-icons"> search </span>
                </p>
              </div>
            </div>
            <div class="col-6">
              <div class="btn-group dropup w-100">
                <button
                  class="
                    form-control
                    border border-dark
                    rounded
                    px-3
                    text-start text-secondary
                  "
                  type="button"
                  id="dropdownMenuClickableInside"
                  data-bs-toggle="dropdown"
                  data-bs-auto-close="outside"
                  aria-expanded="false"
                >
                  Filter
                </button>
                <div
                  class="
                    dropdown-menu
                    filter-dropdown-menu
                    shadow-lg
                    rounded
                    overflow-hidden
                  "
                  aria-labelledby="dropdownMenuButton1"
                >
                  <div class="container-fluid py-4">
                    <div class="row g-4">
                      <div class="col-md-6">
                        <div>
                          <table
                            class="table table-bordered"
                            style="table-layout: fixed"
                          >
                            <thead>
                              <tr style="border-top: none">
                                <th class="py-0 border-0">
                                  <h5 class="fs-28 fw-normal mt-4 mb-3">
                                    Beds
                                  </h5>
                                </th>
                                <th class="py-0 border-0">
                                  <h5 class="fs-28 fw-normal mt-4 mb-3">
                                    Price
                                  </h5>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      1 Bed 1 Bath 1 Cars
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      300K - 500K
                                    </label>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      checked
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      2 Bed 1 Bath 1 Cars
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      checked
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      501K - 800K
                                    </label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      2 Bed 2 Bath 1 Cars
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      300K - 500K
                                    </label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      readonly
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      1 Bed 1 Bath 1 Cars
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      readonly
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      300K - 500K
                                    </label>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      readonly
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      1 Bed 1 Bath 1 Cars
                                    </label>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-check">
                                    <input
                                      class="form-check-input"
                                      type="checkbox"
                                      id="formCheck1"
                                      value=""
                                      readonly
                                    />
                                    <label
                                      class="form-check-label"
                                      for="formCheck1"
                                    >
                                      300K - 500K
                                    </label>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="row g-4">
                          <div class="col-12">
                            <h5 class="fs-28 fw-normal mt-4 mb-3">Aspect</h5>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                id="formCheck1"
                                value=""
                              />
                            </div>
                          </div>
                          <div class="col-12">
                            <h5 class="fs-28 fw-normal mt-4 mb-3">Status</h5>
                            <div class="row g-4">
                              <div class="col-12">
                                <div class="form-check">
                                  <input
                                    class="
                                      form-check-input
                                      bg-white
                                      border-secondary
                                    "
                                    type="checkbox"
                                    readonly
                                  />
                                  <label class="form-check-label">
                                    Available
                                  </label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-check">
                                  <input
                                    class="
                                      form-check-input
                                      bg-warning
                                      border-secondary
                                    "
                                    type="checkbox"
                                    readonly
                                  />
                                  <label class="form-check-label">
                                    501K - 800Held
                                  </label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-check">
                                  <input
                                    class="form-check-input border-secondary"
                                    type="checkbox"
                                    style="background-color: #a9c2b6"
                                    readonly
                                  />
                                  <label class="form-check-label">
                                    Has Deposit
                                  </label>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-check">
                                  <input
                                    class="form-check-input border-secondary"
                                    type="checkbox"
                                    style="background-color: #c4d69d"
                                    readonly
                                  />
                                  <label class="form-check-label">
                                    Unconditional
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <h5 class="fs-28 fw-normal mt-4 mb-3">Agent</h5>
                        <form action="">
                          <div class="row">
                            <div class="col-12">
                              <input
                                type="text"
                                class="form-control form-control2 rounded-0"
                                placeholder="Search Agent"
                              />
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr />
        <div class="my-5">
          <div class="text-center">
            <img
              src="./assets/images/icons/import-file-icon.png"
              class="mb-4"
              width="48"
              height="48"
              alt=""
            />
            <h5 class="fs-25 mb-2 opacity-50">No Properties available</h5>
            <p class="mb-3 opacity-50">
              Your project doesn’t have any properties yet.
              <br />
              Import the file today.
            </p>
            <button class="btn btn-lg btn-primary">
              <span class="material-icons">upload</span>
              Import File
            </button>
          </div>
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
