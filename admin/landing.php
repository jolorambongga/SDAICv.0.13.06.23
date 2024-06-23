<?php
$title = 'Admin - Landing';
$active_landing = 'active';
include_once('header.php');
?>

<body>
  <!-- start wrapper -->
  <div class="my-wrapper">
    <!-- start container fluid -->
    <div class="container-fluid">
      <!-- start label -->
      <div class="row">
        <div class="col-12">
          <h1>Edit Landing Page</h1>
          <button id="" type="button" data-bs-toggle="modal" data-bs-target="#mod_addLanding" class="btn btn-warning w-100">Edit Landing Page</button>
          <pre></pre>
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>About Us</th>
                  <th>About Us Image</th>
                  <th>Main Image</th>
                </tr>
              </thead>
              <tbody id="currentSched">
                <!-- Table rows will be dynamically populated here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- end label -->
      <form id="frm_addLanding">
        <div class="modal fade" id="mod_addLanding" tabindex="-1" aria-labelledby="mod_addLandingLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <!-- start modal header -->
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="mod_addLandingLabel">Edit Landing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- end modal header -->
              <div class="modal-body">
                <!-- start service name -->

                <?php
                include_once('modals/clinic_sched_modal.php');
                ?>

                <!-- about us -->
                <label for="about_us" class="form-label">About Us</label>
                <textarea id="about_us" class="form-control" required></textarea>
                <pre></pre>

                <!-- about us image -->
                <label for="about_us_image" class="form-label">About Us Image</label>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="about_us_image_option" id="about_us_image_url" value="url" required>
                  <label class="form-check-label" for="about_us_image_url">
                    URL
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="about_us_image_option" id="about_us_image_upload" value="upload" required>
                  <label class="form-check-label" for="about_us_image_upload">
                    Upload Image
                  </label>
                </div>
                <div class="input-group mb-3 about-us-image-url" style="display: none;">
                  <input type="url" class="form-control" id="about_us_image_url_input" placeholder="Enter URL" required>
                </div>
                <div class="input-group mb-3 about-us-image-upload" style="display: none;">
                  <input type="file" class="form-control" id="about_us_image_upload_input" required>
                </div>
                <pre></pre>

                <!-- main image -->
                <label for="main_image" class="form-label">Main Image</label>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="main_image_option" id="main_image_url" value="url" required>
                  <label class="form-check-label" for="main_image_url">
                    URL
                  </label>
                </div>
                <div class="form-check mb-3">
                  <input class="form-check-input" type="radio" name="main_image_option" id="main_image_upload" value="upload" required>
                  <label class="form-check-label" for="main_image_upload">
                    Upload Image
                  </label>
                </div>
                <div class="input-group mb-3 main-image-url" style="display: none;">
                  <input type="url" class="form-control" id="main_image_url_input" placeholder="Enter URL" required>
                </div>
                <div class="input-group mb-3 main-image-upload" style="display: none;">
                  <input type="file" class="form-control" id="main_image_upload_input" required>
                </div>
                <pre></pre>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button id="btnSave" type="button" class="btn btn-success">Save Changes</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- end modal -->
    </div>
    <!-- end container fluid -->
  </div>
  <!-- end wrapper -->

  <script type="text/javascript">
    $(document).ready(function(){
      $('input[name="about_us_image_option"]').change(function() {
        if (this.value === 'url') {
          $('.about-us-image-url').show();
          $('.about-us-image-upload').hide();
          $('#about_us_image_upload_input').removeAttr('required');
          $('#about_us_image_url_input').prop('required', true);
        } else if (this.value === 'upload') {
          $('.about-us-image-url').hide();
          $('.about-us-image-upload').show();
          $('#about_us_image_url_input').removeAttr('required');
          $('#about_us_image_upload_input').prop('required', true);
        }
      });

      $('input[name="main_image_option"]').change(function() {
        if (this.value === 'url') {
          $('.main-image-url').show();
          $('.main-image-upload').hide();
          $('#main_image_upload_input').removeAttr('required');
          $('#main_image_url_input').prop('required', true);
        } else if (this.value === 'upload') {
          $('.main-image-url').hide();
          $('.main-image-upload').show();
          $('#main_image_url_input').removeAttr('required');
          $('#main_image_upload_input').prop('required', true);
        }
      });

      $(document).on('click', '#btnSave', function() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: 'handles/landing/create_landing',
          success: function(response) {
            console.log("SAVE LANDING RESPONSE", response);
          },
          error: function(error) {
            console.log("ERROR LANDING RESPONSE", error);
          }
        })
      });
    });
  </script>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>
