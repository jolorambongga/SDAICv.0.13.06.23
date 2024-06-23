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
        <div class="col-4">
          <h1>Edit Schedule</h1>
        </div>
      </div>
      <!-- end label -->
      <!-- input group -->
      <div class="input-group mb-3">
        <label class="input-group-text bg-warning" for="avail_day">Select Day</label>
        <select class="form-select" id="avail_day">
          <option selected></option>
          <option>Sunday</option>
          <option>Monday</option>
          <option>Tuesday</option>
          <option>Wednesday</option>
          <option>Thursday</option>
          <option>Friday</option>
          <option>Saturday</option>
        </select>

        <!-- start time -->
        <label class="input-group-text bg-success-subtle" for="avail_start_time">Start Time</label>
        <select class="form-select" id="avail_start_time">
          <option selected></option>
          <optgroup label="AM">
            <option value="00:00">12:00 AM</option>
            <option value="01:00">1:00 AM</option>
            <option value="02:00">2:00 AM</option>
            <option value="03:00">3:00 AM</option>
            <option value="04:00">4:00 AM</option>
            <option value="05:00">5:00 AM</option>
            <option value="06:00">6:00 AM</option>
            <option value="07:00">7:00 AM</option>
            <option value="08:00">8:00 AM</option>
            <option value="09:00">9:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
          </optgroup>
          <optgroup label="PM">
            <option value="12:00">12:00 PM</option>
            <option value="13:00">1:00 PM</option>
            <option value="14:00">2:00 PM</option>
            <option value="15:00">3:00 PM</option>
            <option value="16:00">4:00 PM</option>
            <option value="17:00">5:00 PM</option>
            <option value="18:00">6:00 PM</option>
            <option value="19:00">7:00 PM</option>
            <option value="20:00">8:00 PM</option>
            <option value="21:00">9:00 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="23:00">11:00 PM</option>
          </optgroup>
        </select>
        
        <!-- end time -->
        <label class="input-group-text bg-danger-subtle" for="avail_end_time">End Time</label>
        <select class="form-select" id="avail_end_time">
          <option selected></option>
          <optgroup label="AM">
            <option value="00:00">12:00 AM</option>
            <option value="01:00">1:00 AM</option>
            <option value="02:00">2:00 AM</option>
            <option value="03:00">3:00 AM</option>
            <option value="04:00">4:00 AM</option>
            <option value="05:00">5:00 AM</option>
            <option value="06:00">6:00 AM</option>
            <option value="07:00">7:00 AM</option>
            <option value="08:00">8:00 AM</option>
            <option value="09:00">9:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
          </optgroup>
          <optgroup label="PM">
            <option value="12:00">12:00 PM</option>
            <option value="13:00">1:00 PM</option>
            <option value="14:00">2:00 PM</option>
            <option value="15:00">3:00 PM</option>
            <option value="16:00">4:00 PM</option>
            <option value="17:00">5:00 PM</option>
            <option value="18:00">6:00 PM</option>
            <option value="19:00">7:00 PM</option>
            <option value="20:00">8:00 PM</option>
            <option value="21:00">9:00 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="23:00">11:00 PM</option>
          </optgroup>
        </select>

        <button class="btn btn-success text-warning" type="button" id="addSched">+</button>
      </div>
      <!-- end input group -->

      <!-- Display schedules -->
      <div id="scheduleList"></div>

      <!-- Hidden input to store schedule data -->
      <input type="hidden" id="hiddenSchedule" name="hiddenSchedule">
    </div>
    <!-- end container fluid -->
  </div>
  <!-- end wrapper -->

  <!-- <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script> -->
  <script>
    document.getElementById('addSched').addEventListener('click', function() {
      // Get selected values
      var day = document.getElementById('avail_day').value;
      var startTime = document.getElementById('avail_start_time').value;
      var endTime = document.getElementById('avail_end_time').value;

      // Validate selections
      if (!day || !startTime || !endTime) {
        alert('Please complete the schedule');
        return;
      }

      // Create schedule entry
      var scheduleEntry = day + ': ' + startTime + ' - ' + endTime;

      // Append to schedule list
      var scheduleList = document.getElementById('scheduleList');
      var newEntry = document.createElement('div');
      newEntry.textContent = scheduleEntry;
      scheduleList.appendChild(newEntry);

      // Update hidden input
      var hiddenSchedule = document.getElementById('hiddenSchedule');
      var schedules = hiddenSchedule.value ? JSON.parse(hiddenSchedule.value) : [];
      schedules.push({ day: day, startTime: startTime, endTime: endTime });
      hiddenSchedule.value = JSON.stringify(schedules);
    });
  </script>
</body>

</html>
