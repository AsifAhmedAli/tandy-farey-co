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
        <?php
         if(trim(basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING'])) == "edit-property.php"){
           ?>
          <a href="./properties.php?id=<?php echo $id; ?>" class="btn fs-18" id="back_to_page">
            <span class="material-icons">arrow_back</span>
            Back
          </a>
           <?php
         }
        ?>
        <ul class="list-unstyled mb-0 ps-0 sidebar-items">
          <li>
            <a href="./project-overview.php?id=<?php echo $id; ?>" class="sidebar-item">
              <span class="material-icons">summarize</span>
              Overview
            </a>
          </li>
          <li>
            <a href="./matrix.php?id=<?php echo $id; ?>" class="sidebar-item">
              <span class="material-icons">widgets</span>
              Price Matrix
            </a>
          </li>
          <li>
            <a href="./properties.php?id=<?php echo $id; ?>" class="sidebar-item">
              <span class="material-icons">holiday_village</span>
              Properties
            </a>
          </li>
          <li>
            <div class="dropdown">
              <button class="sidebar-item dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="material-icons">description</span>
                Documents
              </button>
              <ul class="list-unstyled ps-0 mb-0 dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li class="dropdown-item">
                  <a href="documents-floorPlans.php?id=<?php echo $id; ?>">Floor Plans</a>
                </li>
                <li class="dropdown-item">
                  <a href="documents-brochure.php?id=<?php echo $id; ?>">Brochure</a>
                </li>
                <li class="dropdown-item">
                  <a href="./documents-floorPlates.php?id=<?php echo $id; ?>">FloorPlates</a>
                </li>
                <li class="dropdown-item">
                  <a href="./documents-images.php?id=<?php echo $id; ?>">Images</a>
                </li>
                <li class="dropdown-item">
                  <a href="./documents-fixtures.php?id=<?php echo $id; ?>">Fixtures & Finishes</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="./videos.php?id=<?php echo $id; ?>" class="sidebar-item">
              <span class="material-icons">video_library</span>
              Videos
            </a>
          </li>
          <li>
            <a href="./map.php?id=<?php echo $id; ?>" class="sidebar-item">
              <span class="material-icons">place</span>
              Map
            </a>
          </li>
        </ul>
      </aside>