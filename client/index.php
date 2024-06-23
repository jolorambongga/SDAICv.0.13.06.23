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
                    <div class="brand-text" style="font-size: 45px; color: white; font-weight: bold; line-height: 1;">STA. MARIA DIAGNOSTIC</div>
                    <div class="brand-text" style="font-size: 45px; color: white; font-weight: bold; line-height: 1;">AND IMAGING CENTER</div>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <?php
                if(isset($_SESSION['user_id'])) {
                    echo '<button id="btnLogout" type="button" class="btn btn-danger btn-custom mt-2 mb-2">Log-Out</button>';
                } else {
                    echo '<button id="btnLogin2" type="button" class="btn btn-primary mt-2 mb-2" style="width: 500px; height: 70px; font-size: 1.7em; font-weight: bold;">Login</button>
                          <button id="btnRegister2" type="button" class="btn btn-primary mt-2 mb-2" style="width: 500px; height: 70px; font-size: 1.7em; font-weight: bold;">Register</button>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div style="text-align: center; margin-bottom: 60px; background-color: white">
  <img src="https://cdn.discordapp.com/attachments/489358237343416320/1254446687850729512/step.png?ex=66798604&is=66783484&hm=9a73d53787e6a67ea08b03b820667b1c901ebc14c8456c9eb9eabc24e9db31e1&" alt="steps" style="width: 800px; height: auto; display: block; margin-left: auto; margin-right: auto;">
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
include_once('footer.php');
?>	