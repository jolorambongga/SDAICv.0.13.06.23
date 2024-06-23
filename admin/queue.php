  <?php
  $title = 'Admin - Queue';
  $active_queue = 'active';
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
            <h1>Queue</h1>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Queue Number</th>
                    <th>Patient Name</th>
                    <th>Procedure</th>
                    <th>Time</th>
                    <th>Status</th>
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
