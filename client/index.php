<?php
$title = "SDAIC - Homepage";
$active_index = "active";
$active_profile = "";
$active_your_appointments = "";
$active_new_appointment = "";
include_once('header.php');
?>  

<body>
  <!-- nav bar -->
  <div style="background-image: url(https://wallpaperaccess.com/full/1282798.jpg); width: 100%; height: 700px;">
    <div class="my-wrapper">
      <div class="navbar navbar-expand-lg" style="margin-bottom: 45px; margin-top: 50px;">
        <div class="container-fluid justify-content-center">
          <a class="navbar-brand d-flex flex-column align-items-center" href="index.php">
            <img src="https://www.logolynx.com/images/logolynx/2a/2ad00c896e94f1f42c33c5a71090ad5e.png" alt="Logo" width="150" height="auto" class="d-inline-block align-text-top mr-2" style="margin-bottom: 30px;">
            <div class="brand-text" style="font-size: 45px; color: white; font-weight: bold; line-height: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">STA. MARIA DIAGNOSTIC</div>
            <div class="brand-text" style="font-size: 45px; color: white; font-weight: bold; line-height: 1; text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);">AND IMAGING CENTER</div>

          </a>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-6 d-flex flex-column align-items-center">
          <?php
          if(isset($_SESSION['user_id'])) {
            echo '<button id="btnNewAppointment" type="button" class="btn btn-primary btn-custom mt-2 mb-2" style="width: 500px; height: 70px; font-size: 1.7em; font-weight: bold;">New Appointment</button>';
          } else {
            echo '
            <button id="btnBookNow" type="button" class="btn-custom">Book Now</button>
            <button id="btnSeeServices" type="button" class="btn-custom">See Services</button>
            ';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div style="text-align: center; margin-bottom: 60px; background-color: white;">
    <img src="https://cdn.discordapp.com/attachments/489358237343416320/1254446687850729512/step.png?ex=66798604&is=66783484&hm=9a73d53787e6a67ea08b03b820667b1c901ebc14c8456c9eb9eabc24e9db31e1&" alt="steps" style="width: 800px; height: auto; display: block; margin-left: auto; margin-right: auto;">
  </div>

  <div class="about-us-container" style="display: flex;">
    <div class="about-us" style="padding: 20px 60px 20px 40px; border-left: 8px solid #4c3d3d; flex-grow: 1; margin-right: auto;">
      <h2 style="color: #333; font-size: 24px; margin-bottom: 30px; margin-left: 80px;">About Us</h2>
      <p id="about_us" style="color: #666; font-size: 16px; line-height: 1.6; margin-left: 80px;">This is where you can put your information about your company or yourself. Feel free to include details about your history, mission, team, and anything else you'd like to share with your audience.</p>
    </div>
    <div class="about-us-image" style="padding: 20px; width: 900px;">
      <img src="https://wallpaperaccess.com/full/1282798.jpg" style="max-width: 100%; height: auto;">
    </div>
  </div>





  <!-- end nav bar -->
  <div class="my-wrapper" style="margin-bottom: 50px; margin-top: 50px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <section id="sectionService">
            <h1 class="title" style="font-size: 35px; margin-bottom: 50px;">SERVICES OFFERED</h1>
            <ul id="ourServices" class="list-unstyled" style="font-size: 25px;"> <!-- Adjust font size as needed -->
              <li>Service 1
                <p>Description of Service 1</p>
              </li>
              <li>Service 2
                <p>Description of Service 2</p>
              </li>
              <li>Service 3
                <p>Description of Service 3</p>
              </li>
              <li>Service 4
                <p>Description of Service 4</p>
              </li>
              <li>Service 5
                <p>Description of Service 5</p>
              </li>
            </ul>
          </section>
        </div>
      </div>
    </div>
  </div>


  <div style="background-color: white; margin-bottom: 50px; display: flex; height:150px;">
    <div style="background-color: white; width: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <h1 style="font-size: 25px; margin: 10px;">Our Schedules</h1>
      <p id="ourSchedules" style="font-size: 16px; margin: 10px; max-width: 70%;">vice monday 3pm - 4pm | service tuesday 4pm - 5pm | serv wednesday 5pm - 6pm | serv thursday & friday 6am - 9am</p>
    </div>
    <div style="background-color: gray; width: 50%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
      <h1 style="font-size: 25px; margin: 0;">Our Experts</h1>
      <p id="ourExperts" style="font-size: 16px; margin: 10px;">on god bro</p>
    </div>
  </div>




  <script type="text/javascript">
    $(document).ready(function() {
    // READ INDEX INFO
      loadLanding();
      loadServices();
      loadDoctors();
      function loadLanding() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: 'handles/read_landing.php',
          success: function(response) {
            console.log("SUCCESS RESPONSE LANDING", response);
            if (response.status === 'success' && response.data.length > 0) {
              var data = response.data[0]; // Assuming only one record is returned
              
              // Append about_us to the element with id 'about_us'
              $('#about_us').empty().append(data.about_us);

              // Assuming you want to display images (if available)
              if (data.about_us_image) {
                var about_us_image_html = `<img src="${data.about_us_image}" alt="About Us Image">`;
                $('#about_us_image').empty().append(about_us_image_html);
              }

              if (data.main_image) {
                var main_image_html = `<img src="${data.main_image}" alt="Main Image">`;
                $('#main_image').empty().append(main_image_html);
              }

              // Assuming you want to display clinic hours (if available)
              if (data.avail_day && data.avail_start_time && data.avail_end_time) {
                var clinic_hours_html = `<p>Availability: ${data.avail_day} ${data.avail_start_time} - ${data.avail_end_time}</p>`;
                $('#clinic_hours').empty().append(clinic_hours_html);
              }
          } else {
              // Handle empty or error response
            $('#about_us').empty().append('No data available.');
            $('#about_us_image').empty();
            $('#main_image').empty();
            $('#clinic_hours').empty();
          }
        },
        error: function(error) {
          console.log("ERROR LOADING LANDING", error);
        }
      });
      }
      function loadServices() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: '../admin/handles/services/read_services.php',
          success: function(response) {
            console.log("SUCCESS RESPONSE SERVICE", response);
          },
          error: function(error) {
            console.log("ERROR LOADING SERVICE", error);
          }
        });
      }
      function loadDoctors() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: '../admin/handles/doctors/read_doctors.php',
          success: function(response) {
            console.log("SUCCESS RESPONSE DOCTORS", response);
          },
          error: function(error) {
            console.log("ERROR LOADING DOCTORS", error);
          }
        });
      }
    });
  </script>







  <?php
  include_once('footer.php');
?>  