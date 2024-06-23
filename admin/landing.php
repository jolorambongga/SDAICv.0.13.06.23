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
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="about_us_image" required>
                  </div>
                  <pre></pre>

                  <!-- main image -->
                  <label for="main_image" class="form-label">Main Image</label>
                  <div class="input-group mb-3">
                    <input type="file" class="form-control" id="main_image" required>
                  </div>
                  <pre></pre>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-success">Save Changes</button>
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


      });

    </script>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
  </body>
  </html>
