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
                  <th>Day</th>
                  <th>Start Time</th>
                  <th>End Time</th>
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
                <label>Set Clinic Hours</label> <pre></pre>
                <!-- start doctor sched -->
                <button id="callSetSched" type="button" class="btn btn-warning w-100">Set Schedule</button><pre></pre>
                <!-- end doctor sched -->

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

  var scheduleList = [];

  $('#callSetSched').click(function () {
    new bootstrap.Modal($('#mod_addClinicHours')).show();
  });

  // ADD SCHEDULE
  $('#addSched').click(function () {
    var avail_day = $('#avail_day').val();
    var avail_start_time = $('#avail_start_time').val();
    var avail_end_time = $('#avail_end_time').val();
    
    if (!avail_day || !avail_start_time || !avail_end_time) {
      alert('Please complete the schedule details.');
      return;
    }

    const sched_data = 
    `
    <div class="input-group mx-auto w-100 schedule-item">
      <span class="input-group-text text-warning">Selected Day:</span>
      <span class="input-group-text bg-warning-subtle">${avail_day}</span>
      <span class="input-group-text text-success">Start Time:</span>
      <span class="input-group-text bg-success-subtle">${avail_start_time}</span>
      <span class="input-group-text text-danger">End Time:</span>
      <span class="input-group-text bg-danger-subtle">${avail_end_time}</span>
      <button class="btn btn-danger text-warning remove-sched" type="button">-</button>
    </div>
    `;

    $('#bodySched').append(sched_data);

    scheduleList.push({
      avail_day: avail_day,
      avail_start_time: avail_start_time,
      avail_end_time: avail_end_time
    });

    // Reset select elements
    $('#avail_day').val('');
    $('#avail_start_time').val('');
    $('#avail_end_time').val('');

    console.log(scheduleList);
  });

  // REMOVE SCHEDULE
  $('#bodySched').on('click', '.remove-sched', function () {
    var index = $(this).parent().index();
    scheduleList.splice(index, 1);
    $(this).parent().remove();
    console.log(scheduleList);
  });

  // CLEAR SCHEDULE
  $('#btnClear').click(function () {
    $('#mod_addClinicHours select').val('');
    $('#bodySched').empty();
    scheduleList = [];
  });

  // SAVE SCHEDULE
  $('#btnSaveSched').click(function () {
    if (scheduleList.length === 0) {
      alert('Please add at least one schedule.');
      return;
    }

    $('#mod_addClinicHours').modal('hide');
    $('#mod_addClinicHours select').each(function() {
      $(this).val('');
    });

    var avail_dates = JSON.stringify(scheduleList);
    $('#avail_dates').val(avail_dates);

    console.log('Saved Schedules:', avail_dates);
  });
});

  </script>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>
