<?php
$title = 'Admin - Dashboard';
$active_dashboard = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Admin Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container" style="display: grid; grid-template-columns: 1fr 1.7fr 1.7fr; grid-template-rows: auto auto; gap: 20px; margin-bottom: 45px;">
    <!-- Yellow big box -->
    <div class="big-box" style="background-color: yellow; padding: 20px; grid-column: 1 / span 2; height: 90%; min-height: 400px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
      skibiddi.
    </div>
    <!-- New big box added here -->
    <div class="big-box" style="background-color: green; padding: 20px; grid-column: 3; height: 90%; min-height: 400px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">
      Toilet.
    </div>
    <div style="display: flex; flex-direction: column; gap: 10px; grid-row: 2;">
        <div class="box" style="background-color: pink; flex: 1; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">info 1 here</div>
        <div class="box" style="background-color: pink; flex: 1; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">info 2 here</div>
        <div class="box" style="background-color: pink; flex: 2; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">pie?</div>
    </div>
    <div class="box" style="background-color: lightblue; height: 90%; min-height: 400px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">graph 1 here</div>
    <div class="box" style="background-color: lightblue; height: 90%; min-height: 400px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);">graph 2 here</div>
  </div>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>