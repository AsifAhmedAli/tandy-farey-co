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
        <a href="./agents.php" class="btn fs-18" id="back_to_page">
          <span class="material-icons">arrow_back</span>
          Back
        </a>
      </aside>
      <div class="content">
        <div class="d-flex align-items-center justify-content-between flex-wrap">
          <h1 class="mainUserText">Project Access</h1>
          <div class="row g-3">
            <div class="col-12">
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
          </div>
        </div>
        <hr />

        <div class="table-responsive">
          <table class="table align-middle">
            <thead class="text-uppercase">
              <tr>
                <th scope="col">Project Name</th>
                <th scope="col" class="text-end">
                  <div class="form-check p-0 mb-0">
                    <label class="form-check-label" for="flexCheckChecked">
                      Access to All
                    </label>
                    <input
                      class="form-check-input float-none ms-2"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked"
                    />
                  </div>
                </th>
              </tr>
            </thead>
            <tbody class="fs-14">
              <tr>
                <td>
                  <img
                    src="./assets/images/icons/building-icon.png"
                    width="52"
                    height="52"
                    class="d-inline-block me-3"
                    alt="Image"
                  />
                  Albero
                </td>
                <td class="text-end">
                  <div
                    class="
                      form-check
                      d-inline-block
                      w-auto
                      dropdown-item
                      p-0
                      mb-0
                    "
                  >
                    <input
                      class="form-check-input float-none ms-2"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked1"
                      checked
                    />
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <img
                    src="./assets/images/icons/building-icon.png"
                    width="52"
                    height="52"
                    class="d-inline-block me-3"
                    alt="Image"
                  />
                  George Street
                </td>
                <td class="text-end">
                  <div
                    class="
                      form-check
                      d-inline-block
                      w-auto
                      dropdown-item
                      p-0
                      mb-0
                      p-0
                      mb-0
                    "
                  >
                    <input
                      class="form-check-input float-none ms-2"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked2"
                    />
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <img
                    src="./assets/images/icons/building-icon.png"
                    width="52"
                    height="52"
                    class="d-inline-block me-3"
                    alt="Image"
                  />
                  Adara
                </td>
                <td class="text-end">
                  <div
                    class="
                      form-check
                      d-inline-block
                      w-auto
                      dropdown-item
                      p-0
                      mb-0
                    "
                  >
                    <input
                      class="form-check-input float-none ms-2"
                      type="checkbox"
                      value=""
                      id="flexCheckChecked3"
                    />
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>

    <footer></footer>

    <!-- Modal -->
    <div
      class="modal fade"
      id="addNewAgent"
      tabindex="-1"
      aria-labelledby="addNewAgentLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <h5 class="fs-28 mb-4">New Agent</h5>
            <form action="">
              <div class="row g-4">
                <div class="col-sm-6">
                  <label for="" class="form-label2">First Name</label>
                  <input type="text" class="form-control form-control2" />
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label2">Last Name</label>
                  <input type="text" class="form-control form-control2" />
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label2">Email</label>
                  <input type="email" class="form-control form-control2" />
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label2">Contact Number</label>
                  <input type="tel" class="form-control form-control2" />
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label2">Password</label>
                  <input type="password" class="form-control form-control2" />
                </div>
                <div class="col-sm-6">
                  <label for="" class="form-label2">Retype Password</label>
                  <input type="password" class="form-control form-control2" />
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-lg" data-bs-dismiss="modal">
              Back
            </button>
            <button type="button" class="btn btn-lg btn-primary px-md-5">
              Save
            </button>
          </div>
        </div>
      </div>
    </div>

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
