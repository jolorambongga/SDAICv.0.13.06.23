<?php
// session_start();
$title = "SDAIC - Homepage";
$active_index = "active";
$active_profile = "";
$active_your_appointments = "";
$active_new_appointment = "";
// include_once('handles/auth.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'/>
    <link rel='stylesheet' href='../includes/css/my_css.css'/>
    <link rel='stylesheet' href='../includes/css/my_radio.css'/>
    <style>
        .btn-custom {
            width: 200px; /* Adjust the width as needed */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bowser"></script>
</head>

<body>
    <!-- nav bar -->
  <div style="background-color: #FFC000; width: 100%; height: 700px;">
    <div class="my-wrapper">
        <div class="navbar navbar-expand-lg" style="margin-bottom: 45px; margin-top: 50px;">
            <div class="container-fluid justify-content-center">
                <a class="navbar-brand d-flex flex-column align-items-center" href="index.php">
                    <img src="https://www.logolynx.com/images/logolynx/2a/2ad00c896e94f1f42c33c5a71090ad5e.png" alt="Logo" width="150" height="auto" class="d-inline-block align-text-top mr-2" style="margin-bottom: 30px;">
                    <div class="brand-text" style="font-size: 45px; font-weight: bold; line-height: 1;">STA. MARIA DIAGNOSTIC</div>
                    <div class="brand-text" style="font-size: 45px; font-weight: bold; line-height: 1;">AND IMAGING CENTER</div>
                </a>
            </div>
        </div>
    </div>

    <!-- <?php $_SESSION['user_id'] = 11;?> -->
    <!-- <?php echo($_SESSION['user_id']);?> -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<button id="btnLogout" type="button" class="btn btn-danger btn-custom mt-2 mb-2">Log-Out</button>';
                } else {
                    echo '<button id="btnLogin" type="button" class="btn btn-primary mt-2 mb-2" style="width: 500px; height: 70px; font-size: 1.7em; font-weight: bold;">Login</button>
                          <button id="btnRegister" type="button" class="btn btn-primary mt-2 mb-2" style="width: 500px; height: 70px; font-size: 1.7em; font-weight: bold;">Register</button>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin-bottom: 60px; background-color: white">
  <img src="../step.png" alt="steps" style="width: 800px; height: auto; display: block; margin-left: auto; margin-right: auto;">
</div>
    <!-- end nav bar -->
    <div class="my-wrapper" style="margin-bottom: 50px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title" style="font-size: 35px; margin-bottom: 50px;">SERVICES OFFERED</h1>
                <ul class="list-unstyled" style="font-size: 25px;"> <!-- Adjust font size as needed -->
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
            </div>
        </div>
    </div>
</div>

<?php
include_once('footer_script.php');
?>  