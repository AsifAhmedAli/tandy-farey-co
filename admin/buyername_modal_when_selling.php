        <!-- Modal -->
        <div class="modal show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sell Property</h5>
                <button type="button" class="btn-close" id="clodemodelbu" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form id="buyernameform">
              <div class="mb-3">
              
                <label for="exampleInputEmail1" class="form-label">Buyer Name</label>
                <input type="text" class="form-control" name="buyaahaahname"  required>
                <input type="text" class="form-control" name="projectaiadid" style="visibility:hidden;" value="<?php echo $idofproejctdsfop; ?>">
                <input type="text" class="form-control" name="propertyaida" style="visibility:hidden;" value="<?php echo $idofproperty; ?>">
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              </div>
            </div>
          </div>
        </div>

        <script>
        $('#exampleModal').modal('show');
        $("#buyernameform").submit(function (event) {

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
            document.getElementById("clodemodelbu").click();
            document.getElementById("loader1").style.visibility = "visible";
            $.ajax({
                type: "post",
                data: serializedData,
                url: "controllersoldwithbuyername.php",
                success: function (result) {
                    $("#div1251q4").html(result);
                    document.getElementById("loader1").style.visibility = "hidden";
                }
            });
            });
        </script>";
        