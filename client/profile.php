<?php
$title = "SDAIC - Profile";
$active_index = "";
$active_profile = "active";
$active_your_appointments = "";
$active_new_appointment = "";
include_once('header.php');
include_once('handles/auth.php');
checkAuth();
?>  

<div class="my-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-4">
        <h1>Your profile</h1>
      </div>
      <hr>
      <div class="user-icon-container">
        <i class="fas fa-user"></i>
      </div>

    </div>
    <div id='profileBody'>
      ...
    </div>
    <button id="callEdit" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mod_editProfile">
      Edit Profile
    </button>
    <!-- start edit profile modal -->
    <form id="frm_editProfile">
      <div class="modal fade" id="mod_editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mod_editProfileLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="mod_editProfileLabel">Profile</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label for="e_username" class="form-label">Username</label>
              <input type="text" id="e_username" class="form-control" required>
              <pre></pre>
              <label for="e_email" class="form-label">Email</label>
              <input type="text" id="e_email" class="form-control" required>
              <pre></pre>
              <label for="e_first_name" class="form-label">First Name</label>
              <input type="text" id="e_first_name" class="form-control" required>
              <pre></pre>
              <label for="e_middle_name" class="form-label">Middle Name</label>
              <input type="text" id="e_middle_name" class="form-control" required>
              <pre></pre>
              <label for="e_last_name" class="form-label">Last Name</label>
              <input type="text" id="e_last_name" class="form-control" required>
              <pre></pre>
              <label for="e_contact" class="form-label">Contact</label>
              <input type="text" id="e_contact" class="form-control" required>
              <pre></pre>
              <label for="e_address" class="form-label">Address</label>
              <input type="text" id="e_address" class="form-control" required>
              <pre></pre>
              <label for="e_birthday" class="form-label">Birthday</label>
              <input type="date" class="form-control" id="e_birthday" name="e_birthday" aria-describedby="e_birthday" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button id='saveBtn' type="button" class="btn btn-success">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- end edit profile modal -->
  </div>
</div>

<script>
  $(document).ready(function() {
    // READ PROFILE
    loadProfile();
    function loadProfile() {
      var user_id = '<?php echo($_SESSION['user_id']);?>';
      console.log(user_id);
      $.ajax({
        type: 'POST',
        url: 'handles/read_profile.php',
        data: {user_id: user_id},
        dataType: 'JSON',
        success: function(response) {
          $('#profileBody').empty();
          console.log(response);
          var data = response.data;

          const read_profile_html = `
          <h5>Username: ${data.username}</h5>
          <h5>Email: ${data.email}</h5>
          <h5>Full Name: ${data.first_name} ${data.middle_name} ${data.last_name}</h5>
          <h5>Contact: ${data.contact}</h5>
          <h5>Address: ${data.address}</h5>
          <h5>Birthday: ${data.birthday}</h5>
          `         

          $('#profileBody').append(read_profile_html);
        },
        error: function(error) {
          console.log(error);
        }
      });
    } // END FUNCTION

    $(document).on('click', '#callEdit', function() {
      var user_id = '<?php echo($_SESSION['user_id']);?>';
      $.ajax({
        type: 'GET',
        url: 'handles/get_profile.php',
        dataType: 'JSON',
        data: {user_id: user_id},
        success: function(response) {
          console.log(response);
          var data = response.data;

          $('#e_username').val(data.username);
          $('#e_email').val(data.email  );
          $('#e_first_name').val(data.first_name);
          $('#e_middle_name').val(data.middle_name);
          $('#e_last_name').val(data.last_name);
          $('#e_contact').val(data.contact);
          $('#e_address').val(data.address);
          $('#e_birthday').val(data.birthday);
        },
        error: function(error) {
          console.log("ERROR GET PROFILE", error);
        }
      });
    }); // END CALL EDIT

    $('#frm_editProfile').submit(function(e) {
      e.preventDefault();
      var user_id = '<?php echo($_SESSION['user_id']);?>';
      var username = $('#e_username').val();
      var email = $('#e_email').val();
      var first_name = $('#e_first_name').val();
      var middle_name = $('#e_middle_name').val();
      var last_name = $('#e_last_name').val();
      var contact = $('#e_contact').val();
      var address = $('#e_address').val();
      var birthday = $('#e_birthday').val();

      var data = {
        user_id: user_id,
        username: username,
        email: email,
        first_name: first_name,
        middle_name: middle_name,
        last_name: last_name,
        contact: contact,
        address: address,
        birthday: birthday
      }

      $.ajax({
        type: 'POST',
        url: 'handles/update_profile.php',
        dataType: 'JSON',
        data: data,
        success: function(response) {
          console.log(response);
        },
        error: function(error) {
          console.log("update profile", error);
        }
      });
    })

  });
</script>

<?php
include_once('footer_script.php');
?>