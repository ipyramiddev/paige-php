<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="noindex, nofollow">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta id="myViewport" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" media="all" href="favicon.ico">

    <link rel="stylesheet" href="style.css?v=1.6.3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>



        <title>

        登入我的帳戶 - 中國移動香港

    </title>

</head>

<body>

<style type="text/css">
    header {
    height: auto;
    padding-top: 16px;
    padding-bottom: 12px;
    display: flex;
    align-items: center;
    vertical-align: middle;
    position: fixed;
    width: 100%;
    background: #fff;
    z-index: 11;
    padding-left: 15px;
    padding-right: 15px;
    top: 0;
}

body {
    position: relative;
    padding-top: 60px;
}
header .logo { margin: 0; }
.cart-icon {
    right: 80px !important;
    top: 15px !important;
}
.m-menu span {
    background: #4a4a4a;
    right: 15px !important;
}
.m-menu {
    left: 90%;
    top: 20px;
}
    .backdrop {
        background-color: rgba(0, 0, 0, 0.25);
        width: 100vw;
        height: 100vh;
        position: fixed;
        display:none;
        top: 0;
        left: 0;
        z-index: 1;
        animation: blur-in 500ms 0s forwards; /* Important */
    }

    /* Let's define an animation: */
    @keyframes blur-in {
        from {
            backdrop-filter: blur(0px);
        }
        to {
            backdrop-filter: blur(2px);
        }
    }
    .lds-default {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-default div {
        position: absolute;
        width: 6px;
        height: 6px;
        background: #2e80f4;
        border-radius: 50%;
        animation: lds-default 1.2s linear infinite;
    }
    .lds-default div:nth-child(1) {
        animation-delay: 0s;
        top: 37px;
        left: 66px;
    }
    .lds-default div:nth-child(2) {
        animation-delay: -0.1s;
        top: 22px;
        left: 62px;
    }
    .lds-default div:nth-child(3) {
        animation-delay: -0.2s;
        top: 11px;
        left: 52px;
    }
    .lds-default div:nth-child(4) {
        animation-delay: -0.3s;
        top: 7px;
        left: 37px;
    }
    .lds-default div:nth-child(5) {
        animation-delay: -0.4s;
        top: 11px;
        left: 22px;
    }
    .lds-default div:nth-child(6) {
        animation-delay: -0.5s;
        top: 22px;
        left: 11px;
    }
    .lds-default div:nth-child(7) {
        animation-delay: -0.6s;
        top: 37px;
        left: 7px;
    }
    .lds-default div:nth-child(8) {
        animation-delay: -0.7s;
        top: 52px;
        left: 11px;
    }
    .lds-default div:nth-child(9) {
        animation-delay: -0.8s;
        top: 62px;
        left: 22px;
    }
    .lds-default div:nth-child(10) {
        animation-delay: -0.9s;
        top: 66px;
        left: 37px;
    }
    .lds-default div:nth-child(11) {
        animation-delay: -1s;
        top: 62px;
        left: 52px;
    }
    .lds-default div:nth-child(12) {
        animation-delay: -1.1s;
        top: 52px;
        left: 62px;
    }
    @keyframes lds-default {
        0%, 20%, 80%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.5);
        }
    }
</style>


    <header>



        <a href="" class="logo">

            <img src="images/logo.png" alt="Logo" width="200">

        </a>

        <div class="cart-icon" style="display:flex; align-items: center;">

            <img src="images/icon-user.png" height="24px" width="24px" style="margin-right: 8px;"> <span class="login_link" style="font-size: 0.8em; line-height: 1.1; margin: 0; padding: 0;"> 登入 </span>

        </div>

        <div class="m-menu" onclick="document.getElementsByTagName('body')[0].classList.toggle('mm-open');">

        <span></span><span></span><span></span>

        <!-- <div class="txt">選項目錄</div> -->





    </div>

    </header>
